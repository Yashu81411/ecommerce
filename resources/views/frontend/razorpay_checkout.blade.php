<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Complete Payment</title>
</head>
<body style="text-align:center; padding:40px;">

<h2>Pay ₹{{ number_format($order->total_amount, 2) }}</h2>
<p>Order #{{ $order->order_number }}</p>

<button id="rzp-button">Pay Now</button>

<form id="razorpay-success-form" action="{{ route('razorpay.success') }}" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    const options = {
        "key": "{{ $razorpayKey }}",
        "amount": "{{ $order->total_amount * 100 }}",
        "currency": "INR",
        "name": "My Shop",
        "description": "Order #{{ $order->order_number }}",
        "order_id": "{{ $razorpayOrder['id'] }}",
        "handler": function (response){
            document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
            document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
            document.getElementById('razorpay_signature').value = response.razorpay_signature;
            document.getElementById('razorpay-success-form').submit();
        },
        "theme": {
            "color": "#F37254"
        }
    };
    const rzp = new Razorpay(options);
    document.getElementById('rzp-button').onclick = function(e){
        rzp.open();
        e.preventDefault();
    }
</script>
</body>
</html>
