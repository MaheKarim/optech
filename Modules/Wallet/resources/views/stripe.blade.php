@extends('buyer.layout')
@section('title')
    <title>{{ __('translate.Buyer || Add Balance') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Header -->
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">
            {{ __('translate.Add Balance') }}
          </h3>
          <ul class="d-flex align-items-center gap-2">
            <li class="text-dark-200 fs-6">{{ __('translate.Dashboard') }}</li>
            <li>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="5"
                height="11"
                viewBox="0 0 5 11"
                fill="none"
              >
                <path
                  d="M1 10L4 5.5L1 1"
                  stroke="#5B5B5B"
                  stroke-width="1.2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </li>
            <li class="text-lime-300 fs-6">{{ __('translate.Add Balance') }}</li>
          </ul>
        </div>
      </div>
      <!-- Content -->
      <div>
        <div class="row justify-content-center">
          <div class="col-xl-8">
            <form class="stripe-modal-form require-validation " role="form" action="{{ route('buyer.wallet-payment.stripe-store') }}" method="POST" data-cc-on-file="false" data-stripe-publishable-key="{{ $payment_setting->stripe_key }}" id="payment-form">
                @csrf

              <div class="d-flex flex-column gap-4">
                <!-- Profile Info -->
                <div class="profile-info-card">
                  <!-- Header -->
                  <div class="profile-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Stripe Payment') }}
                    </h4>
                  </div>
                  <div class="profile-info-body bg-white">

                    <div class="proposal-input-container g-4">
                        <label class="form-label" >{{ __('translate.Amount') }}*</label>
                        <input type="text"  class="form-control shadow-none" value="{{ currency(Session::get('wallet_amount')) }}" readonly />
                    </div>

                    <div class="proposal-input-container g-4 mt-3">
                        <label for="amount" class="form-label" >{{ __('translate.Card Number') }}*</label>
                        <input type="text"  class="form-control shadow-none card-number" placeholder="{{ __('translate.Card Number') }}" name="card_number"/>
                    </div>

                    <div class="proposal-input-container g-4 mt-3">
                        <label for="amount" class="form-label" >{{ __('translate.Expired Month') }}*</label>
                        <input type="text"  class="form-control shadow-none card-expiry-month" placeholder="{{ __('translate.Expired Month') }}" name="month"/>
                    </div>

                    <div class="proposal-input-container g-4 mt-3">
                        <label for="amount" class="form-label" >{{ __('translate.Expired Year') }}*</label>
                        <input type="text"  class="form-control shadow-none card-expiry-year" placeholder="{{ __('translate.Expired Year') }}" name="year"/>
                    </div>

                    <div class="proposal-input-container g-4 mt-3">
                        <label for="amount" class="form-label" >{{ __('translate.CVC') }}*</label>
                        <input type="text"  class="form-control shadow-none card-cvc" placeholder="{{ __('translate.CVC') }}" name="cvc"/>
                    </div>

                    <div class="proposal-input-container stripe_error d-none g-4 mt-3">
                        <div class="stripe-modal-form-inner">
                            <div class='alert-danger alert '>{{ __('translate.Please provide your valid card information') }}</div>
                        </div>
                    </div>

                  </div>
                </div>


                <!-- Submit Btn -->
                <div class="d-flex align-items-center gap-3">
                  <button type="submit" class="w-btn-secondary-lg">
                    {{ __('translate.Pay Now') }}
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="14"
                      height="10"
                      viewBox="0 0 14 10"
                      fill="none"
                    >
                      <path
                        d="M9 9L13 5M13 5L9 1M13 5L1 5"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </button>
                  <a
                    href="{{ route('buyer.wallet.index') }}"
                    class="text-danger text-decoration-underline"
                    >{{ __('translate.Cancel') }}</a
                  >
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

        });
    </script>

@endpush