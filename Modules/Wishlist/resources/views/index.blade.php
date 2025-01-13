@extends('seller.dashboard_layout')
@section('title')
    <title>{{ __('User Dashboard') }}</title>
@endsection
@section('breadcrumb')
    <h1 class="post__title">{{ __('Dashboard') }}</h1>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="{{ route('user.dashboard') }}">{{ __('Home') }}</a></li>
            <li aria-current="page"> {{ __('Dashboard') }}</li>
        </ul>
    </nav>
@endsection

@section('dashboard-content')
    <div class="col-xxl-9 col-xl-8 col-lg-8 col-md-7">
        <div class="row">
            @foreach($products as $product)
                <div class="col-xl-4 col-lg-6 col-md-6 mt-5 mt-md-0" data-aos="fade-up" data-aos-duration="400">
                    <div class="optech-shop-wrap">
                        <div class="optech-shop-thumb">
                            <a href="{{ route('product.view', $product->slug) }}">
                                <img src="{{ asset($product->thumbnail_image) }}" alt="">
                            </a>
                            <a class="optech-shop-btn" href="my-cart.html" data-text="Add to Cart">
                                <span class="btn-wraper">{{ __('Add To Cart') }}</span>
                            </a>
                            <a class="optech-shop-badge" href="#">{{ __('Sale') }}</a>
                            <a href="#" class="wishlist_icon">
                                <span>
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.765 2.70229L11 3.52422L10.235 2.70229C8.12233 0.432572 4.69709 0.43257 2.58447 2.70229C0.471845 4.972 0.471844 8.65194 2.58447 10.9217L9.4699 18.3191C10.315 19.227 11.685 19.227 12.5301 18.3191L19.4155 10.9217C21.5282 8.65194 21.5282 4.972 19.4155 2.70229C17.3029 0.432571 13.8777 0.432571 11.765 2.70229Z"
                                            stroke-width="1.3" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="optech-shop-data">
                            <a href="{{ route('product.view', $produt->slug) }}">
                                <h5>{{ __($product->translate?->name) }}</h5>
                            </a>
                            <h6
                                {!! $product->price_display !!}
                            </h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('style_section')
    <link href="{{ asset('frontend/assets/css/nouislider.min.css') }}" rel="stylesheet"/>
@endpush
@push('js_section')
    <script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
@endpush
