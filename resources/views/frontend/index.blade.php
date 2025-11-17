@extends('frontend.layouts.master')
@section('title', 'E-SHOP || HOME PAGE')
@section('main-content')

<style>
    /* Latest Items Section - Uniform Images */
    .single-list .list-image img {
        width: 100%;
        height: 200px;
        /* choose desired height */
        object-fit: cover;
        /* crop & fill nicely */
    }
<style>
    /* Latest Items Section - Uniform Images */
    .single-list .list-image img {
        width: 100%;
        height: 200px;
        /* choose desired height */
        object-fit: cover;
        /* crop & fill nicely */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .single-list .list-image img {
            height: 150px;
        }
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .single-list .list-image img {
            height: 150px;
        }
    }

    @media (max-width: 576px) {
        .single-list .list-image img {
            height: 120px;
        }
    }

</style>
<style>
    /* Medium Banner Images */
    .midium-banner .single-banner img {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }
    @media (max-width: 576px) {
        .single-list .list-image img {
            height: 120px;
        }
    }

</style>
<style>
    /* Medium Banner Images */
    .midium-banner .single-banner img {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .midium-banner .single-banner img {
            height: 200px;
        }
    }
    /* Responsive */
    @media (max-width: 768px) {
        .midium-banner .single-banner img {
            height: 200px;
        }
    }

    @media (max-width: 576px) {
        .midium-banner .single-banner img {
            height: 180px;
        }
    }
    @media (max-width: 576px) {
        .midium-banner .single-banner img {
            height: 180px;
        }
    }

    /* Optional: Center content inside banner */
    .midium-banner .single-banner .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

</style>
<style>
    /* DESKTOP DEFAULT */
    .single-product .product-img img,
    .single-product .hover-img {
        width: 100%;
        height: 350px !important;
        /* slightly taller */
        object-fit: cover;
        border-radius: 10px;
        /* improved border */
    }
    /* Optional: Center content inside banner */
    .midium-banner .single-banner .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

</style>
<style>
    /* DESKTOP DEFAULT */
    .single-product .product-img img,
    .single-product .hover-img {
        width: 100%;
        height: 350px !important;
        /* slightly taller */
        object-fit: cover;
        border-radius: 10px;
        /* improved border */
    }

    /* TABLET */
    @media (max-width: 768px) {

        .single-product .product-img img,
        .single-product .hover-img {
            height: 260px !important;
            /* increased from 200 → 260 */
        }
    }
    /* TABLET */
    @media (max-width: 768px) {

        .single-product .product-img img,
        .single-product .hover-img {
            height: 260px !important;
            /* increased from 200 → 260 */
        }
    }

    /* SMALL MOBILE */
    @media (max-width: 576px) {

        .single-product .product-img img,
        .single-product .hover-img {
            height: 180px !important;
            /* increased from 180 → 240 */
            object-fit: contain;
        }
    }
    /* SMALL MOBILE */
    @media (max-width: 576px) {

        .single-product .product-img img,
        .single-product .hover-img {
            height: 180px !important;
            /* increased from 180 → 240 */
            object-fit: contain;
        }
    }

    /* Reduce card height on mobile */
    @media (max-width: 576px) {
        .isotope-item {
            min-height: 40px !important;
        }
    }
    /* Reduce card height on mobile */
    @media (max-width: 576px) {
        .isotope-item {
            min-height: 40px !important;
        }
    }

</style>
<style>
    label input[type="radio"]:checked+.size-btn {
        background-color: #000;
        color: #fff;
        border-color: #000;
    }
</style>
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
    .buy-size-overlay {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        z-index: 10;
        padding: 10px;
        text-align: center;
    }
    .size-btn:hover {
        border-color: #000;
    }

</style>
<style>
    .buy-size-overlay {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        z-index: 10;
        padding: 10px;
        text-align: center;
    }

    .list-image:hover .buy-size-overlay {
        display: flex;
    }
    .list-image:hover .buy-size-overlay {
        display: flex;
    }

    .size-btn {
        border: 1px solid #ccc;
        padding: 6px 12px;
        border-radius: 4px;
        background: #fff;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .size-btn {
        border: 1px solid #ccc;
        padding: 6px 12px;
        border-radius: 4px;
        background: #fff;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .size-btn:hover {
        color: #000;
        border-color: #000;
        background: #fff;
    }

</style>
    .size-btn:hover {
        color: #000;
        border-color: #000;
        background: #fff;
    }

