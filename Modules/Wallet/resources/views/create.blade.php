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
            <form method="post" action="{{ route('buyer.wallet.store') }}" enctype="multipart/form-data">
                @csrf
              <div class="d-flex flex-column gap-4">
                <!-- Profile Info -->
                <div class="profile-info-card">
                  <!-- Header -->
                  <div class="profile-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Payment Information') }}
                    </h4>
                  </div>
                  <div class="profile-info-body bg-white">
                    <div class="row g-4">
                      <div class="col-12">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.Amount') }}<span class="text-lime-300"
                              >*</span
                            ></label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('Minimum 10 USD') }}"
                            name="amount"
                            value=""
                            autocomplete="off"

                          />
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-container">
                          <label for="gender" class="form-label">{{ __('translate.Payment Gateway') }} <span class="text-lime-300">*</span>
                          </label>
                          <select id="gender" autocomplete="off" class="form-select shadow-none" name="payment_gateway">
                            <option value="">{{ __('translate.Select') }}</option>
                            <option value="Stripe">{{ __('translate.Stripe') }}</option>
                            <option value="Paypal">{{ __('translate.Paypal') }}</option>
                            <option value="Mollie">{{ __('translate.Mollie') }}</option>
                            <option value="Razorpay">{{ __('translate.Razorpay') }}</option>
                          </select>
                        </div>
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

