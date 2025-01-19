@extends('master_layout')
@section('new-layout')

    <!-- Start breadcrumb -->
    <div class="optech-breadcrumb"
         style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
        <div class="container">
            <h1 class="post__title">{{ __('Shop') }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li aria-current="page">{{ __('Shop') }}</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <!-- Start section -->
    <div class="section optech-section-padding">
        <div class="container">
            <div class="row">
                @include('frontend.shop.sidebar_search')

                @if($products->count() > 0)
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-xl-4 col-lg-6 col-md-6 mt-5 mt-md-0" data-aos="fade-up"
                                     data-aos-duration="400">
                                    <div class="optech-shop-wrap">
                                        <div class="optech-shop-thumb">
                                            <a href="{{ route('product.view', $product->slug) }}">
                                                <img src="{{ asset($product->thumbnail_image) }}" alt="Image0">
                                            </a>
                                            <button class="optech-shop-btn cart-add-btn"
                                                    data-product-id="{{ $product->id }}"
                                                    data-text="{{ __('Add to Cart') }}">
                                            <span class="btn-wraper">
                                                {{ __('Add to Cart') }}
                                            </span>
                                            </button>
                                            <a class="optech-shop-badge" href="#">{{ __('Sale') }}</a>
                                            <a href="javascript:void(0)"
                                               class="wishlist_icon cart-add-btn {{ auth()->check() && in_array($product->id, auth()->user()->wishlists->pluck('product_id')->toArray()) ? 'active' : '' }}"
                                               onclick="addToWishlist({{ $product->id }}, this)">

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
                @else
                @include('frontend.shop.not_found')
                @endif
            </div>

           @include('frontend.shop.paginate')

        </div>
    </div>


@endsection
@push('style_section')
    <link href="{{ asset('frontend/assets/css/nouislider.min.css') }}" rel="stylesheet"/>
    <style>
        .wishlist_icon svg path {
            stroke: #000; /* default outline color */
            fill: transparent;
            transition: all 0.3s ease;
        }

        .wishlist_icon:hover svg path {
            fill: #ff4d4d; /* hover fill color */
            stroke: #ff4d4d;
        }

        .wishlist_icon.active svg path {
            fill: #ff4d4d; /* active state fill color */
            stroke: #ff4d4d;
        }
    </style>
@endpush
@push('js_section')
    <script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
    <script>
        function addToWishlist(productId, element) {
            $.ajax({
                url: "{{ route('user.wishlist.store') }}",
                type: "POST",
                data: {
                    product_id: productId,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    $(element).toggleClass('active');
                    toastr.success(response.message);
                },
                error: function (xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('slider-tooltips');
            const minPriceInput = document.getElementById('min_price');
            const maxPriceInput = document.getElementById('max_price');
            const displayMinPrice = document.getElementById('display_min_price');
            const displayMaxPrice = document.getElementById('display_max_price');
            const filterForm = document.getElementById('filterForm');

            // Get initial values
            const minPrice = {{ $productMinPrice }};
            const maxPrice = {{ $productMaxPrice }};

            // Get requested values or use defaults
            const currentMin = minPriceInput.value ? parseInt(minPriceInput.value) : minPrice;
            const currentMax = maxPriceInput.value ? parseInt(maxPriceInput.value) : maxPrice;

            if (slider && typeof noUiSlider !== 'undefined') {
                // Destroy existing slider if it exists
                if (slider.noUiSlider) {
                    slider.noUiSlider.destroy();
                }

                // Create new slider
                noUiSlider.create(slider, {
                    start: [currentMin, currentMax],
                    connect: true,
                    range: {
                        'min': minPrice,
                        'max': maxPrice
                    },
                    step: 1,
                    format: {
                        to: function(value) {
                            return Math.round(value);
                        },
                        from: function(value) {
                            return Math.round(value);
                        }
                    }
                });

                // Update display values when slider changes
                slider.noUiSlider.on('update', function(values, handle) {
                    if (handle === 0) {
                        displayMinPrice.textContent = values[0];
                    } else {
                        displayMaxPrice.textContent = values[1];
                    }
                });

                // Only update hidden inputs and submit form when user finishes moving slider
                slider.noUiSlider.on('change', function(values) {
                    minPriceInput.value = values[0];
                    maxPriceInput.value = values[1];

                    // Only submit if values have changed from initial load
                    if (values[0] != minPrice || values[1] != maxPrice) {
                        filterForm.submit();
                    }
                });
            }
        });
    </script>
@endpush




