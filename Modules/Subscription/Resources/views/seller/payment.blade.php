
@extends('layout')

@section('title')
    <title>{{ __('translate.Payment') }}</title>
@endsection

@section('front-content')

    <!-- Main Start -->
    <main>
        <!-- Breadcrumb -->
        <section class="w-breadcrumb-area" style="background-image: url({{ asset($general_setting->breadcrumb_image) }});">
          <div class="container">
            <div class="row">
              <div class="col-auto">
                <div
                  class="position-relative z-2"
                  data-aos="fade-up"
                  data-aos-duration="1000"
                  data-aos-easing="linear"
                >
                  <h2 class="section-title-light mb-2">{{ __('translate.Payment') }}</h2>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb w-breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        {{ __('translate.Payment') }}
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Breadcrumb End -->

        
      <!-- Services Details Start -->
    <section class="py-110 bg-offWhite">
        <div class="container">
          <div class="row row-gap-4">
            <!-- Left -->
            <div class="col-xl-4 mt-30 mt-xl-0">
                <div class="plan-table bg-white">
                    <div class="plan-header d-flex align-items-center justify-content-between bg-offWhite" >
                    <div>
                        <h3 class="text-24 fw-bold text-dark-300">{{ $plan->plan_name }}</h3>
                        <h2 class="text-40 fw-bold">
                        {{ currency($plan->plan_price) }}
                        <span class="text-18 fw-normal">/
                            @if ($plan->expiration_date == 'monthly')
                            {{__('translate.Monthly')}}
                            @elseif ($plan->expiration_date == 'yearly')
                            {{__('translate.Yearly')}}
                            @elseif ($plan->expiration_date == 'lifetime')
                            {{__('translate.Lifetime')}}
                            @endif
                        </span>
                        </h2>
                    </div>
                    
                    </div>
                    <div class="plan-body mt-40 mb-40">
                    <ul>
                        <li class="d-flex align-items-center gap-3 py-1 fs-6 text-dark-200 fs-6 text-dark-200" >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="14"
                                height="14"
                                viewBox="0 0 14 14"
                                fill="none"
                            >
                                <circle cx="7" cy="7.00012" r="7" fill="#22BE0D" />
                                <path
                                d="M10.5269 4.36659C10.4746 4.31382 10.4123 4.27194 10.3437 4.24337C10.2751 4.21479 10.2016 4.20007 10.1272 4.20007C10.0529 4.20007 9.97936 4.21479 9.91076 4.24337C9.84216 4.27194 9.7799 4.31382 9.72757 4.36659L5.53378 8.56601L3.77182 6.79843C3.71748 6.74594 3.65334 6.70467 3.58306 6.67697C3.51278 6.64927 3.43772 6.63569 3.36219 6.637C3.28666 6.6383 3.21212 6.65447 3.14284 6.68459C3.07355 6.7147 3.01088 6.75816 2.95839 6.8125C2.9059 6.86683 2.86463 6.93097 2.83694 7.00126C2.80924 7.07154 2.79565 7.14659 2.79696 7.22213C2.79827 7.29766 2.81444 7.3722 2.84455 7.44148C2.87467 7.51077 2.91813 7.57344 2.97246 7.62593L5.1341 9.78756C5.18643 9.84032 5.24869 9.8822 5.31729 9.91078C5.38589 9.93936 5.45946 9.95407 5.53378 9.95407C5.60809 9.95407 5.68167 9.93936 5.75026 9.91078C5.81886 9.8822 5.88112 9.84032 5.93345 9.78756L10.5269 5.19409C10.5841 5.14137 10.6297 5.0774 10.6609 5.00619C10.692 4.93498 10.7082 4.85808 10.7082 4.78034C10.7082 4.7026 10.692 4.6257 10.6609 4.55449C10.6297 4.48328 10.5841 4.4193 10.5269 4.36659Z"
                                fill="white"
                                />
                            </svg>
                            @if ($plan->max_listing == -1)
                                {{ __('translate.Unlimited Service') }}
                            @else
                                {{ $plan->max_listing }} {{ __('translate.Service') }}
                            @endif
                        </li>

                        @if ($plan->featured_listing > 0)
                            <li class="d-flex align-items-center gap-3 py-1 fs-6 text-dark-200" >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="14"
                                    height="14"
                                    viewBox="0 0 14 14"
                                    fill="none"
                                >
                                    <circle cx="7" cy="7.00012" r="7" fill="#22BE0D" />
                                    <path
                                    d="M10.5269 4.36659C10.4746 4.31382 10.4123 4.27194 10.3437 4.24337C10.2751 4.21479 10.2016 4.20007 10.1272 4.20007C10.0529 4.20007 9.97936 4.21479 9.91076 4.24337C9.84216 4.27194 9.7799 4.31382 9.72757 4.36659L5.53378 8.56601L3.77182 6.79843C3.71748 6.74594 3.65334 6.70467 3.58306 6.67697C3.51278 6.64927 3.43772 6.63569 3.36219 6.637C3.28666 6.6383 3.21212 6.65447 3.14284 6.68459C3.07355 6.7147 3.01088 6.75816 2.95839 6.8125C2.9059 6.86683 2.86463 6.93097 2.83694 7.00126C2.80924 7.07154 2.79565 7.14659 2.79696 7.22213C2.79827 7.29766 2.81444 7.3722 2.84455 7.44148C2.87467 7.51077 2.91813 7.57344 2.97246 7.62593L5.1341 9.78756C5.18643 9.84032 5.24869 9.8822 5.31729 9.91078C5.38589 9.93936 5.45946 9.95407 5.53378 9.95407C5.60809 9.95407 5.68167 9.93936 5.75026 9.91078C5.81886 9.8822 5.88112 9.84032 5.93345 9.78756L10.5269 5.19409C10.5841 5.14137 10.6297 5.0774 10.6609 5.00619C10.692 4.93498 10.7082 4.85808 10.7082 4.78034C10.7082 4.7026 10.692 4.6257 10.6609 4.55449C10.6297 4.48328 10.5841 4.4193 10.5269 4.36659Z"
                                    fill="white"
                                    />
                                </svg>
                            {{ __('translate.Featured Service') }}
                            </li>
                        @else
                            <li class="d-flex align-items-center gap-3 py-1 fs-6 text-dark-200" >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="14"
                                    height="14"
                                    viewBox="0 0 14 14"
                                    fill="none"
                                >
                                    <circle cx="7" cy="7.00012" r="7" fill="#FF3838" />
                                    <path
                                    d="M10 4.00016L4 10.0001M10 10.0001L4 4.00012"
                                    stroke="white"
                                    stroke-width="1.2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    />
                                </svg>
                            {{ __('translate.Featured Service') }}
                            </li>

                        @endif
                        <li class="d-flex align-items-center gap-3 py-1 fs-6 text-dark-200" >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="14"
                                height="14"
                                viewBox="0 0 14 14"
                                fill="none"
                            >
                                <circle cx="7" cy="7.00012" r="7" fill="#22BE0D" />
                                <path
                                d="M10.5269 4.36659C10.4746 4.31382 10.4123 4.27194 10.3437 4.24337C10.2751 4.21479 10.2016 4.20007 10.1272 4.20007C10.0529 4.20007 9.97936 4.21479 9.91076 4.24337C9.84216 4.27194 9.7799 4.31382 9.72757 4.36659L5.53378 8.56601L3.77182 6.79843C3.71748 6.74594 3.65334 6.70467 3.58306 6.67697C3.51278 6.64927 3.43772 6.63569 3.36219 6.637C3.28666 6.6383 3.21212 6.65447 3.14284 6.68459C3.07355 6.7147 3.01088 6.75816 2.95839 6.8125C2.9059 6.86683 2.86463 6.93097 2.83694 7.00126C2.80924 7.07154 2.79565 7.14659 2.79696 7.22213C2.79827 7.29766 2.81444 7.3722 2.84455 7.44148C2.87467 7.51077 2.91813 7.57344 2.97246 7.62593L5.1341 9.78756C5.18643 9.84032 5.24869 9.8822 5.31729 9.91078C5.38589 9.93936 5.45946 9.95407 5.53378 9.95407C5.60809 9.95407 5.68167 9.93936 5.75026 9.91078C5.81886 9.8822 5.88112 9.84032 5.93345 9.78756L10.5269 5.19409C10.5841 5.14137 10.6297 5.0774 10.6609 5.00619C10.692 4.93498 10.7082 4.85808 10.7082 4.78034C10.7082 4.7026 10.692 4.6257 10.6609 4.55449C10.6297 4.48328 10.5841 4.4193 10.5269 4.36659Z"
                                fill="white"
                                />
                            </svg>
                            {{ $plan->featured_listing }} {{ __('translate.Featured Service') }}
                        </li>


                        @if ($plan->recommended_seller == 'active')
                            <li class="d-flex align-items-center gap-3 py-1 fs-6 text-dark-200" >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="14"
                                    height="14"
                                    viewBox="0 0 14 14"
                                    fill="none"
                                >
                                    <circle cx="7" cy="7.00012" r="7" fill="#22BE0D" />
                                    <path
                                    d="M10.5269 4.36659C10.4746 4.31382 10.4123 4.27194 10.3437 4.24337C10.2751 4.21479 10.2016 4.20007 10.1272 4.20007C10.0529 4.20007 9.97936 4.21479 9.91076 4.24337C9.84216 4.27194 9.7799 4.31382 9.72757 4.36659L5.53378 8.56601L3.77182 6.79843C3.71748 6.74594 3.65334 6.70467 3.58306 6.67697C3.51278 6.64927 3.43772 6.63569 3.36219 6.637C3.28666 6.6383 3.21212 6.65447 3.14284 6.68459C3.07355 6.7147 3.01088 6.75816 2.95839 6.8125C2.9059 6.86683 2.86463 6.93097 2.83694 7.00126C2.80924 7.07154 2.79565 7.14659 2.79696 7.22213C2.79827 7.29766 2.81444 7.3722 2.84455 7.44148C2.87467 7.51077 2.91813 7.57344 2.97246 7.62593L5.1341 9.78756C5.18643 9.84032 5.24869 9.8822 5.31729 9.91078C5.38589 9.93936 5.45946 9.95407 5.53378 9.95407C5.60809 9.95407 5.68167 9.93936 5.75026 9.91078C5.81886 9.8822 5.88112 9.84032 5.93345 9.78756L10.5269 5.19409C10.5841 5.14137 10.6297 5.0774 10.6609 5.00619C10.692 4.93498 10.7082 4.85808 10.7082 4.78034C10.7082 4.7026 10.692 4.6257 10.6609 4.55449C10.6297 4.48328 10.5841 4.4193 10.5269 4.36659Z"
                                    fill="white"
                                    />
                                </svg>
                                {{__('translate.Recommended Seller')}}
                            </li>
                        @else
                            <li class="d-flex align-items-center gap-3 py-1 fs-6 text-dark-200" >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="14"
                                    height="14"
                                    viewBox="0 0 14 14"
                                    fill="none"
                                >
                                    <circle cx="7" cy="7.00012" r="7" fill="#FF3838" />
                                    <path
                                    d="M10 4.00016L4 10.0001M10 10.0001L4 4.00012"
                                    stroke="white"
                                    stroke-width="1.2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    />
                                </svg>
                                {{__('translate.Recommended Seller')}}
                            </li>

                        @endif

                        <li class="d-flex align-items-center gap-3 py-1 fs-6 text-dark-200" >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="14"
                                height="14"
                                viewBox="0 0 14 14"
                                fill="none"
                            >
                                <circle cx="7" cy="7.00012" r="7" fill="#22BE0D" />
                                <path
                                d="M10.5269 4.36659C10.4746 4.31382 10.4123 4.27194 10.3437 4.24337C10.2751 4.21479 10.2016 4.20007 10.1272 4.20007C10.0529 4.20007 9.97936 4.21479 9.91076 4.24337C9.84216 4.27194 9.7799 4.31382 9.72757 4.36659L5.53378 8.56601L3.77182 6.79843C3.71748 6.74594 3.65334 6.70467 3.58306 6.67697C3.51278 6.64927 3.43772 6.63569 3.36219 6.637C3.28666 6.6383 3.21212 6.65447 3.14284 6.68459C3.07355 6.7147 3.01088 6.75816 2.95839 6.8125C2.9059 6.86683 2.86463 6.93097 2.83694 7.00126C2.80924 7.07154 2.79565 7.14659 2.79696 7.22213C2.79827 7.29766 2.81444 7.3722 2.84455 7.44148C2.87467 7.51077 2.91813 7.57344 2.97246 7.62593L5.1341 9.78756C5.18643 9.84032 5.24869 9.8822 5.31729 9.91078C5.38589 9.93936 5.45946 9.95407 5.53378 9.95407C5.60809 9.95407 5.68167 9.93936 5.75026 9.91078C5.81886 9.8822 5.88112 9.84032 5.93345 9.78756L10.5269 5.19409C10.5841 5.14137 10.6297 5.0774 10.6609 5.00619C10.692 4.93498 10.7082 4.85808 10.7082 4.78034C10.7082 4.7026 10.692 4.6257 10.6609 4.55449C10.6297 4.48328 10.5841 4.4193 10.5269 4.36659Z"
                                fill="white"
                                />
                            </svg>
                            {{__('translate.Unlimited Job Apply')}}
                        </li>


                        <li class="d-flex align-items-center gap-3 py-1 fs-6 text-dark-200" >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="14"
                                height="14"
                                viewBox="0 0 14 14"
                                fill="none"
                            >
                                <circle cx="7" cy="7.00012" r="7" fill="#22BE0D" />
                                <path
                                d="M10.5269 4.36659C10.4746 4.31382 10.4123 4.27194 10.3437 4.24337C10.2751 4.21479 10.2016 4.20007 10.1272 4.20007C10.0529 4.20007 9.97936 4.21479 9.91076 4.24337C9.84216 4.27194 9.7799 4.31382 9.72757 4.36659L5.53378 8.56601L3.77182 6.79843C3.71748 6.74594 3.65334 6.70467 3.58306 6.67697C3.51278 6.64927 3.43772 6.63569 3.36219 6.637C3.28666 6.6383 3.21212 6.65447 3.14284 6.68459C3.07355 6.7147 3.01088 6.75816 2.95839 6.8125C2.9059 6.86683 2.86463 6.93097 2.83694 7.00126C2.80924 7.07154 2.79565 7.14659 2.79696 7.22213C2.79827 7.29766 2.81444 7.3722 2.84455 7.44148C2.87467 7.51077 2.91813 7.57344 2.97246 7.62593L5.1341 9.78756C5.18643 9.84032 5.24869 9.8822 5.31729 9.91078C5.38589 9.93936 5.45946 9.95407 5.53378 9.95407C5.60809 9.95407 5.68167 9.93936 5.75026 9.91078C5.81886 9.8822 5.88112 9.84032 5.93345 9.78756L10.5269 5.19409C10.5841 5.14137 10.6297 5.0774 10.6609 5.00619C10.692 4.93498 10.7082 4.85808 10.7082 4.78034C10.7082 4.7026 10.692 4.6257 10.6609 4.55449C10.6297 4.48328 10.5841 4.4193 10.5269 4.36659Z"
                                fill="white"
                                />
                            </svg>
                            {{__('translate.24/7 Hour Support')}}
                        </li>

                    </ul>
                    </div>
                    
                </div>
            </div>
            <!-- Right -->
            <div class="col-xl-8">
              <div class="bg-white payment-options-wrapper">
                <ul class="payment-options">
                    @if ($payment_setting->stripe_status == 1)
                        <li class="single-payment-option position-relative" data-bs-toggle="modal"
                        data-bs-target="#stripePayment">
                            <div class="selected-icon">
                            <svg
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                d="M10.9919 21.9997C17.0625 21.9997 21.9837 17.0749 21.9837 10.9998C21.9837 4.9248 17.0625 0 10.9919 0C4.92122 0 0 4.9248 0 10.9998C0 17.0749 4.92122 21.9997 10.9919 21.9997Z"
                                fill="#22BE0D"
                                />
                                <path
                                d="M10.1583 14.0474C9.86772 14.052 9.58712 13.9413 9.3779 13.7394L6.87175 11.2754C6.66332 11.0697 6.54506 10.7896 6.543 10.4967C6.54093 10.2038 6.65524 9.92203 6.86076 9.71344C7.06628 9.50485 7.34619 9.38651 7.63891 9.38444C7.93162 9.38238 8.21317 9.49677 8.42161 9.70244L10.1583 11.4074L14.665 7.00748C14.7682 6.90564 14.8904 6.82514 15.0247 6.77058C15.159 6.71602 15.3027 6.68846 15.4477 6.68948C15.5926 6.6905 15.7359 6.72008 15.8694 6.77653C16.003 6.83298 16.1241 6.91519 16.2258 7.01848C16.3276 7.12176 16.408 7.24409 16.4626 7.37848C16.5171 7.51288 16.5446 7.6567 16.5436 7.80174C16.5426 7.94679 16.513 8.09021 16.4566 8.22382C16.4002 8.35743 16.318 8.47862 16.2148 8.58045L10.9277 13.7834C10.7144 13.9666 10.4391 14.0611 10.1583 14.0474Z"
                                fill="white"
                                />
                            </svg>
                            </div>
                            <img src="{{ asset($payment_setting->stripe_image) }}" alt="" />
                        </li>
                    @endif

                    @if ($payment_setting->paypal_status == 1)
                        <li class="single-payment-option position-relative" id="paypal_payment">
                            <div class="selected-icon">
                            <svg
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                d="M10.9919 21.9997C17.0625 21.9997 21.9837 17.0749 21.9837 10.9998C21.9837 4.9248 17.0625 0 10.9919 0C4.92122 0 0 4.9248 0 10.9998C0 17.0749 4.92122 21.9997 10.9919 21.9997Z"
                                fill="#22BE0D"
                                />
                                <path
                                d="M10.1583 14.0474C9.86772 14.052 9.58712 13.9413 9.3779 13.7394L6.87175 11.2754C6.66332 11.0697 6.54506 10.7896 6.543 10.4967C6.54093 10.2038 6.65524 9.92203 6.86076 9.71344C7.06628 9.50485 7.34619 9.38651 7.63891 9.38444C7.93162 9.38238 8.21317 9.49677 8.42161 9.70244L10.1583 11.4074L14.665 7.00748C14.7682 6.90564 14.8904 6.82514 15.0247 6.77058C15.159 6.71602 15.3027 6.68846 15.4477 6.68948C15.5926 6.6905 15.7359 6.72008 15.8694 6.77653C16.003 6.83298 16.1241 6.91519 16.2258 7.01848C16.3276 7.12176 16.408 7.24409 16.4626 7.37848C16.5171 7.51288 16.5446 7.6567 16.5436 7.80174C16.5426 7.94679 16.513 8.09021 16.4566 8.22382C16.4002 8.35743 16.318 8.47862 16.2148 8.58045L10.9277 13.7834C10.7144 13.9666 10.4391 14.0611 10.1583 14.0474Z"
                                fill="white"
                                />
                            </svg>
                            </div>
                            <img src="{{ asset($payment_setting->paypal_image) }}" alt="" />
                        </li>
                  @endif

                  @if ($payment_setting->razorpay_status == 1)
                  <li class="single-payment-option position-relative" id="razorpay_btn">
                    <div class="selected-icon">
                      <svg
                        width="22"
                        height="22"
                        viewBox="0 0 22 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M10.9919 21.9997C17.0625 21.9997 21.9837 17.0749 21.9837 10.9998C21.9837 4.9248 17.0625 0 10.9919 0C4.92122 0 0 4.9248 0 10.9998C0 17.0749 4.92122 21.9997 10.9919 21.9997Z"
                          fill="#22BE0D"
                        />
                        <path
                          d="M10.1583 14.0474C9.86772 14.052 9.58712 13.9413 9.3779 13.7394L6.87175 11.2754C6.66332 11.0697 6.54506 10.7896 6.543 10.4967C6.54093 10.2038 6.65524 9.92203 6.86076 9.71344C7.06628 9.50485 7.34619 9.38651 7.63891 9.38444C7.93162 9.38238 8.21317 9.49677 8.42161 9.70244L10.1583 11.4074L14.665 7.00748C14.7682 6.90564 14.8904 6.82514 15.0247 6.77058C15.159 6.71602 15.3027 6.68846 15.4477 6.68948C15.5926 6.6905 15.7359 6.72008 15.8694 6.77653C16.003 6.83298 16.1241 6.91519 16.2258 7.01848C16.3276 7.12176 16.408 7.24409 16.4626 7.37848C16.5171 7.51288 16.5446 7.6567 16.5436 7.80174C16.5426 7.94679 16.513 8.09021 16.4566 8.22382C16.4002 8.35743 16.318 8.47862 16.2148 8.58045L10.9277 13.7834C10.7144 13.9666 10.4391 14.0611 10.1583 14.0474Z"
                          fill="white"
                        />
                      </svg>
                    </div>
                    <img src="{{ asset($payment_setting->razorpay_image) }}" alt="" />
                  </li>

                  <form action="{{ route('seller.subscription.payment.razorpay', ['plan_id' => $plan->id]) }}" method="POST" class="d-none">
                    @csrf
                    @php


                        $payable_amount = $payable_amount * $razorpay_currency->currency_rate;
                        $payable_amount = round($payable_amount, 2);
                    @endphp
                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ $payment_setting->razorpay_key }}"
                            data-currency="{{ $razorpay_currency->currency_code }}"
                            data-amount= "{{ $payable_amount * 100 }}"
                            data-buttontext="{{ __('translate.Pay') }}"
                            data-name="{{ $payment_setting->razorpay_name }}"
                            data-description="{{ $payment_setting->razorpay_description }}"
                            data-image="{{ asset($payment_setting->razorpay_image) }}"
                            data-prefill.name=""
                            data-prefill.email=""
                            data-theme.color="{{ $payment_setting->razorpay_theme_color }}">
                    </script>
                </form>

                  @endif


                  @if ($payment_setting->flutterwave_status == 1)
                  <li class="single-payment-option position-relative" id="payWithFlutterwave">
                    <div class="selected-icon">
                      <svg
                        width="22"
                        height="22"
                        viewBox="0 0 22 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M10.9919 21.9997C17.0625 21.9997 21.9837 17.0749 21.9837 10.9998C21.9837 4.9248 17.0625 0 10.9919 0C4.92122 0 0 4.9248 0 10.9998C0 17.0749 4.92122 21.9997 10.9919 21.9997Z"
                          fill="#22BE0D"
                        />
                        <path
                          d="M10.1583 14.0474C9.86772 14.052 9.58712 13.9413 9.3779 13.7394L6.87175 11.2754C6.66332 11.0697 6.54506 10.7896 6.543 10.4967C6.54093 10.2038 6.65524 9.92203 6.86076 9.71344C7.06628 9.50485 7.34619 9.38651 7.63891 9.38444C7.93162 9.38238 8.21317 9.49677 8.42161 9.70244L10.1583 11.4074L14.665 7.00748C14.7682 6.90564 14.8904 6.82514 15.0247 6.77058C15.159 6.71602 15.3027 6.68846 15.4477 6.68948C15.5926 6.6905 15.7359 6.72008 15.8694 6.77653C16.003 6.83298 16.1241 6.91519 16.2258 7.01848C16.3276 7.12176 16.408 7.24409 16.4626 7.37848C16.5171 7.51288 16.5446 7.6567 16.5436 7.80174C16.5426 7.94679 16.513 8.09021 16.4566 8.22382C16.4002 8.35743 16.318 8.47862 16.2148 8.58045L10.9277 13.7834C10.7144 13.9666 10.4391 14.0611 10.1583 14.0474Z"
                          fill="white"
                        />
                      </svg>
                    </div>
                    <img src="{{ asset($payment_setting->flutterwave_logo) }}" alt="" />
                  </li>

                  @endif

                  @if ($payment_setting->mollie_status == 1)
                  <li class="single-payment-option position-relative" id="mollie_payment">
                    <div class="selected-icon">
                      <svg
                        width="22"
                        height="22"
                        viewBox="0 0 22 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M10.9919 21.9997C17.0625 21.9997 21.9837 17.0749 21.9837 10.9998C21.9837 4.9248 17.0625 0 10.9919 0C4.92122 0 0 4.9248 0 10.9998C0 17.0749 4.92122 21.9997 10.9919 21.9997Z"
                          fill="#22BE0D"
                        />
                        <path
                          d="M10.1583 14.0474C9.86772 14.052 9.58712 13.9413 9.3779 13.7394L6.87175 11.2754C6.66332 11.0697 6.54506 10.7896 6.543 10.4967C6.54093 10.2038 6.65524 9.92203 6.86076 9.71344C7.06628 9.50485 7.34619 9.38651 7.63891 9.38444C7.93162 9.38238 8.21317 9.49677 8.42161 9.70244L10.1583 11.4074L14.665 7.00748C14.7682 6.90564 14.8904 6.82514 15.0247 6.77058C15.159 6.71602 15.3027 6.68846 15.4477 6.68948C15.5926 6.6905 15.7359 6.72008 15.8694 6.77653C16.003 6.83298 16.1241 6.91519 16.2258 7.01848C16.3276 7.12176 16.408 7.24409 16.4626 7.37848C16.5171 7.51288 16.5446 7.6567 16.5436 7.80174C16.5426 7.94679 16.513 8.09021 16.4566 8.22382C16.4002 8.35743 16.318 8.47862 16.2148 8.58045L10.9277 13.7834C10.7144 13.9666 10.4391 14.0611 10.1583 14.0474Z"
                          fill="white"
                        />
                      </svg>
                    </div>
                    <img src="{{ asset($payment_setting->mollie_image) }}" alt="" />
                  </li>
                  @endif


                  @if ($payment_setting->paystack_status == 1)
                  <li class="single-payment-option position-relative" id="paystackPayment">
                    <div class="selected-icon">
                      <svg
                        width="22"
                        height="22"
                        viewBox="0 0 22 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M10.9919 21.9997C17.0625 21.9997 21.9837 17.0749 21.9837 10.9998C21.9837 4.9248 17.0625 0 10.9919 0C4.92122 0 0 4.9248 0 10.9998C0 17.0749 4.92122 21.9997 10.9919 21.9997Z"
                          fill="#22BE0D"
                        />
                        <path
                          d="M10.1583 14.0474C9.86772 14.052 9.58712 13.9413 9.3779 13.7394L6.87175 11.2754C6.66332 11.0697 6.54506 10.7896 6.543 10.4967C6.54093 10.2038 6.65524 9.92203 6.86076 9.71344C7.06628 9.50485 7.34619 9.38651 7.63891 9.38444C7.93162 9.38238 8.21317 9.49677 8.42161 9.70244L10.1583 11.4074L14.665 7.00748C14.7682 6.90564 14.8904 6.82514 15.0247 6.77058C15.159 6.71602 15.3027 6.68846 15.4477 6.68948C15.5926 6.6905 15.7359 6.72008 15.8694 6.77653C16.003 6.83298 16.1241 6.91519 16.2258 7.01848C16.3276 7.12176 16.408 7.24409 16.4626 7.37848C16.5171 7.51288 16.5446 7.6567 16.5436 7.80174C16.5426 7.94679 16.513 8.09021 16.4566 8.22382C16.4002 8.35743 16.318 8.47862 16.2148 8.58045L10.9277 13.7834C10.7144 13.9666 10.4391 14.0611 10.1583 14.0474Z"
                          fill="white"
                        />
                      </svg>
                    </div>
                    <img src="{{ asset($payment_setting->paystack_image) }}" alt="" />
                  </li>
                  @endif

                  @if ($payment_setting->instamojo_status == 1)
                  <li class="single-payment-option position-relative" id="instamojoPayment">
                    <div class="selected-icon">
                      <svg
                        width="22"
                        height="22"
                        viewBox="0 0 22 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M10.9919 21.9997C17.0625 21.9997 21.9837 17.0749 21.9837 10.9998C21.9837 4.9248 17.0625 0 10.9919 0C4.92122 0 0 4.9248 0 10.9998C0 17.0749 4.92122 21.9997 10.9919 21.9997Z"
                          fill="#22BE0D"
                        />
                        <path
                          d="M10.1583 14.0474C9.86772 14.052 9.58712 13.9413 9.3779 13.7394L6.87175 11.2754C6.66332 11.0697 6.54506 10.7896 6.543 10.4967C6.54093 10.2038 6.65524 9.92203 6.86076 9.71344C7.06628 9.50485 7.34619 9.38651 7.63891 9.38444C7.93162 9.38238 8.21317 9.49677 8.42161 9.70244L10.1583 11.4074L14.665 7.00748C14.7682 6.90564 14.8904 6.82514 15.0247 6.77058C15.159 6.71602 15.3027 6.68846 15.4477 6.68948C15.5926 6.6905 15.7359 6.72008 15.8694 6.77653C16.003 6.83298 16.1241 6.91519 16.2258 7.01848C16.3276 7.12176 16.408 7.24409 16.4626 7.37848C16.5171 7.51288 16.5446 7.6567 16.5436 7.80174C16.5426 7.94679 16.513 8.09021 16.4566 8.22382C16.4002 8.35743 16.318 8.47862 16.2148 8.58045L10.9277 13.7834C10.7144 13.9666 10.4391 14.0611 10.1583 14.0474Z"
                          fill="white"
                        />
                      </svg>
                    </div>
                    <img src="{{ asset($payment_setting->instamojo_image) }}" alt="" />
                  </li>

                  @endif

                  @if ($payment_setting->bank_status == 1)
                  <li class="single-payment-option position-relative" data-bs-toggle="modal"
                  data-bs-target="#bankPayment">
                    <div class="selected-icon">
                      <svg
                        width="22"
                        height="22"
                        viewBox="0 0 22 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M10.9919 21.9997C17.0625 21.9997 21.9837 17.0749 21.9837 10.9998C21.9837 4.9248 17.0625 0 10.9919 0C4.92122 0 0 4.9248 0 10.9998C0 17.0749 4.92122 21.9997 10.9919 21.9997Z"
                          fill="#22BE0D"
                        />
                        <path
                          d="M10.1583 14.0474C9.86772 14.052 9.58712 13.9413 9.3779 13.7394L6.87175 11.2754C6.66332 11.0697 6.54506 10.7896 6.543 10.4967C6.54093 10.2038 6.65524 9.92203 6.86076 9.71344C7.06628 9.50485 7.34619 9.38651 7.63891 9.38444C7.93162 9.38238 8.21317 9.49677 8.42161 9.70244L10.1583 11.4074L14.665 7.00748C14.7682 6.90564 14.8904 6.82514 15.0247 6.77058C15.159 6.71602 15.3027 6.68846 15.4477 6.68948C15.5926 6.6905 15.7359 6.72008 15.8694 6.77653C16.003 6.83298 16.1241 6.91519 16.2258 7.01848C16.3276 7.12176 16.408 7.24409 16.4626 7.37848C16.5171 7.51288 16.5446 7.6567 16.5436 7.80174C16.5426 7.94679 16.513 8.09021 16.4566 8.22382C16.4002 8.35743 16.318 8.47862 16.2148 8.58045L10.9277 13.7834C10.7144 13.9666 10.4391 14.0611 10.1583 14.0474Z"
                          fill="white"
                        />
                      </svg>
                    </div>
                    <img src="{{ asset($payment_setting->bank_image) }}" alt="" />
                  </li>
                  @endif


                 

                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      </main>
      <!-- Main End -->


        {{-- start stripe modal --}}
    <div class="modal fade" id="stripePayment" tabindex="-1" aria-labelledby="stripePaymentLabel"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="bg-white p-lg-5 rounded-3">
                        <div class="proposal-container">
                            <div class="proposal-header">
                                <h3 class="text-dark-300 text-24 fw-bold">{{ __('translate.Pay via Stripe') }}</h3>
                            </div>
                            <form class="stripe-modal-form require-validation " role="form" action="{{ route('seller.subscription.payment.stripe', ['plan_id' => $plan->id]) }}" method="POST" data-cc-on-file="false" data-stripe-publishable-key="{{ $payment_setting->stripe_key }}" id="payment-form">
                                @csrf

                                <div class="d-flex flex-column gap-4">

                                    <div class="proposal-input-container">
                                        <label for="amount" class="proposal-form-label" >{{ __('translate.Card Number') }}*</label>
                                        <input type="text"  class="form-control shadow-none card-number" placeholder="{{ __('translate.Card Number') }}" name="card_number"/>
                                    </div>

                                    <div class="proposal-input-container">
                                        <label for="amount" class="proposal-form-label" >{{ __('translate.Expired Month') }}*</label>
                                        <input type="text"  class="form-control shadow-none card-expiry-month" placeholder="{{ __('translate.Expired Month') }}" name="month"/>
                                    </div>

                                    <div class="proposal-input-container">
                                        <label for="amount" class="proposal-form-label" >{{ __('translate.Expired Year') }}*</label>
                                        <input type="text"  class="form-control shadow-none card-expiry-year" placeholder="{{ __('translate.Expired Year') }}" name="year"/>
                                    </div>

                                    <div class="proposal-input-container">
                                        <label for="amount" class="proposal-form-label" >{{ __('translate.CVC') }}*</label>
                                        <input type="text"  class="form-control shadow-none card-cvc" placeholder="{{ __('translate.CVC') }}" name="cvc"/>
                                    </div>

                                    <div class="proposal-input-container stripe_error d-none">
                                        <div class="stripe-modal-form-inner">
                                            <div class='alert-danger alert '>{{ __('translate.Please provide your valid card information') }}</div>
                                        </div>
                                    </div>


                                    <div class="d-flex gap-4 align-items-center justify-content-end" >
                                        <button type="button" class="w-btn-gray-sm" data-bs-dismiss="modal">
                                            {{ __('translate.Cancel') }}
                                        </button>
                                        <button class="w-btn-secondary-sm">
                                            {{ __('translate.Pay Now') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  {{-- end stripe modal --}}


      {{-- start bank modal --}}
      <div class="modal fade" id="bankPayment" tabindex="-1" aria-labelledby="jobDetailsModalLabel"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="bg-white p-lg-5 rounded-3">
                        <div class="proposal-container">
                            <div class="proposal-header">
                                <h3 class="text-dark-300 text-24 fw-bold">{{ __('translate.Pay via Bank') }}</h3>
                            </div>
                            <form action="{{ route('seller.subscription.payment.bank', $plan->id) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    {!! clean(nl2br($payment_setting->bank_account_info)) !!}
                                </div>


                                <div class="d-flex flex-column gap-4">

                                    <div class="proposal-input-container">
                                        <label for="time" class="proposal-form-label" >{{ __('translate.Transaction information') }}*</label >
                                        <textarea placeholder="{{ ('Transaction information') }}" class="form-textarea shadow-none" name="tnx_info"></textarea>
                                    </div>

                                    <div class="d-flex gap-4 align-items-center justify-content-end" >
                                        <button type="button" class="w-btn-gray-sm" data-bs-dismiss="modal">
                                            {{ __('translate.Cancel') }}
                                        </button>
                                        <button class="w-btn-secondary-sm">
                                            {{ __('translate.Submit Now') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  {{-- end bank modal --}}

@endsection



@push('js_section')
    <!-- Stripe JS -->

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        "use strict";
        $(function() {

            var $form = $(".require-validation");
            $('form.require-validation').on('submit', function(e) {
                var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                    'input[type=text]', 'input[type=file]',
                                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.stripe_error'),
                valid         = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.stripe_error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

            $("#paypal_payment").on("click", function(){
                window.location.href = "{{ url('seller/subscription/payment/paypal/') }}" + "/" + "{{ $plan->id }}" ;
            })


            $("#razorpay_btn").on("click", function(){
                $(".razorpay-payment-button").click();
            })

            $("#mollie_payment").on("click", function(){
                window.location.href = "{{ url('seller/subscription/payment/mollie/') }}" + "/" + "{{ $plan->id }}" ;
            })

            $("#instamojoPayment").on("click", function(){
                window.location.href = "{{ url('seller/subscription/payment/instamojo/') }}" + "/" + "{{ $plan->id }}" ;
            })

            $("#walletPayment").on("click", function(){
                window.location.href = "{{ url('seller/subscription/payment/wallet/') }}" + "/" + "{{ $plan->id }}" ;
            })





        });
    </script>



@if ($payment_setting->bank_status == 1)

    <script src="https://checkout.flutterwave.com/v3.js"></script>

    @php
        $payable_amount = $payable_amount * $flutterwave_currency->currency_rate;
        $payable_amount = round($payable_amount, 2);
    @endphp

<script>
    "use strict";
    $(function() {
        $("#payWithFlutterwave").on("click", function(){

            var isDemo = "{{ env('APP_MODE') }}"
            if(isDemo == 'DEMO'){
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }

            FlutterwaveCheckout({
                public_key: "{{ $payment_setting->flutterwave_public_key }}",
                tx_ref: "{{ substr(rand(0,time()),0,10) }}",
                amount: {{ $payable_amount }},
                currency: "{{ $flutterwave_currency->currency_code }}",
                country: "{{ $flutterwave_currency->country_code }}",
                payment_options: " ",
                customer: {
                email: "{{ $user->email }}",
                phone_number: "{{ $user->phone }}",
                name: "{{ $user->name }}",
                },
                callback: function (data) {

                    var tnx_id = data.transaction_id;
                    var _token = "{{ csrf_token() }}";
                    $.ajax({
                        type: 'post',
                        data : {tnx_id,_token},
                        url: "{{ url('seller/subscription/payment/flutterwave/') }}" + "/" + "{{ $plan->id }}" ,
                        success: function (response) {

                            if(response.status == 'success'){
                                toastr.success(response.message);
                                window.location.href = "{{ route('seller.subscription.purchase-history') }}";
                            }else{
                                toastr.error(response.message);
                                window.location.reload();
                            }
                        },
                        error: function(err) {
                            toastr.error("{{ __('translate.Something went wrong, please try again') }}");
                            window.location.reload();
                        }
                    });
                },
                customizations: {
                title: "{{ $payment_setting->flutterwave_title }}",
                logo: "{{ asset($payment_setting->flutterwave_logo) }}",
                },
            });

        })
    });

    </script>
@endif


{{-- start paystack payment --}}

@if ($payment_setting->paystack_status == 1)
<script src="https://js.paystack.co/v1/inline.js"></script>

@php

    $public_key = $payment_setting->paystack_public_key;
    $currency = $paystack_currency->currency_code;
    $currency = strtoupper($currency);

    $ngn_amount = $payable_amount * $paystack_currency->currency_rate;
    $ngn_amount = $ngn_amount * 100;
    $ngn_amount = round($ngn_amount);

@endphp

<script>
    "use strict";
    $(function() {
        $("#paystackPayment").on("click", function(){

            var isDemo = "{{ env('APP_MODE') }}"
            if(isDemo == 'DEMO'){
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }

            var handler = PaystackPop.setup({
                            key: '{{ $public_key }}',
                            email: '{{ $user->email }}',
                            amount: '{{ $ngn_amount }}',
                            currency: "{{ $currency }}",
                            callback: function(response){
                                let reference = response.reference;
                                let tnx_id = response.transaction;
                                let _token = "{{ csrf_token() }}";
                                $.ajax({
                                    type: "get",
                                    data: {reference, tnx_id, _token},
                                    url: "{{ url('seller/subscription/payment/paystack') }}" + "/" + "{{ $plan->id }}" ,
                                    success: function(response) {
                                        if(response.status == 'success'){
                                            toastr.success(response.message);
                                            window.location.href = "{{ route('seller.subscription.purchase-history') }}";
                                        }else{
                                            toastr.error(response.message);
                                            window.location.reload();
                                        }
                                    },
                                    error: function(response){
                                            toastr.error('Server Error');
                                            window.location.reload();
                                    }
                                });
                            },
                            onClose: function(){
                                alert('window closed');
                            }
                        });
                handler.openIframe();

        })
    });
</script>

@endif

{{-- end paystack payment --}}


@endpush
