@extends('frontend.layouts.master')

@section('title', 'Select Size | E-Shop')

@section('main-content')
    <style>
        label input[type="radio"]:checked+.size-btn {
            background-color: #000;
            color: #fff;
            border-color: #000;
        }

        .size-btn:hover {
            border-color: #000;
        }
    </style>

    <style>
    label input[type="radio"]:checked + .size-btn {
        background-color: #000;
        color: #fff;
        border-color: #000;
    }

    .size-btn:hover {
        border-color: #000;
    }

    .form-group ul,
    .form-group li {
        list-style: none !important;
        padding-left: 0 !important;
        margin: 0 !important;
    }

    /* Optional: display sizes in a row with spacing */
    .form-group li {
        display: inline-block;
        margin-right: 10px !important;
    }
</style>


    <section class="product-size-select section py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <!-- 🖼 LEFT SIDE - PRODUCT IMAGES -->
                <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                    <div class="card border-0 shadow-sm p-3 text-center">
                        @php
                            $photo = explode(',', $product->photo);
                        @endphp
                        <div id="productImages" class="mb-3">
                            @foreach ($photo as $data)
                                <li data-thumb="{{ $data }}" rel="adjustX:10, adjustY:">
                                    <img src="{{ $data }}" alt="{{ $data }}">
                                </li>
                            @endforeach
                            @if (count($photo) > 1)
                                <div class="d-flex justify-content-center gap-2 mt-2">
                                    @foreach ($photo as $img)
                                        <img src="{{ asset('images/products/' . trim($img)) }}" alt="{{ $img }}"
                                            class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- 🧾 RIGHT SIDE - DETAILS + FORM -->
                <div class="col-lg-6 col-md-6">
                    <div class="card border-0 shadow-sm p-4">
                        <h3 class="mb-2">{{ $product->title }}</h3>
                        <p class="text-muted small">{!! html_entity_decode($product->summary) !!}</p>
                        <h4 class="text-primary mb-4">₹{{ number_format($product->price, 2) }}</h4>

                        <form action="{{ route('single-add-to-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="slug" value="{{ $product->slug }}">

                            @if ($product->size)
                                <div class="form-group mb-4">
                                    <label><strong>Select Size:</strong></label>
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        @php
                                            $sizes = explode(',', $product->size);
                                            $productSizes = DB::table('product_sizes')
                                                ->where('product_id', $product->id)
                                                ->pluck('stock', 'size');
                                        @endphp
                                        @foreach ($sizes as $size)
                                            @php
                                                $sizeTrimmed = trim($size);
                                                // $sizeStock = $productSizes[$sizeTrimmed] ?? 0;
                                                if ($sizeTrimmed === 'Free Size') {
                                                    $sizeStock = $product->stock ?? 0;
                                                } else {
                                                    $sizeStock = $productSizes[$sizeTrimmed] ?? 0;
                                                }
                                            @endphp

                                            {{-- @if ($sizeStock > 0)
                                                <label class="size-option" style="cursor:pointer;">
                                                    <input type="radio" name="size" value="{{ trim($size) }}"
                                                        required hidden>
                                                    <span class="size-btn border px-3 py-2">
                                                        {{ strtoupper(trim($size)) }}
                                                    </span>
                                                </label>
                                            @endif --}}
                                                                                                       <li>
                                                                @if ($sizeStock > 0)
                                                                    <label style="cursor:pointer;">
                                                                        <input type="radio" name="size"
                                                                            value="{{ trim($size) }}" required hidden
                                                                            style="display:none;">
                                                                        <span class="size-btn"
                                                                            style="display:inline-block; border:1px solid #ccc; padding:6px 12px; border-radius:4px;">
                                                                            {{ strtoupper(trim($size)) }}
                                                                        </span>
                                                                    </label>
                                                                @else
                                                                    <span class="size-btn"
                                                                        style="display:inline-block; border:1px solid #ccc; padding:6px 12px; border-radius:4px; opacity:0.6; position:relative; cursor:not-allowed;">
                                                                        {{ strtoupper(trim($size)) }}
                                                                        <span
                                                                            style="color:red; font-weight:bold; position:absolute; right:6px; top:0;">×</span>
                                                                    </span>
                                                                @endif
                                                            </li>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="form-group mb-4">
                                <label><strong>Quantity:</strong></label>
                                <input type="number" name="quant[1]" value="1" min="1"
                                    class="form-control text-center" style="width: 100px;">
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-fill">Add to Cart</button>
                                <a href="{{ route('wishlist') }}" class="btn text-white">Back to Wishlist</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
