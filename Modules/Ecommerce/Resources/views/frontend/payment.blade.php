@extends('master_layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('new-layout')
<main>
    <div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
        <div class="container">
            <h1 class="post__title">{{ __('Payment') }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li aria-current="page">{{ __('Payment') }}</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Part End  -->
    <!-- End breadcrumb -->

    <div class="section optech-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="payment_box">

                        <div class="payment_box_head">
                            <h5>{{ __('Select Payment Method') }}</h5>
                        </div>

                        <div class="payment_select_item_main">
                            <div class="payment_select_item_box">
                                <a href="#" class="payment_select_item">
                                    <div class="payment_select_item_thumb">
                                        <img src="{{ asset('frontend/assets/img/logo/paypal.svg') }}" class="w-100" alt="">
                                    </div>
                                </a>

                                <div class="payment_select_modal">
                                    <div class="payment_select_modal_head">
                                        <h2>Payment From</h2>
                                        <button type="button" class="close_modal_btn">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <form class="payment_select_modal_form">
                                        <div class="payment_select_modal_form_item mt-0">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card Holder
                                                    Name*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Name here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card
                                                    Number*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Number here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Expiry*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="DD/MM/YY">
                                            </div>
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">CVV*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="cvv here">
                                            </div>
                                        </div>

                                        <button type="submit" class="optech-default-btn" href="contact-us.html"
                                                data-text="Payment Now">
                                            <span class="btn-wraper">Payment Now</span>
                                        </button>

                                    </form>
                                </div>
                            </div>

                            <div class="payment_select_item_box">
                                <a href="#" class="payment_select_item">
                                    <div class="payment_select_item_thumb">
                                        <img src="{{ asset('frontend/assets/img/logo/stripe.svg') }}" class="w-100" alt="Image">
                                    </div>
                                </a>

                                <div class="payment_select_modal">
                                    <div class="payment_select_modal_head">
                                        <h2>{{ __('Payment From') }}</h2>
                                        <button type="button" class="close_modal_btn">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <form class="payment_select_modal_form">
                                        <div class="payment_select_modal_form_item mt-0">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card Holder
                                                    Name*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Name here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card
                                                    Number*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Number here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Expiry*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="DD/MM/YY">
                                            </div>
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">CVV*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="cvv here">
                                            </div>
                                        </div>

                                        <button type="submit" class="optech-default-btn" href="contact-us.html"
                                                data-text="Payment Now">
                                            <span class="btn-wraper">Payment Now</span>
                                        </button>
                                    </form>
                                </div>

                            </div>

                            <div class="payment_select_item_box">
                                <a href="#" class="payment_select_item">
                                    <div class="payment_select_item_thumb">
                                        <img src="{{ asset('frontend/assets/img/logo/mollie.svg') }}" class="w-100" alt="">
                                    </div>
                                </a>

                                <div class="payment_select_modal">
                                    <div class="payment_select_modal_head">
                                        <h2>Payment From</h2>
                                        <button type="button" class="close_modal_btn">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <form class="payment_select_modal_form">
                                        <div class="payment_select_modal_form_item mt-0">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card Holder
                                                    Name*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Name here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card
                                                    Number*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Number here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Expiry*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="DD/MM/YY">
                                            </div>
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">CVV*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="cvv here">
                                            </div>
                                        </div>

                                        <button type="submit" class="optech-default-btn" href="contact-us.html"
                                                data-text="Payment Now">
                                            <span class="btn-wraper">Payment Now</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="payment_select_item_box">
                                <a href="#" class="payment_select_item">
                                    <div class="payment_select_item_thumb">
                                        <img src="{{ asset('frontend/assets/img/logo/insta.svg') }}" class="w-100" alt="">
                                    </div>
                                </a>

                                <div class="payment_select_modal">
                                    <div class="payment_select_modal_head">
                                        <h2>Payment From</h2>
                                        <button type="button" class="close_modal_btn">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <form class="payment_select_modal_form">
                                        <div class="payment_select_modal_form_item mt-0">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card Holder
                                                    Name*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Name here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card
                                                    Number*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Number here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Expiry*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="DD/MM/YY">
                                            </div>
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">CVV*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="cvv here">
                                            </div>
                                        </div>

                                        <button type="submit" class="optech-default-btn" href="contact-us.html"
                                                data-text="Payment Now">
                                            <span class="btn-wraper">Payment Now</span>
                                        </button>

                                    </form>
                                </div>
                            </div>

                            <div class="payment_select_item_box">
                                <a href="#" class="payment_select_item">
                                    <div class="payment_select_item_thumb">
                                        <img src="{{ asset('frontend/assets/img/logo/raza.svg') }}" class="w-100" alt="">
                                    </div>
                                </a>

                                <div class="payment_select_modal">
                                    <div class="payment_select_modal_head">
                                        <h2>Payment From</h2>
                                        <button type="button" class="close_modal_btn">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <form class="payment_select_modal_form">
                                        <div class="payment_select_modal_form_item mt-0">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card Holder
                                                    Name*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Name here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card
                                                    Number*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Number here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Expiry*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="DD/MM/YY">
                                            </div>
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">CVV*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="cvv here">
                                            </div>
                                        </div>
                                        <button type="submit" class="optech-default-btn" href="contact-us.html"
                                                data-text="Payment Now">
                                            <span class="btn-wraper">Payment Now</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="payment_select_item_box">
                                <a href="#" class="payment_select_item">
                                    <div class="payment_select_item_thumb">
                                        <img src="{{ asset('frontend/assets/img/logo/ssl.svg') }}" class="w-100" alt="">
                                    </div>
                                </a>

                                <div class="payment_select_modal">
                                    <div class="payment_select_modal_head">
                                        <h2>Payment From</h2>
                                        <button type="button" class="close_modal_btn">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <form class="payment_select_modal_form">
                                        <div class="payment_select_modal_form_item mt-0">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card Holder
                                                    Name*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Name here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card
                                                    Number*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Number here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Expiry*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="DD/MM/YY">
                                            </div>
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">CVV*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="cvv here">
                                            </div>
                                        </div>

                                        <button type="submit" class="optech-default-btn" href="contact-us.html"
                                                data-text="Payment Now">
                                            <span class="btn-wraper">Payment Now</span>
                                        </button>

                                    </form>
                                </div>
                            </div>

                            <div class="payment_select_item_box">
                                <a href="#" class="payment_select_item">
                                    <div class="payment_select_item_thumb">
                                        <img src="{{ asset('frontend/assets/img/logo/paystack.png') }}" alt="">
                                    </div>
                                </a>

                                <div class="payment_select_modal">
                                    <div class="payment_select_modal_head">
                                        <h2>Payment From</h2>
                                        <button type="button" class="close_modal_btn">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <form class="payment_select_modal_form">
                                        <div class="payment_select_modal_form_item mt-0">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card Holder
                                                    Name*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Name here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Card
                                                    Number*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="Number here">
                                            </div>
                                        </div>
                                        <div class="payment_select_modal_form_item">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Expiry*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="DD/MM/YY">
                                            </div>
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">CVV*</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                                       placeholder="cvv here">
                                            </div>
                                        </div>

                                        <button type="submit" class="optech-default-btn" href="contact-us.html"
                                                data-text="Payment Now">
                                            <span class="btn-wraper">Payment Now</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="payment_select_item_box">
                                <a href="#" class="payment_select_item">
                                    <div class="payment_select_item_thumb">
                                        <img src="{{ asset('frontend/assets/img/logo/bank.svg') }}" alt="Image">
                                    </div>
                                </a>

                                <div class="payment_select_modal">
                                    <div class="payment_select_modal_head">
                                        <h2>Bank Payment</h2>
                                        <button type="button" class="close_modal_btn">
                                            <span>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                                          stroke-linecap="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>

                                    <ul class="banck_text">
                                        <li> Total <span>$50.00</span></li>
                                        <li> Bank Name: <span> Islami bank</span></li>
                                        <li> Account Number: <span> 2050603020006</span></li>
                                        <li> Routing Number: <span>200103073</span></li>
                                        <li> Branch: <span>Akhaura Branch</span></li>
                                    </ul>

                                    <form class="payment_select_modal_form mt-0">
                                        <div class="payment_select_modal_form_item  mt-0">
                                            <div class="payment_select_modal_form_inner">
                                                <label for="exampleFormControlInput1" class="form-label">Transaction
                                                    Information</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="alert alert-danger" role="alert">
                                            Could not find Payment Information
                                        </div>

                                        <button type="submit" class="optech-default-btn" href="contact-us.html"
                                                data-text="Payment Now">
                                            <span class="btn-wraper">Payment Now</span>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="optech-checkuot-sidebar-column">
                        <div class="optech-checkuot-sidebar">
                            <h5>{{ __('Your Order') }}</h5>
                            <ul>
                                <li>{{ __('Product') }}<span>{{ __('Subtotal') }}</span></li>

                                @foreach($carts as $cart)
                                    <li>{{ Str::limit($cart->product->translate?->name, 35)  }}<span>$69.00</span></li>
                                @endforeach

                                <li>Subtotal<span>$217.00</span></li>
                                <li>Coupon<span>$40.00</span></li>
                                <li>Delivery Fee<span>$20.00</span></li>
                                <li>Total<span class="total-amount">$217.00</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

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
