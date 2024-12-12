<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('translate.Razorpay') }}</title>
    <link rel="shortcut icon" href="{{ asset($general_setting->favicon) }}" type="image/x-icon">

</head>
<body>
    <p style="text-align: center">{{ __('translate.Please wait. Your payment is processing....') }}</p>
    <p style="text-align: center">{{ __('translate.Do not press browser back or forward button while you are in payment page') }}</p>



    <form action="{{ route('buyer.wallet-payment.razorpay-store') }}" style="display: none" method="POST">
        @csrf
        @php
            $payable_amount = Session::get('wallet_amount') * $razorpay_currency->currency_rate;;
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


    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $(".razorpay-payment-button").click();
            });
        })(jQuery);

    </script>

   
</body>
</html>