</style>

<style>
    /* Scroll Banner - Keep animation & UI */
    .scroll-banner-container {
        overflow: hidden;
        /* hide overflow */
        width: 100%;
        position: relative;
    }
<style>
    /* Scroll Banner - Keep animation & UI */
    .scroll-banner-container {
        overflow: hidden;
        /* hide overflow */
        width: 100%;
        position: relative;
    }

    .scroll-banner-track {
        display: flex;
        gap: 20px;
        animation: scrollBanners 30s linear infinite;
    }
    .scroll-banner-track {
        display: flex;
        gap: 20px;
        animation: scrollBanners 30s linear infinite;
    }

    .scroll-banner-track:hover {
        animation-play-state: paused;
        /* pause on hover */
    }
    .scroll-banner-track:hover {
        animation-play-state: paused;
        /* pause on hover */
    }

    .single-banner {
        flex: 0 0 auto;
        /* do not shrink, keep original width */
    }
    .single-banner {
        flex: 0 0 auto;
        /* do not shrink, keep original width */
    }

    .single-banner img {
        width: 100%;
        height: auto;
        display: block;
    }
    .single-banner img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Responsive tweaks for mobile */
    @media (max-width: 992px) {
        .scroll-banner-track {
            gap: 15px;
            /* smaller gap */
        }
    /* Responsive tweaks for mobile */
    @media (max-width: 992px) {
        .scroll-banner-track {
            gap: 15px;
            /* smaller gap */
        }

        .single-banner .content h3 {
            font-size: 1rem;
        }
        .single-banner .content h3 {
            font-size: 1rem;
        }

        .single-banner .content a {
            font-size: 0.875rem;
        }
    }
        .single-banner .content a {
            font-size: 0.875rem;
        }
    }

    @media (max-width: 576px) {
        .scroll-banner-track {
            gap: 10px;
        }
    @media (max-width: 576px) {
        .scroll-banner-track {
            gap: 10px;
        }

        .single-banner .content h3 {
            font-size: 0.9rem;
        }
        .single-banner .content h3 {
            font-size: 0.9rem;
        }

        .single-banner .content a {
            font-size: 0.8rem;
        }
    }
        .single-banner .content a {
            font-size: 0.8rem;
        }
    }

    /* Keep animation keyframes */
    @keyframes scrollBanners {
        0% {
            transform: translateX(0);
        }
    /* Keep animation keyframes */
    @keyframes scrollBanners {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

</style>
        100% {
            transform: translateX(-50%);
        }
    }

</style>


<!-- Slider Area -->
@if (count($banners) > 0)
<section id="Gslider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($banners as $key => $banner)
        <li data-target="#Gslider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
        </li>
        @endforeach
<!-- Slider Area -->
@if (count($banners) > 0)
<section id="Gslider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($banners as $key => $banner)
        <li data-target="#Gslider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
        </li>
        @endforeach

    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach ($banners as $key => $banner)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img class="first-slide" src="{{ $banner->photo }}" alt="First slide">
            <div class="carousel-caption d-md-block text-left">
                <h1 class="wow fadeInDown">{{ $banner->title }}</h1>
                <p>{!! html_entity_decode($banner->description) !!}</p>
                <a class="btn btn-lg ws-btn wow fadeInUpBig" href="{{ route('product-grids') }}" role="button">Shop
                    Now<i class="far fa-arrow-alt-circle-right"></i></i></a>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</section>
@endif
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach ($banners as $key => $banner)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img class="first-slide" src="{{ $banner->photo }}" alt="First slide">
            <div class="carousel-caption d-md-block text-left">
                <h1 class="wow fadeInDown">{{ $banner->title }}</h1>
                <p>{!! html_entity_decode($banner->description) !!}</p>
                <a class="btn btn-lg ws-btn wow fadeInUpBig" href="{{ route('product-grids') }}" role="button">Shop
                    Now<i class="far fa-arrow-alt-circle-right"></i></i></a>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</section>
@endif

<!--/ End Slider Area -->
<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section class="small-banner section">
    <div class="container-fluid">
         <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Top Categories</h2>
                </div>
            </div>
        </div>
        <div class="owl-carousel small-banner-owl">
            @php
            $category_lists = DB::table('categories')->where('status', 'active')->get();
            $parent_categories = $category_lists->where('is_parent', 1);
            @endphp

            @foreach ($parent_categories as $cat)
            <div class="single-banner">
                @if ($cat->photo)
                <img src="{{ $cat->photo }}" alt="{{ $cat->photo }}">
                @else
                <img src="https://via.placeholder.com/600x370" alt="#">
                @endif
                <div class="content">
                    <h3>{{ $cat->title }}</h3>
                    <a href="{{ route('product-cat', $cat->slug) }}">Discover Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="small-banner section">
    <div class="container-fluid">
         <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Top Brands</h2>
                </div>
            </div>
        </div>
        <div class="owl-carousel small-banner-owl">
            @php
            $brand_lists = DB::table('brands')->where('status', 'active')->get();
            @endphp

            @foreach ($brand_lists as $brand)
            <div class="single-banner">
                @if ($brand->photo)
                <img src="{{ $brand->photo }}" alt="{{ $brand->photo }}">
                @else
                <img src="https://via.placeholder.com/600x370" alt="#">
                @endif
                <div class="content">
                    <h3>{{ $brand->title }}</h3>
                    <a href="{{ route('product-brand', $brand->slug) }}">Discover Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>





<!-- End Small Banner -->

<!-- Start Product Area -->
<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="nav-main">
                        <!-- Tab Nav -->
                        <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist" style="
<!-- End Small Banner -->

<!-- Start Product Area -->
<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="nav-main">
                        <!-- Tab Nav -->
                        <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist" style="
        display:flex;
        flex-wrap:nowrap;
        overflow-x:auto;
        overflow-y:hidden;
        white-space:nowrap;
        gap:10px;
        padding-bottom:6px;
        scrollbar-width:none;
    ">
                            @php
                            $categories = DB::table('categories')
                            ->where('status', 'active')
                            ->where('is_parent', 1)
                            ->get();
                            @endphp
    ">
                            @php
                            $categories = DB::table('categories')
                            ->where('status', 'active')
                            ->where('is_parent', 1)
                            ->get();
                            @endphp

                            @if ($categories)
                            <button class="btn" style="background:black;color:white;flex:0 0 auto;" data-filter="*">
                                All Products
                            </button>
                            @if ($categories)
                            <button class="btn" style="background:black;color:white;flex:0 0 auto;" data-filter="*">
                                All Products
                            </button>

                            @foreach ($categories as $key => $cat)
                            <button class="btn"
                                style="background:white;color:black;border:1px solid #ccc;flex:0 0 auto;"
                                data-filter=".{{ $cat->id }}">
                                {{ $cat->title }}
                            </button>
                            @endforeach
                            @endif
                        </ul>
                            @foreach ($categories as $key => $cat)
                            <button class="btn"
                                style="background:white;color:black;border:1px solid #ccc;flex:0 0 auto;"
                                data-filter=".{{ $cat->id }}">
                                {{ $cat->title }}
                            </button>
                            @endforeach
                            @endif
                        </ul>

                        <!--/ End Tab Nav -->
                        <!--/ End Tab Nav -->



                    </div>

                    <div class="tab-content isotope-grid" id="myTabContent">
                        <!-- Start Single Tab -->
                        @if ($product_lists)
                        @foreach ($product_lists as $key => $product)
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-b-35 isotope-item {{ $product->cat_id }}"
                            style="min-height: 500px;">
                            <div class="single-product"
                                style=" padding: 1.25rem; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.12);">
                                <div class="product-img" style="aspect-ratio: 4 / 5;">
                                    <a href="{{ route('product-detail', $product->slug) }}">
                                        @php
                                        $photo = explode(',', $product->photo);
                                        // dd($product);
                                        // dd($photo);
                                        @endphp
                                        <img class="default-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}"
                                            style="  border-radius: 7px;">

                                        <img class="hover-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}"
                                            style="  border-radius: 7px;">
                                        @if ($product->stock <= 0) <span class="out-of-stock">Sale out</span>
                                            @elseif($product->condition == 'new')
                                            <span class="new">New</span @elseif($product->condition == 'hot')
                                            <span class="hot">Hot</span>
                                            @else
                                            <span class="price-dec">{{ $product->discount }}% Off</span>
                                            @endif


                    </div>

                    <div class="tab-content isotope-grid" id="myTabContent">
                        <!-- Start Single Tab -->
                        @if ($product_lists)
                        @foreach ($product_lists as $key => $product)
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-b-35 isotope-item {{ $product->cat_id }}"
                            style="min-height: 500px;">
                            <div class="single-product"
                                style=" padding: 1.25rem; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.12);">
                                <div class="product-img" style="aspect-ratio: 4 / 5;">
                                    <a href="{{ route('product-detail', $product->slug) }}">
                                        @php
                                        $photo = explode(',', $product->photo);
                                        // dd($product);
                                        // dd($photo);
                                        @endphp
                                        <img class="default-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}"
                                            style="  border-radius: 7px;">

                                        <img class="hover-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}"
                                            style="  border-radius: 7px;">
                                        @if ($product->stock <= 0) <span class="out-of-stock">Sale out</span>
                                            @elseif($product->condition == 'new')
                                            <span class="new">New</span @elseif($product->condition == 'hot')
                                            <span class="hot">Hot</span>
                                            @else
                                            <span class="price-dec">{{ $product->discount }}% Off</span>
                                            @endif


                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#{{ $product->id }}" title="Quick View"
                                                href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                                    class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        </div>
                                        {{-- <div class="product-action-2">
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#{{ $product->id }}" title="Quick View"
                                                href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                                    class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        </div>
                                        {{-- <div class="product-action-2">
                                                        <a title="Add to cart"
                                                            href="{{ route('add-to-cart', $product->slug) }}">Add to
                                        cart</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                </h3>
                                <div class="product-price">
                                    @php
                                    $after_discount =
                                    $product->price -
                                    ($product->price * $product->discount) / 100;
                                    @endphp
                                    <span>₹{{ number_format($after_discount, 2) }}</span>
                                    <del style="padding-left:4%;">₹{{ number_format($product->price, 2) }}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                                        cart</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                </h3>
                                <div class="product-price">
                                    @php
                                    $after_discount =
                                    $product->price -
                                    ($product->price * $product->discount) / 100;
                                    @endphp
                                    <span>₹{{ number_format($after_discount, 2) }}</span>
                                    <del style="padding-left:4%;">₹{{ number_format($product->price, 2) }}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!--/ End Single Tab -->
                    @endif
                    <!--/ End Single Tab -->
                    @endif

                    <!--/ End Single Tab -->
                    <!--/ End Single Tab -->

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Product Area -->
{{-- @php
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Product Area -->
{{-- @php
    $featured=DB::table('products')->where('is_featured',1)->where('status','active')->orderBy('id','DESC')->limit(1)->get();
@endphp --}}
<!-- Start Midium Banner  -->
<!-- <section class="midium-banner">
<!-- Start Midium Banner  -->
<!-- <section class="midium-banner">
        <div class="container">
            <div class="row">
                @if ($featured)
                    @foreach ($featured as $data)
                        
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single-banner">
                                @php
                                    $photo = explode(',', $data->photo);
                                @endphp
                                <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                <div class="content">
                                    {{-- <p>{{ $data->cat_info['title'] }}</p>
                                    <h3>{{ $data->title }} <br>Up to<span> {{ $data->discount }}% discount</span></h3> --}}
                                    <p style="color: {{ $data->text_color ?? '#000' }}">{{ $data->cat_info['title'] }}</p>
                                    <h3 style="color: {{ $data->text_color ?? '#000' }}">
                                        {{ $data->title }} <br>
                                        Up to <span style="color: {{ $data->discount_color ?? '#f00' }}">{{ $data->discount }}% discount</span>
                                    </h3>
                                    <a href="{{ route('product-detail', $data->slug) }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                       
                    @endforeach
                @endif
            </div>
        </div>
    </section> -->
<!-- End Midium Banner -->
<!-- End Midium Banner -->

<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach ($product_lists as $product)
                    @if ($product->condition == 'hot')
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{ route('product-detail', $product->slug) }}">
                                @php
                                $photo = explode(',', $product->photo);
                                // dd($photo);
                                @endphp
                                <img class="default-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                <img class="hover-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                {{-- <span class="out-of-stock">Hot</span> --}}
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#{{ $product->id }}" title="Quick View"
                                        href="#"><i class=" ti-eye"></i><span>Quick
                                            Shop</span></a>
                                    <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                            class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a href="{{ route('add-to-cart', $product->slug) }}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                            </h3>
                            <div class="product-price">
                                <span class="old">₹{{ number_format($product->price, 2) }}</span>
                                @php
                                $after_discount =
                                $product->price - ($product->price * $product->discount) / 100;
                                @endphp
                                <span>₹{{ number_format($after_discount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->
<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach ($product_lists as $product)
                    @if ($product->condition == 'hot')
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{ route('product-detail', $product->slug) }}">
                                @php
                                $photo = explode(',', $product->photo);
                                // dd($photo);
                                @endphp
                                <img class="default-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                <img class="hover-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                {{-- <span class="out-of-stock">Hot</span> --}}
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#{{ $product->id }}" title="Quick View"
                                        href="#"><i class=" ti-eye"></i><span>Quick
                                            Shop</span></a>
                                    <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                            class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a href="{{ route('add-to-cart', $product->slug) }}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                            </h3>
                            <div class="product-price">
                                <span class="old">₹{{ number_format($product->price, 2) }}</span>
                                @php
                                $after_discount =
                                $product->price - ($product->price * $product->discount) / 100;
                                @endphp
                                <span>₹{{ number_format($after_discount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

<div class="custom-marquee">
    <div class="marquee-content">
        🛒 Buy From Your Favourite Merchant • 💯 Best Quality Guaranteed • 🚚 Fast Delivery • 🔥 Hot Deals Everyday • 🎉
        Shop Now & Save More!
        🛒 Buy From Your Favourite Merchant • 💯 Best Quality Guaranteed • 🚚 Fast Delivery • 🔥 Hot Deals Everyday • 🎉
        Shop Now & Save More!
    </div>
</div>
<style>
    .custom-marquee {
        background: #000;
        color: #fff;
        padding: 10px 0;
        overflow: hidden;
        position: relative;
        white-space: nowrap;
    }
    .custom-marquee {
        background: #000;
        color: #fff;
        padding: 10px 0;
        overflow: hidden;
        position: relative;
        white-space: nowrap;
    }

    .marquee-content {
        display: inline-block;
        padding-left: 100%;
        animation: scroll-left 12s linear infinite;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 1px;
    }
    .marquee-content {
        display: inline-block;
        padding-left: 100%;
        animation: scroll-left 12s linear infinite;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }
    @keyframes scroll-left {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    /* MOBILE text size */
    @media (max-width: 576px) {
        .marquee-content {
            font-size: 14px;
        }
    }

    /* MOBILE text size */
    @media (max-width: 576px) {
        .marquee-content {
            font-size: 14px;
        }
    }

</style>
<!-- Start Latest Items Carousel -->
<!-- Start Latest Items Carousel -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Latest Items</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach ($product_lists as $product)
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{ route('product-detail', $product->slug) }}">
                                @php
                                $photo = explode(',', $product->photo);
                                @endphp
                                <img class="default-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                <img class="hover-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#{{ $product->id }}" title="Quick View"
                                        href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                    <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                            class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a href="{{ route('add-to-cart', $product->slug) }}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a></h3>
                            <div class="product-price">
                                <span class="old">₹{{ number_format($product->price, 2) }}</span>
                                @php
                                $after_discount = $product->price - ($product->price * $product->discount) / 100;
                                @endphp
                                <span>₹{{ number_format($after_discount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{ route('product-detail', $product->slug) }}">
                                @php
                                $photo = explode(',', $product->photo);
                                @endphp
                                <img class="default-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                <img class="hover-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#{{ $product->id }}" title="Quick View"
                                        href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                    <a title="Wishlist" href="{{ route('add-to-wishlist', $product->slug) }}"><i
                                            class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a href="{{ route('add-to-cart', $product->slug) }}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a></h3>
                            <div class="product-price">
                                <span class="old">₹{{ number_format($product->price, 2) }}</span>
                                @php
                                $after_discount = $product->price - ($product->price * $product->discount) / 100;
                                @endphp
                                <span>₹{{ number_format($after_discount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Latest Items Carousel -->







<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>From Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($posts)
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog  -->
                <div class="shop-single-blog">
                    <img src="{{ $post->photo }}" alt="{{ $post->photo }}">
                    <div class="content">
                        <p class="date">{{ $post->created_at->format('d M , Y. D') }}</p>
                        <a href="{{ route('blog.detail', $post->slug) }}" class="title">{{ $post->title }}</a>
                        <a href="{{ route('blog.detail', $post->slug) }}" class="more-btn">Continue
                            Reading</a>
                    </div>
                </div>
                <!-- End Single Blog  -->
            </div>
            @endforeach
            @endif
<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>From Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($posts)
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Blog  -->
                <div class="shop-single-blog">
                    <img src="{{ $post->photo }}" alt="{{ $post->photo }}">
                    <div class="content">
                        <p class="date">{{ $post->created_at->format('d M , Y. D') }}</p>
                        <a href="{{ route('blog.detail', $post->slug) }}" class="title">{{ $post->title }}</a>
                        <a href="{{ route('blog.detail', $post->slug) }}" class="more-btn">Continue
                            Reading</a>
                    </div>
                </div>
                <!-- End Single Blog  -->
            </div>
            @endforeach
            @endif

        </div>
    </div>
</section>
<!-- End Shop Blog  -->
        </div>
    </div>
</section>
<!-- End Shop Blog  -->

<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->
<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->

{{-- @include('frontend.layouts.newsletter') --}}
{{-- @include('frontend.layouts.newsletter') --}}

<!-- Modal -->
@if ($product_lists)
@foreach ($product_lists as $key => $product)
<div class="modal fade" id="{{ $product->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                        aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <div class="quickview-slider-active">
                                @php
                                $photo = explode(',', $product->photo);
                                // dd($photo);
                                @endphp
                                @foreach ($photo as $data)
                                <div class="single-slider">
                                    <img src="{{ $data }}" alt="{{ $data }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>{{ $product->title }}</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                    <div class="quickview-ratting">
                                        {{-- <i class="yellow fa fa-star"></i>
<!-- Modal -->
@if ($product_lists)
@foreach ($product_lists as $key => $product)
<div class="modal fade" id="{{ $product->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                        aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <div class="quickview-slider-active">
                                @php
                                $photo = explode(',', $product->photo);
                                // dd($photo);
                                @endphp
                                @foreach ($photo as $data)
                                <div class="single-slider">
                                    <img src="{{ $data }}" alt="{{ $data }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>{{ $product->title }}</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                    <div class="quickview-ratting">
                                        {{-- <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="fa fa-star"></i> --}}
                                        @php
                                        $rate = DB::table('product_reviews')
                                        ->where('product_id', $product->id)
                                        ->avg('rate');
                                        $rate_count = DB::table('product_reviews')
                                        ->where('product_id', $product->id)
                                        ->count();
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++) @if ($rate>= $i)
                                            <i class="yellow fa fa-star"></i>
                                            @else
                                            <i class="fa fa-star"></i>
                                            @endif
                                            @endfor
                                    </div>
                                    <a href="#"> ({{ $rate_count }} customer review)</a>
                                </div>
                                <div class="quickview-stock">
                                    @if ($product->stock > 0)
                                    <span><i class="fa fa-check-circle-o"></i> {{ $product->stock }} in
                                        stock</span>
                                    @else
                                    <span><i class="fa fa-times-circle-o text-danger"></i>
                                        {{ $product->stock }} out stock</span>
                                    @endif
                                </div>
                            </div>
                            @php
                            $after_discount =
                            $product->price - ($product->price * $product->discount) / 100;
                            @endphp
                            <h3><small><del class="text-muted">₹{{ number_format($product->price, 2) }}</del></small>
                                ₹{{ number_format($after_discount, 2) }} </h3>
                            <div class="quickview-peragraph">
                                <p>{!! html_entity_decode($product->summary) !!}</p>
                            </div>
                                        @php
                                        $rate = DB::table('product_reviews')
                                        ->where('product_id', $product->id)
                                        ->avg('rate');
                                        $rate_count = DB::table('product_reviews')
                                        ->where('product_id', $product->id)
                                        ->count();
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++) @if ($rate>= $i)
                                            <i class="yellow fa fa-star"></i>
                                            @else
                                            <i class="fa fa-star"></i>
                                            @endif
                                            @endfor
                                    </div>
                                    <a href="#"> ({{ $rate_count }} customer review)</a>
                                </div>
                                <div class="quickview-stock">
                                    @if ($product->stock > 0)
                                    <span><i class="fa fa-check-circle-o"></i> {{ $product->stock }} in
                                        stock</span>
                                    @else
                                    <span><i class="fa fa-times-circle-o text-danger"></i>
                                        {{ $product->stock }} out stock</span>
                                    @endif
                                </div>
                            </div>
                            @php
                            $after_discount =
                            $product->price - ($product->price * $product->discount) / 100;
                            @endphp
                            <h3><small><del class="text-muted">₹{{ number_format($product->price, 2) }}</del></small>
                                ₹{{ number_format($after_discount, 2) }} </h3>
                            <div class="quickview-peragraph">
                                <p>{!! html_entity_decode($product->summary) !!}</p>
                            </div>

                            <form action="{{ route('single-add-to-cart') }}" method="POST" class="mt-4">
                                @csrf
                                @if ($product->size)
                                <div class="size mt-4">
                                    <h3>Size</h3>
                                    <ul style="list-style: none; padding-left: 0; display: flex; gap: 10px;">
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
                            <form action="{{ route('single-add-to-cart') }}" method="POST" class="mt-4">
                                @csrf
                                @if ($product->size)
                                <div class="size mt-4">
                                    <h3>Size</h3>
                                    <ul style="list-style: none; padding-left: 0; display: flex; gap: 10px;">
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
                                        {{-- @if ($sizeStock > 0)
                                                                <li>
                                                                    <label style="cursor:pointer;">
                                                                        <input type="radio" name="size"
                                                                            value="{{ trim($size) }}" required
                                        style="display:none;">
                                        <span class="size-btn"
                                            style="display:inline-block; border:1px solid #ccc; padding:6px 12px; border-radius:4px;">
                                            {{ strtoupper(trim($size)) }}
                                        </span>
                                        </label>
                                        </li>
                                        @endif --}}
                                        style="display:none;">
                                        <span class="size-btn"
                                            style="display:inline-block; border:1px solid #ccc; padding:6px 12px; border-radius:4px;">
                                            {{ strtoupper(trim($size)) }}
                                        </span>
                                        </label>
                                        </li>
                                        @endif --}}

                                        <li>
                                            @if ($sizeStock > 0)
                                            <label style="cursor:pointer;">
                                                <input type="radio" name="size" value="{{ trim($size) }}" required
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
                                    </ul>
                                </div>
                                @endif
                                @error('size')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <br>
                                <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="slug" value="{{ $product->slug }}">
                                        <input type="text" name="quant[1]" class="input-number" data-min="1"
                                            data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    <button type="submit" class="btn">Add to cart</button>
                                    <a href="{{ route('add-to-wishlist', $product->slug) }}" class="btn min"><i
                                            class="ti-heart"></i></a>
                                </div>
                            </form>
                            {{-- <div class="default-social">
                                        <li>
                                            @if ($sizeStock > 0)
                                            <label style="cursor:pointer;">
                                                <input type="radio" name="size" value="{{ trim($size) }}" required
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
                                    </ul>
                                </div>
                                @endif
                                @error('size')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <br>
                                <div class="quantity">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                                data-type="minus" data-field="quant[1]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="slug" value="{{ $product->slug }}">
                                        <input type="text" name="quant[1]" class="input-number" data-min="1"
                                            data-max="1000" value="1">
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                data-field="quant[1]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </div>
                                <div class="add-to-cart">
                                    <button type="submit" class="btn">Add to cart</button>
                                    <a href="{{ route('add-to-wishlist', $product->slug) }}" class="btn min"><i
                                            class="ti-heart"></i></a>
                                </div>
                            </form>
                            {{-- <div class="default-social">
                                            <!-- ShareThis BEGIN -->
                                            <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
<!-- Modal end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
<!-- Modal end -->
@endsection

@push('styles')
{{-- <script type='text/javascript'
{{-- <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons'
        async='async'></script>
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons'
        async='async'></script> --}}
<style>
    /* Banner Sliding */
    #Gslider .carousel-inner {
        background: #000000;
        color: black;
    }
<style>
    /* Banner Sliding */
    #Gslider .carousel-inner {
        background: #000000;
        color: black;
    }

    #Gslider .carousel-inner {
        height: 550px;
    }
    #Gslider .carousel-inner {
        height: 550px;
    }

    #Gslider .carousel-inner img {
        width: 100% !important;
        opacity: .8;
    }
    #Gslider .carousel-inner img {
        width: 100% !important;
        opacity: .8;
    }

    #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
    }
    #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
    }

    #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #000000ff;
    }
    #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #000000ff;
    }

    #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
    }
    #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
    }

    #Gslider .carousel-indicators {
        bottom: 70px;
    }
    #Gslider .carousel-indicators {
        bottom: 70px;
    }

    @media (max-width: 576px) {
        #Gslider .carousel-inner {
            height: 100%;
            /* Mobile-optimized height */
        }
    @media (max-width: 576px) {
        #Gslider .carousel-inner {
            height: 100%;
            /* Mobile-optimized height */
        }

        #Gslider .carousel-caption {
            bottom: 15% !important;
            /* Move caption into view properly */
            padding: 0 15px;
            text-align: left;
        }
        #Gslider .carousel-caption {
            bottom: 15% !important;
            /* Move caption into view properly */
            padding: 0 15px;
            text-align: left;
        }

        #Gslider .carousel-caption h1 {
            font-size: 12px !important;
            line-height: 1.3;
        }
        #Gslider .carousel-caption h1 {
            font-size: 12px !important;
            line-height: 1.3;
        }

        #Gslider .carousel-caption p {
            font-size: 13px;
            line-height: 1.4;
            margin: 10px 0;
        }
        #Gslider .carousel-caption p {
            font-size: 13px;
            line-height: 1.4;
            margin: 10px 0;
        }

        /* Button Resize */
        #Gslider .carousel-caption .btn {
            padding: 6px 14px;
            font-size: 13px;
        }
        /* Button Resize */
        #Gslider .carousel-caption .btn {
            padding: 6px 14px;
            font-size: 13px;
        }

        /* Move indicators higher for mobile */
        #Gslider .carousel-indicators {
            bottom: 10px;
        }
        /* Move indicators higher for mobile */
        #Gslider .carousel-indicators {
            bottom: 10px;
        }




    }

