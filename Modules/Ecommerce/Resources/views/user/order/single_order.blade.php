@extends('seller.dashboard_layout')
@section('title')
    <title>{{ __('Single Order') }}</title>
@endsection
@section('breadcrumb')
    <h1 class="post__title">{{ __('Order') }}</h1>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="{{ route('user.dashboard') }}">{{ __('Home') }}</a></li>
            <li><a href="{{ route('user-order.index') }}">{{ __('Orders') }}</a></li>
            <li aria-current="page"> {{ __('Order ') }} {{ $order->order_id }} </li>
        </ul>
    </nav>
@endsection
@section('dashboard-content')
    <!-- End breadcrumb -->
          <div class="d_order_details_main">
                <div class="d_order_details_main_top">
                    <a href="{{ route('home') }}" class="d_order_details_main_top_logo">
                        <img src="{{ asset($general_setting->logo) }}" alt="logo">
                    </a>

                    <a class="optech-default-btn" href="{{ route('user-order.index') }}" data-text="Back"><span
                            class="btn-wraper">{{ __('Back') }}</span></a>
                </div>

                <div class="d_order_details_address_df">
                    <div class="d_order_details_address">
                        <h5>{{ __('Billing Address') }}</h5>

                        <ul>
                            <li> <span>{{ __('Name:') }}</span> {{ __($order->address['name']) }}</li>
                            <li> <span>{{ __('Phone:') }}</span> {{ __($order->address['phone']) }}</li>
                            <li> <span>{{ __('Email:') }}</span> {{ __($order->address['email']) }}</li>
                            <li> <span>{{ __('Address:') }}</span> {{ __($order->address['address']) }}</li>
                        </ul>
                    </div>
                    <div class="d_order_details_address">
                        <h5>{{ __('Order Details') }}</h5>
                        <ul>
                            <li> <span>{{ __('Transaction Id :') }}</span>{{ $order->transaction_id }}</li>
                            <li> <span>{{ __('Order Id :') }}</span> {{ $order->order_id }}</li>
                            <li> <span>{{ __('Order Date :') }}</span>{{ $order->created_at->format('d M Y') }} </li>
                            <li> <span>{{ __('Payment Status :') }}</span>
                                @if($order->payment_status == 1)
                                    <span class="paid ">{{ __('Paid') }}</span>
                                @else
                                    <span class="paid un_paid">{{ __('Un Paid') }}</span>
                                @endif
                            </li>
                            <li> <span> {{ __('Payment Method :') }} </span>
                                {{ $order->payment_method }}
                            </li>
                            <li> <span>{{ __('Order Status: ') }}</span>
                                @if($order->payment_status == 1)
                                    <span class="completed">{{ __('Completed') }} </span>
                                @else
                                    <span class="incomplete">{{ __('Incomplete') }} </span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="dashbord_table_main">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Product Name') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Amount') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->order_detail as $detail)
                        <!-- single item -->
                            <tr>
                                <td>{{ __($detail->singleProduct->translate->name) }}</td>
                                <td>{{ __(currency($detail->singleProduct->finalPrice)) }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ __(currency($detail->price)) }}</td>
                            </tr>
                        <!-- single item -->
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <ul class="subtotal_item">
                    <li>{{ __('Subtotal') }} <span>{{ currency($order->subtotal) }}</span></li>
                    <li>{{ __('Shipping Cost') }} <span>{{ currency($order->shipping_charge) }}</span></li>
                    <li>{{ __('Total') }} <span>{{ currency($order->total) }}</span></li>
                </ul>
          </div>
    <!-- End section -->
@endsection
