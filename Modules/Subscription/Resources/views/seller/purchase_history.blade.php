@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || Subscription Plan') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Header -->
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">
            {{ __('translate.Subscription Plan') }}
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
            <li class="text-lime-300 fs-6">{{ __('translate.Subscription Plan') }}</li>
          </ul>
        </div>

        <div>
            <a href="{{ route('seller.subscription.plan') }}" class="w-btn-secondary-lg mt-2">
                {{ __('translate.Buy Subscription') }}
              </a>
        </div>
      </div>
      <!-- Content -->
      <div>
        @if ($histories->count() > 0)
        <div class="overflow-x-auto">
          <div class="w-100">
            <table class="w-100 dashboard-table subscription-table">
              <thead class="pb-3">
                <tr class="">
                  <th scope="col">{{ __('translate.Plan') }}</th>
                  <th scope="col">{{ __('translate.Price') }}</th>
                  <th scope="col">{{ __('translate.Expired Date') }}</th>
                  <th scope="col">{{ __('translate.Payment Status') }}</th>
                  <th scope="col">{{ __('translate.Status') }}</th>
                  <th scope="col" class="text-end">{{ __('translate.Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($histories as $index => $history)
                <tr>
                    <td class="text-dark-200">{{ $history->plan_name }}</td>
                    <td class="text-dark-200">{{ currency($history->plan_price) }}</td>
                    <td class="text-dark-200">{{ $history->expiration_date }}</td>
                    <td>

                        @if ($history->payment_status == 'success')
                            <div class="status-badge active">{{ __('translate.Success') }}</div>
                        @else
                            <div class="status-badge in-active">{{ __('translate.Pending') }}</div>
                        @endif

                    </td>
                    <td>
                        @if ($history->expiration_date != 'lifetime')
                            @if (date('Y-m-d') > $history->expiration_date)
                                <span class="status-badge in-active">{{__('translate.Expired')}}</span>
                            @else
                                @if ($history->status == 'active')
                                    <span class="status-badge active">{{__('translate.Active')}}</span>
                                @elseif ($history->status == 'pending')
                                    <span class="status-badge in-active">{{__('translate.Pending')}}</span>
                                @elseif ($history->status == 'expired')
                                    <span class="status-badge in-active">{{__('translate.Expired')}}</span>

                                @endif
                            @endif
                        @else
                            @if ($history->status == 'active')
                                <span class="status-badge active">{{__('translate.Active')}}</span>
                            @elseif ($history->status == 'pending')
                                <span class="status-badge in-active">{{__('translate.Pending')}}</span>
                            @elseif ($history->status == 'expired')
                                <span class="status-badge in-active">{{__('translate.Expired')}}</span>

                            @endif
                        @endif

                    </td>
                    <td class="text-dark-200 text-start text-lg-end">
                        <div class="d-flex justify-content-end gap-2">

                            <button data-bs-toggle="modal" data-bs-target="#saasDetail{{ $history->id }}" class="dashboard-action-btn">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="48"
                                height="48"
                                viewBox="0 0 48 48"
                                fill="none"
                                >
                                <circle
                                    cx="24"
                                    cy="24"
                                    r="24"
                                    fill="#EDEBE7"
                                />
                                <path
                                    d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                    stroke="#5B5B5B"
                                    stroke-width="1.5"
                                />
                                <circle
                                    cx="23.668"
                                    cy="24.167"
                                    r="3.5"
                                    stroke="#5B5B5B"
                                    stroke-width="1.5"
                                />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                @endforeach

                
              </tbody>
            </table>
          </div>
        </div>
        @else
            <div class="row justify-content-center">
                <div class="col-7">
                    <div>
                        <div class="bg-white p-5 rounded-3 d-flex justify-content-center align-items-center" >
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset($general_setting->empty_image) }}"  class="img-fluid mb-5" alt="" />
                            <h3 class="text-24 fw-bold text-dark-300 m-2">
                                {{ __('translate.Enrollment Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any enrollment') }}
                            <span class="text-dark-300">{{ __('translate.Thank you') }}</span>
                            </p>

                            <a href="{{ route('seller.subscription.plan') }}" class="w-btn-secondary-lg mt-2">
                                {{ __('translate.Buy Subscription') }}
                              </a>
                              
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Pagination -->
        @if ($histories->hasPages())
            <div class="row justify-content-end mt-20">
                <div class="col-auto">
                {{ $histories->links('custom_pagination') }}
                </div>
            </div>
        @endif
      </div>
    </div>
  </main>


  @foreach ($histories as $index => $history)
  <!-- saas detail Modal -->
  <div class="modal fade" id="saasDetail{{ $history->id }}" tabindex="-1" aria-labelledby="saasDetail" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content ">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Plan Details') }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <table class="table table-bordered table-striped">
                      <tbody>
                          
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Plan') }}</h4>
                            </td>
                            <td>
                                <h4>{{ $history->plan_name }}</h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Price') }}</h4>
                            </td>
                            <td>
                                <h4>{{ currency($history->plan_price) }}</h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Maximum Listing') }}</h4>
                            </td>
                            <td>
                                <h4>{{ $history->max_listing }}</h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Featured Listing') }}</h4>
                            </td>
                            <td>
                                <h4>{{ $history->featured_listing }}</h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{__('Recommended Seller')}}</h4>
                            </td>
                            <td>
                                <h4>
                                    @if ($history->recommended_seller == 'active')
                                        {{ __('Available') }}
                                    @else
                                        {{ __('Not-Available') }}
                                    @endif
                                </h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Expiration') }}</h4>
                            </td>
                            <td>
                                <h4>{{ $history->expiration }}</h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Expiration Date') }}</h4>
                            </td>
                            <td>
                                <h4>{{ $history->expiration_date }}</h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Remaining day') }}</h4>
                            </td>
                            <td>
                                <h4>
                                    @if ($history->status == 'active')
                                        @if ($history->expiration_date == 'lifetime')
                                            {{ __('translate.Lifetime') }}
                                        @else
                                            @php
                                                $date1 = new DateTime(date('Y-m-d'));
                                                $date2 = new DateTime($history->expiration_date);
                                                $interval = $date1->diff($date2);
                                                $remaining = $interval->days;
                                            @endphp
                                            @if ($remaining > 0)
                                                {{ $remaining }} {{ __('translate.Days') }}
                                            @else
                                                {{ __('translate.Expired') }}
                                            @endif
                                        @endif
                                    @else
                                        {{ __('translate.Expired') }}
                                    @endif
                                </h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Plan Status') }}</h4>
                            </td>
                            <td>
                                <h4>
                                    @if ($history->status == 'active')
                                        @if ($history->expiration_date == 'lifetime')
                                            <div>{{ __('translate.Active') }}</div>
                                        @else
                                            @if (date('Y-m-d') <= $history->expiration_date)
                                                <div>{{ __('translate.Active') }}</div>
                                            @else
                                                <div>{{ __('translate.Expired') }}</div>
                                            @endif
                                        @endif
                                    @elseif ($history->status == 'pending')
                                        <div>{{ __('translate.Pending') }}</div>
                                    @elseif ($history->status == 'expired')
                                        <div>{{ __('translate.Expired') }}</div>
                                    @endif
                                </h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Payment Status') }}</h4>
                            </td>
                            <td>
                                <h4>
                                    @if ($history->payment_status == 'success')
                                        <div>{{ __('translate.Success') }}</div>
                                    @else
                                        <div>{{ __('translate.Pending') }}</div>
                                    @endif
                                </h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Payment Method') }}</h4>
                            </td>
                            <td>
                                <h4>
                                    {{ $history->payment_method }}
                                </h4>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h4>{{ __('translate.Transaction') }}</h4>
                            </td>
                            <td>
                                <h4>
                                    {!! clean($history->transaction) !!}
                                </h4>
                            </td>
                        </tr>
                       

                      </tbody>
                  </table>
              </div>

          </div>
      </div>
  </div>
  @endforeach
@endsection

