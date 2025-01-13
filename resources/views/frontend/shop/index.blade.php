@extends('master_layout')
@section('new-layout')

    <!-- Start breadcrumb -->
    <div class="optech-breadcrumb"
         style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
        <div class="container">
            <h1 class="post__title">Shop</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li aria-current="page"> Shop</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <!-- Start section -->
    <div class="section optech-section-padding">
        <div class="container">
            <div class="row">
                <div class=" col-xl-3 col-lg-4 col-md-5">
                    <div class="shop_sidebar">
                        <!-- Search  -->
                        <div class="shop_sidebar_item mt-0 pt-0 border-0">
                            <div class="shop_sidebar_text">
                                <h6>{{ __('Search') }}</h6>
                            </div>
                            <form class="shop_sidebar_search_box">
                                <input type="text" placeholder="Search">
                                <button type="button" class="search_btn">
                                    <span>
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M16.031 14.6168L20.3137 18.8995L18.8995 20.3137L14.6168 16.031C13.0769 17.263 11.124 18 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18 11.124 17.263 13.0769 16.031 14.6168ZM14.0247 13.8748C15.2475 12.6146 16 10.8956 16 9C16 5.1325 12.8675 2 9 2C5.1325 2 2 5.1325 2 9C2 12.8675 5.1325 16 9 16C10.8956 16 12.6146 15.2475 13.8748 14.0247L14.0247 13.8748Z"
                          fill="#0A165E"/>
                    </svg>
                  </span>
                                </button>
                            </form>
                        </div>
                        <!-- Select Your Brand  -->
                        <div class="shop_sidebar_item">
                            <div class="shop_sidebar_text">
                                <h6>{{ __('Select Your Brand') }}</h6>
                            </div>
                            <form action="">
                                <select class="form-select" aria-label="Default select example" name="product_id">
                                    <option value="" selected disabled>{{ __('Select any brand') }}</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->translate?->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>

                        <!-- Select Your Categories -->
                        <div class="shop_sidebar_item ">
                            <div class="shop_sidebar_text">
                                <h6>Select Your Categories</h6>
                            </div>
                            <div class="shop_sidebar_item_box_main fst">
                                @foreach($categories as $category)
                                    <div class="shop_sidebar_item_box">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $category->translate->name }} ({{ $category->products_count }})
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!--  Price -->
                        <div class="shop_sidebar_item ">
                            <div class="shop_sidebar_text">
                                <h6>{{ __('Price') }}</h6>
                            </div>

                            <span class="price">
                                <span class="range-slider style-1">
                                  <span id="slider-tooltips"
                                        class="slider-range mb-3 noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr">
                                  </span>
                                  <span class="example-val" id="slider-margin-value-min">{{ __('Price') }}:
                                    $100</span>
                                  <span>-</span>
                                  <span class="example-val" id="slider-margin-value-max">$415</span>
                                </span>
                            </span>
                        </div>

                        <button type="button" class="optech-default-btn " data-text="Apply Now">
                            <span class="btn-wraper">{{ __('Apply Now') }}</span>
                        </button>
                    </div>
                </div>


                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-xl-4 col-lg-6 col-md-6 mt-5 mt-md-0" data-aos="fade-up"
                                 data-aos-duration="400">
                                <div class="optech-shop-wrap">
                                    <div class="optech-shop-thumb">
                                        <a href="{{ route('product.view', $product->slug) }}">
                                            <img src="{{ asset($product->thumbnail_image) }}" alt="">
                                        </a>
                                        <a class="optech-shop-btn" href="my-cart.html" data-text="Add to Cart"><span
                                                class="btn-wraper">Add to Cart</span></a>
                                        <a class="optech-shop-badge" href="#">{{ __('Sale') }}</a>
                                        <a href="#" class="wishlist_icon">
                                            <span>
                                              <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                   xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.765 2.70229L11 3.52422L10.235 2.70229C8.12233 0.432572 4.69709 0.43257 2.58447 2.70229C0.471845 4.972 0.471844 8.65194 2.58447 10.9217L9.4699 18.3191C10.315 19.227 11.685 19.227 12.5301 18.3191L19.4155 10.9217C21.5282 8.65194 21.5282 4.972 19.4155 2.70229C17.3029 0.432571 13.8777 0.432571 11.765 2.70229Z"
                                                    stroke-width="1.3" stroke-linejoin="round"/>
                                              </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="optech-shop-data">
                                        <a href="{{ route('product.view', $product->slug) }}">
                                            <h5>{{ __($product->translate?->name) }}</h5>
                                        </a>
                                        <h6>
                                            {!! $product->price_display !!}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="optech-navigation">
                <nav class="navigation pagination center" aria-label="Posts">
                    <div class="nav-links">
                        <a class="next page-numbers" href="">
                            <i class="ri-arrow-left-s-line"></i>
                        </a>
                        <span aria-current="page" class="page-numbers current">1</span>
                        <a class="page-numbers" href="">2</a>
                        <a class="page-numbers" href="">3</a>
                        <a class="next page-numbers" href="">
                            <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End section -->

@endsection
@push('style_section')
    <link href="{{ asset('frontend/assets/css/nouislider.min.css') }}" rel="stylesheet"/>
@endpush
@push('js_section')
    <script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
@endpush
