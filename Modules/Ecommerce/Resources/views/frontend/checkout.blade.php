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
                        <h1>{{ __('translate.Checkout') }}</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                            <li><span>
                                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.633816 2.7705e-08C0.446997 0.0532405 0.28353 0.143084 0.158011 0.319443C-0.0492418 0.618921 -0.0550799 1.0515 0.155092 1.35098C0.195958 1.40755 0.239744 1.46411 0.286449 1.51735C1.56499 2.97481 2.84645 4.4356 4.125 5.89306C4.15419 5.92633 4.18922 5.95295 4.24176 6.03281C4.20673 6.0561 4.16295 6.06941 4.13375 6.10269C2.84062 7.57346 1.5504 9.04755 0.257258 10.5183C0.0295721 10.7779 -0.0579994 11.0773 0.0412483 11.4367C0.187201 11.9591 0.776848 12.1721 1.16216 11.8427C1.20595 11.8061 1.24682 11.7628 1.28768 11.7196C2.7764 10.0225 4.26511 8.32881 5.75091 6.63177C6.02238 6.32231 6.07492 5.92966 5.89394 5.57361C5.85015 5.4871 5.78594 5.41056 5.72464 5.34069C4.27971 3.69356 2.83478 2.04976 1.39277 0.399304C1.23222 0.216289 1.06875 0.0532405 0.838149 3.66367e-08C0.771011 3.3702e-08 0.703873 3.07673e-08 0.633816 2.7705e-08Z" />
                                    </svg>

                                </span></li>
                            <li><a href="#">{{ __('translate.Checkout') }}</a></li>
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
              <form class="form-main" action="{{route('checkout.process-to-payment')}}" method="get">
                    <div class="row">
                        @if(auth()->guard('web')->user())

                            <div class="col-lg-8">
                                <div class="checkout-contact-info two">
                                    <h4 class="contact-info-txt">{{ __('translate.Shipping Details') }}</h4>


                                        <div class="form-item">
                                            <div class="form-item-inner">
                                                <label for="exampleFormControlInput1" class="form-label">{{ __('translate.Name') }}
                                                    <span>*</span> </label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                                                    value="{{ auth()->user()->name ?? '' }}" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="form-item">
                                            <div class="form-item-inner">
                                                <label for="exampleFormControlInput1" class="form-label">{{ __('translate.Email') }}
                                                    <span>*</span> </label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                                                    placeholder="Email Address" value="{{ auth()->user()->email }}">
                                            </div>
                                            <div class="form-item-inner">
                                                <label for="exampleFormControlInput1" class="form-label">{{ __('translate.Phone') }}
                                                    <span>*</span> </label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Phone Number" name="whatsapp_phone"
                                                    value="{{ auth()->user()->whatsapp_phone ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="form-item">
                                            <div class="form-item-inner">
                                                <label for="shippingMethod" class="form-label">{{ __('translate.Shipping Method') }}
                                                    <span>*</span>
                                                </label>
                                                <select class="form-select" aria-label="Select Shipping Method"
                                                    name="shipping_method_id">
                                                    <option selected disabled>{{ __('translate.Select One') }}</option>
                                                    @foreach($methods as $method)
                                                    <option value="{{ $method->id }}">{{ $method->name }}
                                                        - {{ currency($method->price) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-item">
                                            <div class="form-item-inner">
                                                <label for="address" class="form-label">{{ __('translate.Address') }}
                                                    <span>*</span> </label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    placeholder="{{ __('translate.Address') }}" required>
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="checkout-subtotal">
                                    <h4 class="checkout-subtotal-txt">{{ __('translate.Your Order') }}</h4>
                                    <p class="checkout-subtotal-item">{{ __('translate.Product') }}
                                        <span>{{ __('translate.Subtotal') }}</span></p>
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
                                            <input type="hidden" name="subtotal" value="{{$sub_total}}">
                                        <li class="shipping_cost">{{ __('translate.Shipping') }} <span>(+){{ currency(0) }}</span>
                                            <input type="hidden" name="shipping_charge" value="">
                                        </li>
                                    </ul>
                                    <ul class="checkout-subtotal-list three">
                                        <li class="total">{{ __('translate.Total') }} <span>{{ currency($sub_total) }}</span></li>
                                        <input type="hidden" name="total" value="">
                                    </ul>
                                    <div class="payment-method-item">
                                        <button class="main-btn main-btn-black " type="submit">
                                            <div class="btn_m">
                                                <div class="btn_c">
                                                    <div class="btn_t1">{{ __('translate.Process To Payment') }}</div>
                                                    <div class="btn_t2">{{ __('translate.Process To Payment') }}</div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
              </form>
        </div>
    </section>
    <!-- Modal Start -->

</main>
@endsection
@push('js_section')
<script>
    $(document).ready(function() {
        // Function to parse currency string to number
        function parseCurrency(currencyStr) {
            return parseFloat(currencyStr.replace(/[^0-9.-]+/g, '')); // Removing non-numeric characters
        }

        // Function to format number into currency format (e.g., $10.00)
        function formatCurrency(amount) {
            return '$' + amount.toFixed(2);
        }

        // Function to update prices and hidden form fields
        function updatePrices() {
            // Get the subtotal value
            const subTotal = parseCurrency($('.sub_total span').text());

            // Get the shipping cost from the displayed value
            const shippingCost = parseCurrency($('.shipping_cost span').text().replace('(+)', '').trim());

            // Calculate the total price
            const total = subTotal + shippingCost;

            // Update the total span with the formatted total price
            $('.total span').text(formatCurrency(total));

            // If you are showing this price for Stripe payment, update it
            $('.stripe_price_here').text(formatCurrency(total));

            // Update the hidden form inputs for subtotal, shipping cost, and total
            $('input[name="subtotal"]').val(subTotal);
            $('input[name="shipping_charge"]').val(shippingCost);
            $('input[name="total"]').val(total);
        }

        // Event listener for when the shipping method is changed
        $('select[name="shipping_method_id"]').on('change', function() {
            // Get the selected option's shipping cost (splitting the price part)
            const selectedOption = $(this).find('option:selected');
            const priceText = selectedOption.text().split('-')[1].trim();
            const shippingCost = parseCurrency(priceText);

            // Update the shipping cost display and the input field
            $('.shipping_cost span').text('(+)' + formatCurrency(shippingCost));

            // Recalculate and update all prices
            updatePrices();
        });

        // Optional: If you want to initially set the values correctly when the page loads, you can call updatePrices()
        updatePrices();
    });
</script>
@endpush
