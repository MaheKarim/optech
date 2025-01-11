@extends('layout')
@section('title')
<title>{{ $seo_setting->seo_title }}</title>
<meta name="title" content="{{ $seo_setting->seo_title }}">
<meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('body-content')
<main>
    <div class="inner-bg" style="background-image:  url({{ asset($breadcrumb) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="inner-bg-txt">
                        <h1>{{ __('translate.Payment') }}</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                            <li><span>
                                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.633816 2.7705e-08C0.446997 0.0532405 0.28353 0.143084 0.158011 0.319443C-0.0492418 0.618921 -0.0550799 1.0515 0.155092 1.35098C0.195958 1.40755 0.239744 1.46411 0.286449 1.51735C1.56499 2.97481 2.84645 4.4356 4.125 5.89306C4.15419 5.92633 4.18922 5.95295 4.24176 6.03281C4.20673 6.0561 4.16295 6.06941 4.13375 6.10269C2.84062 7.57346 1.5504 9.04755 0.257258 10.5183C0.0295721 10.7779 -0.0579994 11.0773 0.0412483 11.4367C0.187201 11.9591 0.776848 12.1721 1.16216 11.8427C1.20595 11.8061 1.24682 11.7628 1.28768 11.7196C2.7764 10.0225 4.26511 8.32881 5.75091 6.63177C6.02238 6.32231 6.07492 5.92966 5.89394 5.57361C5.85015 5.4871 5.78594 5.41056 5.72464 5.34069C4.27971 3.69356 2.83478 2.04976 1.39277 0.399304C1.23222 0.216289 1.06875 0.0532405 0.838149 3.66367e-08C0.771011 3.3702e-08 0.703873 3.07673e-08 0.633816 2.7705e-08Z" />
                                    </svg>

                                </span></li>
                            <li><a href="#">{{ __('translate.Payment') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Part End  -->

    <!-- Checkout Part Start  -->
    <section class="checkout ">
        <div class="container">
            @if(!auth()->guard('web')->user())
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <p class="deception-medium">{{ __('translate.Place your Order you must be Login') }}</p>
                </div>
            </div>
            @endif
            <div class="row">
                @if(auth()->guard('web')->user())

                <div class="col-lg-8 col-md-7">
                    <div class="payment_box">
                        <div class="payment_box_main">
                            @if ($stripe->status == 1)
                                <a href="javascript:;" class="payment_box_item" data-bs-toggle="modal" data-bs-target="#stripeModal">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2" fill="#FD4917" />
                                            <path
                                                d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <img src="{{ asset($stripe->image) }}" alt="logo">
                                </a>
                            @endif

                            @if ($paypal->status == 1)
                                <a href="javascript:;" class="payment_box_item" id="paypal_btn">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2" fill="#FD4917" />
                                            <path
                                                d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <img src="{{ asset($paypal->image) }}" alt="logo">
                                </a>
                            @endif

                            @if ($razorpay->status == 1)
                                <a href="javascript:;" class="payment_box_item" id="razorpay_btn">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2" fill="#FD4917" />
                                            <path
                                                d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <img src="{{ asset($razorpay->image) }}" alt="logo">
                                </a>

                                <form action="{{ route('ecommerce.pay-razorpay') }}" method="POST" class="d-none">
                                    @csrf
                                    @php
                                        $payable_amount = $total * $razorpay->currency->currency_rate;
                                        $payable_amount = round($payable_amount, 2);
                                    @endphp
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ $razorpay->key }}"
                                            data-currency="{{ $razorpay->currency->currency_code }}"
                                            data-amount= "{{ $payable_amount * 100 }}"
                                            data-buttontext="{{ __('translate.Pay') }} {{ $payable_amount }} {{ $razorpay->currency->currency_code }}"
                                            data-name="{{ $razorpay->name }}"
                                            data-description="{{ $razorpay->description }}"
                                            data-image="{{ asset($razorpay->image) }}"
                                            data-prefill.name=""
                                            data-prefill.email=""
                                            data-theme.color="{{ $razorpay->color }}">
                                    </script>
                                </form>

                            @endif

                            @if ($flutterwave->status == 1)
                                <a href="javascript:;" class="payment_box_item" id="flutterwavePayment">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2" fill="#FD4917" />
                                            <path
                                                d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <img src="{{ asset($flutterwave->logo) }}" alt="logo">
                                </a>
                            @endif

                            @if ($paystack->paystack_status == 1)
                                <a href="javascript:;" class="payment_box_item" id="paystackPayment">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2" fill="#FD4917" />
                                            <path
                                                d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <img src="{{ asset($paystack->paystack_image) }}" alt="logo">
                                </a>
                            @endif

                            @if ($mollie->mollie_status == 1)
                                <a href="javascript:;" class="payment_box_item" id="mollie_payment_btn">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2" fill="#FD4917" />
                                            <path
                                                d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <img src="{{ asset($mollie->mollie_image) }}" alt="logo">
                                </a>
                            @endif

                            @if ($instamojo->status == 1)
                                <a href="javascript:;" class="payment_box_item" id="instamojo_payment_btn">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2" fill="#FD4917" />
                                            <path
                                                d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <img src="{{ asset($instamojo->image) }}" alt="logo">
                                </a>
                            @endif

                            @if ($bank->status == 1)
                                <a href="javascript:;" class="payment_box_item" data-bs-toggle="modal"
                                data-bs-target="#bankModal">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="18" height="18" rx="2" fill="#FD4917" />
                                            <path
                                                d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <img src="{{ asset($bank->image) }}" alt="logo">
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="checkout-subtotal mt-0">
                        <h4 class="checkout-subtotal-txt">{{ __('translate.Your Order') }}</h4>
                        <p class="checkout-subtotal-item">{{ __('translate.Product') }} <span>{{ __('translate.Subtotal') }}</span></p>

                        @foreach($carts as $cart)
                            <ul class="checkout-subtotal-list">
                                <li>{{ $cart->product->name }}
                                    <span>{{ currency($cart->product->finalPrice * $cart->quantity) }}</span></li>
                                <li class="li-db">{{ __('translate.Quantity') }} <span> X {{ $cart->quantity }}</span></li>
                            </ul>
                        @endforeach

                        <ul class="checkout-subtotal-list two">
                            <li class="sub_total">{{ __('translate.Sub Total') }}
                                <span>{{ currency($sub_total) }}</span></li>
                            <li class="shipping_cost">{{ __('translate.Shipping') }} <span>(+){{ currency($shipping_charge) }}</span>
                            </li>
                        </ul>

                        <ul class="checkout-subtotal-list three">
                            <li class="total">{{ __('translate.Total') }} <span>{{ currency($total) }}</span></li>
                        </ul>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </section>
    <!-- Modal Start -->

    <!-- stripe-modal  -->
    <div class="modal stripe-modal fade" id="stripeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Pay via Stripe') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="payment-modal-item">
                        <h4>{{ __('translate.Amount') }}<span>{{ currency($total) }}</span></h4>
                    </div>
                    <form class="stripe-modal-form require-validation " role="form" action="{{ route('ecommerce.stripe') }}" method="POST" data-cc-on-file="false" data-stripe-publishable-key="{{ $stripe->stripe_key }}" id="payment-form">
                        @csrf
                        <div class="stripe-modal-form-item">
                            <div class="stripe-modal-form-inner">
                                <input type="text" class="card-number form-control" name="card_number" placeholder="{{ __('translate.Card Number') }}">
                            </div>
                        </div>
                        <div class="stripe-modal-form-item">
                            <div class="stripe-modal-form-inner">
                                <input type="text" class="card-expiry-month form-control" name="month" placeholder="{{ __('translate.Expired Month') }}">
                            </div>
                            <div class="stripe-modal-form-inner">
                                <input type="text" class="card-expiry-year form-control" name="year" placeholder="{{ __('translate.Expired Year') }}">
                            </div>
                        </div>
                        <div class="stripe-modal-form-item">
                            <div class="stripe-modal-form-inner">
                                <input type="text" class="card-cvc form-control" name="cvc" placeholder="{{ __('translate.CVC') }}">
                            </div>
                        </div>

                        <div class="stripe-modal-form-item stripe_error d-none">
                            <div class="stripe-modal-form-inner">
                                <div class='alert-danger alert '>{{ __('translate.Please provide your valid card information') }}</div>
                            </div>
                        </div>

                        <div class="stripe-modal-form-item">
                            <div class="stripe-modal-form-inner">
                                <a class="main-btn " href="javascript:;" id="stripe_form_btn">
                                    <div class="btn_m">
                                        <div class="btn_c">
                                            <div class="">{{ __('translate.Payment Now') }}</div>
                                            <div class="btn_t2">{{ __('translate.Payment Now') }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- banck Modal -->
    <div class="modal banck-modal stripe-modal fade" id="bankModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('translate.Bank Payment') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="payment-modal-item">
                        <h4>{{ __('translate.Amount') }}<span>{{ currency($total) }}</span></h4>
                    </div>
                    <div class="bank-payment-modal-txt">
                        {!! clean(nl2br($bank->account_info)) !!}
                    </div>
                    <form class="payment-modal-from" action="{{ route('ecommerce.bank') }}" method="POST" id="bank_payment_form">
                        @csrf
                        <div class="bank-payment-form-item">
                            <div class="bank-payment-form-inner">
                                <textarea class="form-control" id="exampleFormControlTextarea1" required rows="3"
                                placeholder="{{ __('translate.Transaction information') }}" name="tnx_info"></textarea>
                            </div>
                        </div>
                        <div class="bank-payment-form-item">
                            <div class="bank-payment-form-inner">
                                <a class="main-btn " href="javascript:;" id="bank_payment_btn">
                                    <div class="btn_m">
                                        <div class="btn_c">
                                            <div class="btn_t1">{{ __('translate.Payment Now') }}</div>
                                            <div class="btn_t2">{{ __('translate.Payment Now') }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
@push('js_section')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    "use strict";
    $(function() {

        $("#stripe_form_btn").on("click", function(){
            $("#payment-form").submit();
        })

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

        $("#razorpay_btn").on("click", function(){
            $(".razorpay-payment-button").click();
        })

        $("#paypal_btn").on("click", function(){
            window.location.href = "{{ route('user.pay-via-paypal') }}";
        })

        $("#mollie_payment_btn").on("click", function(){
            window.location.href = "{{ route('ecommerce.pay-via-mollie') }}";
        })

        $("#instamojo_payment_btn").on("click", function(){
            window.location.href = "{{ route('ecommerce.pay-via-instamojo') }}";
        })

        $("#bank_payment_btn").on("click", function(){
            $("#bank_payment_form").submit();
        })


    });
</script>

 {{-- start flutterwave payment --}}
 @if ($flutterwave->status == 1)
 <script src="https://checkout.flutterwave.com/v3.js"></script>

 @php
     $payable_amount = $total * $flutterwave->currency->currency_rate;
     $payable_amount = round($payable_amount, 2);


 @endphp

 <script>
     "use strict";
     $(function() {
         $("#flutterwavePayment").on("click", function(){

             var isDemo = "{{ env('APP_MODE') }}"
             if(isDemo == 'DEMO'){
                 toastr.error('This Is Demo Version. You Can Not Change Anything');
                 return;
             }

             FlutterwaveCheckout({
                 public_key: "{{ $flutterwave->public_key }}",
                 tx_ref: "{{ substr(rand(0,time()),0,10) }}",
                 amount: {{ $payable_amount }},
                 currency: "{{ $flutterwave->currency->currency_code }}",
                 country: "{{ $flutterwave->currency->country_code }}",
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
                         url: "{{ route('ecommerce.pay-via-flutterwave') }}",
                         success: function (response) {

                             if(response.status == 'success'){
                                 toastr.success(response.message);
                                 window.location.href = "{{ route('user-order.index') }}";
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
                 title: "{{ $flutterwave->title }}",
                 logo: "{{ asset($flutterwave->logo) }}",
                 },
             });
         })
     });
 </script>

@endif

{{-- end flutterwave payment --}}

{{-- start paystack payment --}}

@if ($paystack->paystack_status == 1)
<script src="https://js.paystack.co/v1/inline.js"></script>

@php

    $public_key = $paystack->paystack_public_key;
    $currency = $paystack->paystack_currency->currency_code;
    $currency = strtoupper($currency);

    $ngn_amount = $total * $paystack->paystack_currency->currency_rate;
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
                                    url: "{{ route('ecommerce.pay-via-paystack') }}",
                                    success: function(response) {
                                        if(response.status == 'success'){
                                            toastr.success(response.message);
                                            window.location.href = "{{ route('user-order.index') }}";
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
