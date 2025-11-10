<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\ProductSize;
use App\User;
use PDF;
use Notification;
use Helper;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        return view('backend.order.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            'address1'=>'string|required',
            'address2'=>'string|nullable',
            'coupon'=>'nullable|numeric',
            'phone'=>'numeric|required',
            'post_code'=>'string|nullable',
            'email'=>'string|required'
        ]);
        // return $request->all();

        if(empty(Cart::where('user_id',auth()->user()->id)->where('order_id',null)->first())){
            request()->session()->flash('error','Cart is Empty !');
            return back();
        }
        // $cart=Cart::get();
        // // return $cart;
        // $cart_index='ORD-'.strtoupper(uniqid());
        // $sub_total=0;
        // foreach($cart as $cart_item){
        //     $sub_total+=$cart_item['amount'];
        //     $data=array(
        //         'cart_id'=>$cart_index,
        //         'user_id'=>$request->user()->id,
        //         'product_id'=>$cart_item['id'],
        //         'quantity'=>$cart_item['quantity'],
        //         'amount'=>$cart_item['amount'],
        //         'status'=>'new',
        //         'price'=>$cart_item['price'],
        //     );

        //     $cart=new Cart();
        //     $cart->fill($data);
        //     $cart->save();
        // }

        // $total_prod=0;
        // if(session('cart')){
        //         foreach(session('cart') as $cart_items){
        //             $total_prod+=$cart_items['quantity'];
        //         }
        // }

        $order=new Order();
        $order_data=$request->all();
        $order_data['order_number']='ORD-'.strtoupper(Str::random(10));
        $order_data['user_id']=$request->user()->id;
        $order_data['shipping_id']=$request->shipping;
        $shipping=Shipping::where('id',$order_data['shipping_id'])->pluck('price');
        // return session('coupon')['value'];
        $order_data['sub_total']=Helper::totalCartPrice();
        $order_data['quantity']=Helper::cartCount();
        if(session('coupon')){
            $order_data['coupon']=session('coupon')['value'];
        }
        if($request->shipping){
            if(session('coupon')){
                $order_data['total_amount']=Helper::totalCartPrice()+$shipping[0]-session('coupon')['value'];
            }
            else{
                $order_data['total_amount']=Helper::totalCartPrice()+$shipping[0];
            }
        }
        else{
            if(session('coupon')){
                $order_data['total_amount']=Helper::totalCartPrice()-session('coupon')['value'];
            }
            else{
                $order_data['total_amount']=Helper::totalCartPrice();
            }
        }
        // return $order_data['total_amount'];
        $order_data['status']="new";
        if(request('payment_method')=='paypal'){
            $order_data['payment_method']='paypal';
            $order_data['payment_status']='paid';
        } elseif ($request->payment_method == 'razorpay') {
            $order_data['payment_method'] = 'razorpay';
            $order_data['payment_status'] = 'unpaid';
        }else{
            $order_data['payment_method']='cod';
            $order_data['payment_status']='unpaid';
        }
        $order->fill($order_data);
        $status=$order->save();

        if ($order->payment_method == 'razorpay') {
            $razorpayOrder = $this->createRazorpayOrder($order->total_amount, $order->order_number);

            if (!$razorpayOrder || !isset($razorpayOrder['id'])) {
                return back()->with('error', 'Razorpay order creation failed.');
            }

            // save Razorpay order_id for verification
            $order->session_id = $razorpayOrder['id'];
            $order->save();

            return view('frontend.razorpay_checkout', [
                'order' => $order,
                'razorpayOrder' => $razorpayOrder,
                'razorpayKey' => 'rzp_test_RaTrmZW6PsHUdp',
                'total_amount' => $order->total_amount
            ]);
        }

        if($order)
        // dd($order->id);
        $users=User::where('role','admin')->first();
        $details=[
            'title'=>'New order created',
            'actionURL'=>route('order.show',$order->id),
            'fas'=>'fa-file-alt'
        ];
        Notification::send($users, new StatusNotification($details));
        if(request('payment_method')=='paypal'){
            return redirect()->route('payment')->with(['id'=>$order->id]);
        }
        else{
            session()->forget('cart');
            session()->forget('coupon');
        }
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

        // dd($users);
        request()->session()->flash('success','Your product successfully placed in order');
        return redirect()->route('home');
    }

        private function createRazorpayOrder($amount, $receipt)
        {
            // Direct Razorpay credentials
            $key = 'rzp_test_RaTrmZW6PsHUdp';
            $secret = 'GQGxPh3z0lyvafYyQJfBk8u6';

            try {
                $payload = [
                    'amount' => (int) round($amount * 100),
                    'currency' => 'INR',
                    'receipt' => $receipt,
                    'payment_capture' => 1,
                ];

                $response = Http::withBasicAuth($key, $secret)
                                ->post('https://api.razorpay.com/v1/orders', $payload);

                if ($response->failed()) {
                    Log::error('Razorpay order creation failed: ' . $response->status() . ' - ' . $response->body());
                    return ['error' => 'Razorpay API call failed'];
                }

                return $response->json();

            } catch (\Exception $e) {
                Log::error('Razorpay create order exception: ' . $e->getMessage());
                return ['error' => $e->getMessage()];
            }
        }

    public function razorpaySuccess(Request $request)
    {
        try {
            $orderId = $request->input('razorpay_order_id');
            $paymentId = $request->input('razorpay_payment_id');
            $signature = $request->input('razorpay_signature');


            if (!$orderId || !$paymentId || !$signature) {
                Log::warning('Razorpay callback missing data.', $request->all());
                return redirect()->route('home')->with('error', 'Invalid payment details received.');
            }

            $razorpaySecret = 'GQGxPh3z0lyvafYyQJfBk8u6';


            $generatedSignature = hash_hmac(
                'sha256',
                $orderId . '|' . $paymentId,
                $razorpaySecret
            );


            if (!hash_equals($generatedSignature, $signature)) {
                Log::error("Signature mismatch for order: $orderId");
                return redirect()->route('home')->with('error', 'Payment verification failed.');
            }


            $order = Order::where('session_id', $orderId)->first();

            if (!$order) {
                Log::error("Order not found for Razorpay order_id: $orderId");
                return redirect()->route('home')->with('error', 'Order not found.');
            }


            $order->update([
                'payment_status' => 'paid',
                'status' => 'process',
                'updated_at' => now(),
            ]);

            Log::info("Razorpay payment successful. Order updated: {$order->order_number}");


            session()->forget(['cart', 'coupon']);

            return redirect()->route('home')->with('success', 'Payment successful!');

        } catch (\Exception $e) {
            Log::error('Razorpay success handler error: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Something went wrong while processing payment.');
        }
    }



    public function handleRazorpayWebhook(Request $request)
    {
        $webhookBody = $request->getContent();
        $webhookSignature = $request->header('X-Razorpay-Signature');
        $razorpaySecret = 'GQGxPh3z0lyvafYyQJfBk8u6';

        try {
            // Normalize all line endings (\r\n -> \n) and remove any trailing newlines
            $normalizedBody = preg_replace('/\r\n?/', "\n", $webhookBody);
            $normalizedBody = rtrim($normalizedBody, "\r\n");

            // Log raw and normalized bodies for debugging
            file_put_contents(storage_path('logs/raw_body_debug.txt'), $webhookBody);
            file_put_contents(storage_path('logs/normalized_body_debug.txt'), $normalizedBody);
            file_put_contents(storage_path('logs/webhook_raw_signature.txt'), $webhookSignature);

            // Verify signature
            $expectedSignature = hash_hmac('sha256', $normalizedBody, $razorpaySecret);
            file_put_contents(storage_path('logs/webhook_expected_signature.txt'), $expectedSignature);

            if (!hash_equals($expectedSignature, $webhookSignature)) {
                file_put_contents(storage_path('logs/webhook_debug.txt'), "Signature mismatch\n", FILE_APPEND);
                return response()->json(['status' => 'invalid signature'], 400);
            }

            // Parse payload
            $payload = json_decode($normalizedBody, true);
            if (!$payload || !isset($payload['event'])) {
                file_put_contents(storage_path('logs/webhook_debug.txt'), "Invalid payload\n", FILE_APPEND);
                return response()->json(['status' => 'invalid payload'], 400);
            }

            // Handle events
            switch ($payload['event']) {

                // ✅ PAYMENT SUCCESS EVENT
                case 'payment.captured':
                    $paymentData = $payload['payload']['payment']['entity'] ?? null;
                    if (!$paymentData) {
                        return response()->json(['status' => 'missing payment data'], 400);
                    }

                    $orderId = $paymentData['order_id'] ?? null;
                    $paymentId = $paymentData['id'] ?? null;

                    $order = Order::where('session_id', $orderId)->first();
                    if (!$order) {
                        return response()->json(['status' => 'order not found'], 404);
                    }

                    $order->update([
                        'payment_status' => 'paid',
                        'status' => 'process',
                        'updated_at' => now(),
                    ]);

                    file_put_contents(storage_path('logs/webhook_debug.txt'),
                        "Payment captured successfully for Order: $orderId\n", FILE_APPEND);
                    break;

                // ❌ PAYMENT FAILURE EVENT
                case 'payment.failed':
                    $paymentData = $payload['payload']['payment']['entity'] ?? null;
                    $orderId = $paymentData['order_id'] ?? null;

                    if ($order = Order::where('session_id', $orderId)->first()) {
                        $order->update([
                            'payment_status' => 'unpaid',
                            'status' => 'cancel',
                            'updated_at' => now(),
                        ]);

                        file_put_contents(storage_path('logs/webhook_debug.txt'),
                            "Payment failed for Order: $orderId\n", FILE_APPEND);
                    } else {
                        file_put_contents(storage_path('logs/webhook_debug.txt'),
                            "Payment failed but order not found for: $orderId\n", FILE_APPEND);
                    }
                    break;

                // 🟡 UNHANDLED EVENT
                default:
                    file_put_contents(storage_path('logs/webhook_debug.txt'),
                        "Unhandled event: {$payload['event']}\n", FILE_APPEND);
                    break;
            }

            return response()->json(['status' => 'success'], 200);

        } catch (\Exception $e) {
            file_put_contents(storage_path('logs/webhook_debug.txt'),
                "Error: " . $e->getMessage() . "\n", FILE_APPEND);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function paymentCancel()
    {
        try {
            session()->forget(['cart', 'coupon']);

            Log::info('User cancelled payment process.');

            return view('frontend.payment_cancel');

        } catch (\Exception $e) {
            Log::error('Error showing payment cancel page: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Something went wrong while cancelling the payment.');
        }
    }

    public function show($id)
    {
        $order=Order::find($id);
        // return $order;
        return view('backend.order.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        return view('backend.order.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order=Order::find($id);
        $this->validate($request,[
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();

        // if($request->status=='delivered'){
        //     foreach($order->cart as $cart){
        //         $product=$cart->product;
        //         // return $product;
        //         $product->stock -=$cart->quantity;
        //         $product->save();
        //     }
        // }
        if ($request->status == 'delivered') {
            foreach ($order->cart as $cart) {
                // Find matching size stock entry
                $sizeStock = ProductSize::where('product_id', $cart->product_id)
                    ->where('size', $cart->size)
                    ->first();

                // Reduce stock for that specific size
                if ($sizeStock) {
                    $sizeStock->stock = max(0, $sizeStock->stock - $cart->quantity);
                    $sizeStock->save();
                }
            }
        }
        $status=$order->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated order');
        }
        else{
            request()->session()->flash('error','Error while updating order');
        }
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        if($order){
            $status=$order->delete();
            if($status){
                request()->session()->flash('success','Order Successfully deleted');
            }
            else{
                request()->session()->flash('error','Order can not deleted');
            }
            return redirect()->route('order.index');
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }

    public function orderTrack(){
        return view('frontend.pages.order-track');
    }

    public function productTrackOrder(Request $request){
        // return $request->all();
        $order=Order::where('user_id',auth()->user()->id)->where('order_number',$request->order_number)->first();
        if($order){
            if($order->status=="new"){
            request()->session()->flash('success','Your order has been placed. please wait.');
            return redirect()->route('home');

            }
            elseif($order->status=="process"){
                request()->session()->flash('success','Your order is under processing please wait.');
                return redirect()->route('home');

            }
            elseif($order->status=="delivered"){
                request()->session()->flash('success','Your order is successfully delivered.');
                return redirect()->route('home');

            }
            else{
                request()->session()->flash('error','Your order canceled. please try again');
                return redirect()->route('home');

            }
        }
        else{
            request()->session()->flash('error','Invalid order numer please try again');
            return back();
        }
    }

    // PDF generate
    public function pdf(Request $request){
        $order=Order::getAllOrder($request->id);
        // return $order;
        $file_name=$order->order_number.'-'.$order->first_name.'.pdf';
        // return $file_name;
        $pdf=PDF::loadview('backend.order.pdf',compact('order'));
        return $pdf->download($file_name);
    }
    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::with(['cart_info'])->whereYear('created_at',$year)->where('status','delivered')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->cart_info->sum('amount');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