</style>
    }

</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    /*==================================================================
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    /*==================================================================
                                    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({
                filter: filterValue
            });
        });
    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({
                filter: filterValue
            });
        });

    });
    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine: 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });
    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine: 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');
    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function () {
        $(this).on('click', function () {
            for (var i = 0; i < isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }
    $(isotopeButton).each(function () {
        $(this).on('click', function () {
            for (var i = 0; i < isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

</script>
<script>
    function cancelFullScreen(el) {
        var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el
            .exitFullscreen;
        if (requestMethod) { // cancel full screen.
            requestMethod.call(el);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }
            $(this).addClass('how-active1');
        });
    });

</script>
<script>
    function cancelFullScreen(el) {
        var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el
            .exitFullscreen;
        if (requestMethod) { // cancel full screen.
            requestMethod.call(el);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }

    function requestFullScreen(el) {
        // Supports most browsers and their versions.
        var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el
            .msRequestFullscreen;
    function requestFullScreen(el) {
        // Supports most browsers and their versions.
        var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el
            .msRequestFullscreen;

        if (requestMethod) { // Native full screen.
            requestMethod.call(el);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
        return false
    }

</script>
        if (requestMethod) { // Native full screen.
            requestMethod.call(el);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
        return false
    }

</script>

<script>
    document.addEventListener('click', function (event) {
        if (event.target.closest('.btn-number')) {
            event.preventDefault();
<script>
    document.addEventListener('click', function (event) {
        if (event.target.closest('.btn-number')) {
            event.preventDefault();

            const button = event.target.closest('.btn-number');
            const type = button.dataset.type;
            const fieldName = button.dataset.field;
            const input = button.closest('.input-group').querySelector(`input[name='${fieldName}']`);
            const button = event.target.closest('.btn-number');
            const type = button.dataset.type;
            const fieldName = button.dataset.field;
            const input = button.closest('.input-group').querySelector(`input[name='${fieldName}']`);

            let currentVal = parseInt(input.value);
            const min = parseInt(input.dataset.min);
            const max = parseInt(input.dataset.max);
            let currentVal = parseInt(input.value);
            const min = parseInt(input.dataset.min);
            const max = parseInt(input.dataset.max);

            if (isNaN(currentVal)) currentVal = 0;
            if (isNaN(currentVal)) currentVal = 0;

            if (type === 'minus') {
                if (currentVal > min) {
                    input.value = currentVal - 1;
                }
                if (parseInt(input.value) === min) {
                    button.setAttribute('disabled', true);
                }
            } else if (type === 'plus') {
                if (currentVal < max) {
                    input.value = currentVal + 1;
                }
                // Re-enable minus button
                const minusBtn = button.closest('.input-group').querySelector(`.btn-number[data-type='minus']`);
                minusBtn.removeAttribute('disabled');
            }
        }
    });

</script>
            if (type === 'minus') {
                if (currentVal > min) {
                    input.value = currentVal - 1;
                }
                if (parseInt(input.value) === min) {
                    button.setAttribute('disabled', true);
                }
            } else if (type === 'plus') {
                if (currentVal < max) {
                    input.value = currentVal + 1;
                }
                // Re-enable minus button
                const minusBtn = button.closest('.input-group').querySelector(`.btn-number[data-type='minus']`);
                minusBtn.removeAttribute('disabled');
            }
        }
    });

</script>



@endpush
