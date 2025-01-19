<div class="col-xl-9 col-lg-8 col-md-7">
    <!-- End section -->
    <div class="row justify-content-center">
        <div class="col-xxl-6  col-xl-8 col-lg-10">
            <div class="shop_not_found">
                <div class="shop_not_found_thumb">
                    <img src="{{ asset('frontend/assets/img/shop/not-found.svg') }}" alt="thumb">
                </div>
                <div class="shop_not_found_text">
                    <h2>{{ __('Search Not Found') }}</h2>
                    <p>
                        @if(request('query'))
                            {{__('No results found for')}} "{{ request('query') }}
                            ". {{ __('Please try a different search term.') }}
                        @else
                            {{ __('Not Found: It seems the saved search is no longer active.') }}
                        @endif
                        <span>{{ __('Thank you') }}</span>
                    </p>
                </div>
                <a class="optech-default-btn" href="{{ route('product.shop') }}"
                   data-text="{{ __('Back to Shop') }}">
                    <span class="btn-wraper">{{ __('Back to Shop') }}</span>
                </a>
            </div>

        </div>
    </div>
    <!-- End section -->
</div>
