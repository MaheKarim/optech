@extends('buyer.layout')
@section('title')
    <title>{{ __('translate.Buyer || Refund') }}</title>
@endsection
@section('front-content')
    <main class="dashboard-main min-vh-100">
        <div class="d-flex flex-column gap-4">
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between">
            <div>
              <h3 class="text-24 fw-bold text-dark-300 mb-2">
                {{ __('translate.Refund') }}
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
                <li class="text-lime-300 fs-6">{{ __('translate.Refund') }}</li>
              </ul>
            </div>

          </div>
        
        <!-- Content -->
        @if ($refunds->count() > 0)
        <div>
            <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Wallet Transaction') }}</h3>
            <!-- Table -->
            <div class="overflow-x-auto">
            <div class="w-100">
                <table class="w-100 dashboard-table">
                <thead class="pb-3">
                    <tr>
                        <th scope="col" >{{ __('translate.Order Id') }}</th>
                        <th scope="col">{{ __('translate.Amount') }}</th>
                        <th scope="col">{{ __('translate.Apply Date') }}</th>
                        <th scope="col">{{ __('translate.Status') }}</th>
                        <th scope="col">{{ __('translate.Action') }}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($refunds as $index => $refund)
                        <tr>

                            <td class="text-dark-200"><a href="{{ route('buyer.order', $refund?->order?->order_id) }}">#{{ $refund?->order?->order_id }}</a></td>
                            <td class="text-dark-200">{{ currency($refund->refund_amount) }}</td>
                            <td class="text-dark-200">{{ $refund->created_at->format('Y-m-d') }}</td>
                            <td class="text-dark-200">
                                @if ($refund->status == 'pending')
                                <span class="status-badge pending">
                                    {{ __('translate.Pending') }}
                                </span>
                                @elseif ($refund->status == 'rejected')
                                    <span class="status-badge pending">
                                        {{ __('translate.Rejected') }}
                                    </span>
                                @elseif ($refund->status == 'approved')
                                <span class="status-badge in-progress">
                                    {{ __('translate.Approved') }}
                                </span>
                                @endif
                            </td>
                            <td class="text-dark-200">
                                <div class="d-flex justify-content-end gap-2">

                                    <a href="javascript:;" data-bs-toggle="modal"
                                    data-bs-target="#refundRequest{{ $refund->id }}" class="dashboard-action-btn" >
                                        <svg
                                            width="26"
                                            height="19"
                                            viewBox="0 0 26 19"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                            d="M23.3187 6.66195C24.6716 8.08537 24.6716 10.248 23.3187 11.6714C21.0369 14.0721 17.1181 17.3333 12.6667 17.3333C8.21523 17.3333 4.29641 14.0721 2.01466 11.6714C0.661781 10.248 0.661781 8.08537 2.01466 6.66195C4.29641 4.26122 8.21523 1 12.6667 1C17.1181 1 21.0369 4.26122 23.3187 6.66195Z"
                                            stroke="#5B5B5B"
                                            stroke-width="1.5"
                                            />
                                            <circle
                                            cx="12.668"
                                            cy="9.16699"
                                            r="3.5"
                                            stroke="#5B5B5B"
                                            stroke-width="1.5"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
                </table>
            </div>
            </div>
        </div>
        @endif
        </div>
    </main>

    @foreach ($refunds as $index => $refund)
    @include('refund::buyer.refund_show')
    @endforeach
@endsection

