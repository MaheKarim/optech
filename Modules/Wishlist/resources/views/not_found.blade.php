
<div class="row justify-content-center mt-4">
    <div class=" col-xxl-7 col-xl-9  col-lg-10">
        <div class="not_found_main">
            <div class="not_found_thumb">
                <img src="{{ asset('frontend/assets/img/not-found-thumb.svg') }}" alt="thumb">
            </div>

            <div class="not_found_thumb_text">
                <h4>{{ __('Wishlist Empty') }}</h4>
                <p>
                    {{ __('An empty wishlist indicates that the previously added list of items has been cleared.') }}
                    <span> {{ __('Thank you') }}</span>
                </p>

                <a class="optech-default-btn " href="{{ route('user.dashboard') }}"
                   data-text="{{ __('See More') }}"><span class="btn-wraper">{{ __('See More') }}</span></a>
            </div>


        </div>
    </div>
</div>

