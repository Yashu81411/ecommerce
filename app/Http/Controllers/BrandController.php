<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Helpers\helpers;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest('id')->paginate();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string',
        'status' => 'required|in:active,inactive',
        'name' => 'nullable|string|max:255',
        'contact_number' => 'nullable|string|max:20',
        'alt_number' => 'nullable|string|max:20',
        'email' => 'nullable|email|unique:brands,email',
        'address' => 'nullable|string',
    ]);

    $validatedData['slug'] = generateUniqueSlug($request->title, Brand::class);

    $brand = Brand::create($validatedData);

    return redirect()->route('brand.index')->with(
        $brand ? 'success' : 'error',
        $brand ? 'Brand successfully created' : 'Error, please try again'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return redirect()->back()->with('error', 'Brand not found');
        }

        return view('backend.brand.edit', compact('brand'));
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
    $brand = Brand::find($id);

    if (!$brand) {
        return redirect()->back()->with('error', 'Brand not found');
    }

    $validatedData = $request->validate([
        'title' => 'required|string',
        'status' => 'required|in:active,inactive',
        'name' => 'nullable|string|max:255',
        'contact_number' => 'nullable|string|max:20',
        'alt_number' => 'nullable|string|max:20',
        'email' => 'nullable|email|unique:brands,email,'.$brand->id,
        'address' => 'nullable|string',
    ]);

    $status = $brand->update($validatedData);

    return redirect()->route('brand.index')->with(
        $status ? 'success' : 'error',
        $status ? 'Brand successfully updated' : 'Error, please try again'
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
        $brand = Brand::find($id);

        if (!$brand) {
            return redirect()->back()->with('error', 'Brand not found');
        }

        $status = $brand->delete();

        $message = $status
            ? 'Brand successfully deleted'
            : 'Error, Please try again';

        return redirect()->route('brand.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }
}
