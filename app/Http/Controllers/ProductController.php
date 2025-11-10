<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductSize;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::getAllProduct();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get();
        $categories = Category::where('is_parent', 1)->get();
        return view('backend.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_old(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'required|string',
            'size' => 'nullable',
            // 'stock' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'size_stock' => 'nullable|array',
            'size_stock.*' => 'nullable|numeric|min:0',
        ]);
        // dd($validatedData);

        $slug = generateUniqueSlug($request->title, Product::class);
        $validatedData['slug'] = $slug;
        $validatedData['is_featured'] = $request->input('is_featured', 0);

        if ($request->has('size')) {
            $validatedData['size'] = implode(',', $request->input('size'));
        } else {
            $validatedData['size'] = '';
        }

        if ($request->has('size_stock')) {
            $sizeStocks = $request->input('size_stock');
            $validatedData['stock'] = array_sum($sizeStocks);
        } else {
            $validatedData['stock'] = 0;
        }
        // dd($validatedData['stock']);

        $product = Product::create($validatedData);
// dd($product);
        if ($request->has('size_stock')) {
            foreach ($request->input('size_stock') as $size => $stock) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $size,
                    'stock' => $stock
                ]);
            }
        }

        $message = $product
            ? 'Product Successfully added'
            : 'Please try again!!';

        return redirect()->route('product.index')->with(
            $product ? 'success' : 'error',
            $message
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'required|string',
            'size' => 'nullable',
            'cat_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'size_stock' => 'nullable|array',
            'size_stock.*' => 'nullable|numeric|min:0',
            'stock' => 'nullable|numeric|min:0', // for Free Size
        ]);

        // Generate slug
        $slug = generateUniqueSlug($request->title, Product::class);
        $validatedData['slug'] = $slug;
        $validatedData['is_featured'] = $request->input('is_featured', 0);

        // Handle sizes
        if ($request->has('size')) {
            $validatedData['size'] = implode(',', $request->input('size'));
        } else {
            $validatedData['size'] = '';
        }

        // Stock calculation
        if ($request->has('size') && in_array('Free Size', $request->size)) {
            // Free Size product (no entry in product_sizes table)
            $validatedData['stock'] = $request->input('stock', 0);
        } elseif ($request->has('size_stock')) {
            // Multi-size product
            $sizeStocks = $request->input('size_stock');
            $validatedData['stock'] = array_sum($sizeStocks);
        } else {
            $validatedData['stock'] = 0;
        }

        // Create Product
        $product = Product::create($validatedData);

        // Insert into product_sizes only if not Free Size
        if ($request->has('size') && in_array('Free Size', $request->size)) {
            // Do not insert anything into product_sizes
        } elseif ($request->has('size_stock')) {
            foreach ($request->input('size_stock') as $size => $stock) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $size,
                    'stock' => $stock
                ]);
            }
        }

        $message = $product
            ? 'Product Successfully added'
            : 'Please try again!!';

        return redirect()->route('product.index')->with(
            $product ? 'success' : 'error',
            $message
        );
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Implement if needed
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::get();
        $product = Product::findOrFail($id);
        $categories = Category::where('is_parent', 1)->get();
        $items = Product::where('id', $id)->get();

        return view('backend.product.edit', compact('product', 'brands', 'categories', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_old(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'required|string',
            'size' => 'nullable',
            // 'stock' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'brand_id' => 'nullable|exists:brands,id',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'size_stock' => 'nullable|array',
            'size_stock.*' => 'nullable|numeric|min:0',
        ]);
// dd($validatedData);
        $validatedData['is_featured'] = $request->input('is_featured', 0);

        if ($request->has('size')) {
            $validatedData['size'] = implode(',', $request->input('size'));
        } else {
            $validatedData['size'] = '';
        }

        if ($request->has('size_stock')) {
            $sizeStocks = $request->input('size_stock');
            $validatedData['stock'] = array_sum($sizeStocks);
        }

        $status = $product->update($validatedData);

        if ($request->has('size_stock')) {
            foreach ($request->input('size_stock') as $size => $stock) {
                ProductSize::updateOrCreate(
                    ['product_id' => $product->id, 'size' => $size],
                    ['stock' => $stock]
                );
            }
        }

        $message = $status
            ? 'Product Successfully updated'
            : 'Please try again!!';

        return redirect()->route('product.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'required|string',
            'size' => 'nullable',
            // 'stock' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'brand_id' => 'nullable|exists:brands,id',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'size_stock' => 'nullable|array',
            'size_stock.*' => 'nullable|numeric|min:0',
        ]);

        $validatedData['is_featured'] = $request->input('is_featured', 0);

        if ($product->is_featured) {
            $product->text_color = $request->input('text_color', '#000000');       // default black
            $product->discount_color = $request->input('discount_color', '#ff0000'); // default red
        } else {
            $product->text_color = null;
            $product->discount_color = null;
        }

        if ($request->has('size')) {
            $validatedData['size'] = implode(',', $request->input('size'));
        } else {
            $validatedData['size'] = '';
        }

        if ($request->has('size') && in_array('Free Size', $request->size)) {
            $validatedData['stock'] = $request->input('stock', 0);

        } elseif ($request->has('size_stock')) {
            $sizeStocks = $request->input('size_stock');
            $validatedData['stock'] = array_sum($sizeStocks);
        } else {
            $validatedData['stock'] = 0;
        }

        $status = $product->update($validatedData);

        if ($request->has('size') && in_array('Free Size', $request->size)) {
            ProductSize::where('product_id', $product->id)->delete();
        } elseif ($request->has('size_stock')) {
            foreach ($request->input('size_stock') as $size => $stock) {
                ProductSize::updateOrCreate(
                    ['product_id' => $product->id, 'size' => $size],
                    ['stock' => $stock]
                );
            }
        }

        $message = $status
            ? 'Product Successfully updated'
            : 'Please try again!!';

        return redirect()->route('product.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = $product->delete();

        $message = $status
            ? 'Product successfully deleted'
            : 'Error while deleting product';

        return redirect()->route('product.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }
}
