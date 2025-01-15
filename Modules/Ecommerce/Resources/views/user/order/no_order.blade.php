

<div class="row justify-content-center">
    <div class=" col-xxl-7 col-xl-9  col-lg-10">
        <div class="not_found_main order_list_not_found">
            <div class="not_found_thumb">
                <img src="{{ asset('frontend/assets/img/not-found-thumb.svg') }}" alt="thumb">
            </div>

            <div class="not_found_thumb_text">
                <h4>{{ __('Order List Empty') }}</h4>
                <p>
                    {{ __('An empty order typically means that you did not place an order.') }}
                    <span>{{ __('Thank you') }}</span>
                </p>

                <a class="optech-default-btn " href="{{ route('user-order.index') }}"
                   data-text="{{ __('Search Again') }}"><span class="btn-wraper">{{ __('Search Again') }}</span></a>
            </div>

        </div>
    </div>
</div>
