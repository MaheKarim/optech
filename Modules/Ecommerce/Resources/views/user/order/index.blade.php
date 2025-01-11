@extends('layout')
@section('title')
    <title>{{ __('translate.Ecommerce Order List') }}</title>
@endsection
@section('body-content')

    <main>
        <div class="inner-bg common-class"
             style="    background-image:  url({{ asset($breadcrumb) }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <div class="inner-bg-txt">
                            <h1>{{ __('translate.Order History') }}</h1>

                            <ul>
                                <li><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                                <li><span>
                                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.633816 2.7705e-08C0.446997 0.0532405 0.28353 0.143084 0.158011 0.319443C-0.0492418 0.618921 -0.0550799 1.0515 0.155092 1.35098C0.195958 1.40755 0.239744 1.46411 0.286449 1.51735C1.56499 2.97481 2.84645 4.4356 4.125 5.89306C4.15419 5.92633 4.18922 5.95295 4.24176 6.03281C4.20673 6.0561 4.16295 6.06941 4.13375 6.10269C2.84062 7.57346 1.5504 9.04755 0.257258 10.5183C0.0295721 10.7779 -0.0579994 11.0773 0.0412483 11.4367C0.187201 11.9591 0.776848 12.1721 1.16216 11.8427C1.20595 11.8061 1.24682 11.7628 1.28768 11.7196C2.7764 10.0225 4.26511 8.32881 5.75091 6.63177C6.02238 6.32231 6.07492 5.92966 5.89394 5.57361C5.85015 5.4871 5.78594 5.41056 5.72464 5.34069C4.27971 3.69356 2.83478 2.04976 1.39277 0.399304C1.23222 0.216289 1.06875 0.0532405 0.838149 3.66367e-08C0.771011 3.3702e-08 0.703873 3.07673e-08 0.633816 2.7705e-08Z" />
                                    </svg>

                                </span></li>
                                <li><a href="javascript:;" class="active">{{ __('translate.Order History') }}</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section class="dashboard footer-top-pad ">
            <div class="container">
                <div class="row">


                @include('profile.sidebar')

                    <div class="col-xxl-9 col-xl-8 col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="manage-car two">
                                    <div class="car_list_table">
                                        <table class="table two">
                                            <thead>
                                            <tr>
                                                <th>{{ __('translate.Order ID') }}</th>
                                                <th>{{ __('translate.Pay Via') }}</th>
                                                <th>{{ __('translate.Payment Status') }}</th>
                                                <th>{{ __('translate.Amount') }}</th>
                                                <th>{{ __('translate.Order Status') }}</th>
                                                <th>{{ __('translate.Ordered At') }}</th>
                                                <th>{{ __('translate.View') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($orders as $index => $order)
                                                <tr>
                                                    <td>
                                                        {{ $order->order_id }}
                                                    </td>

                                                    <td>{{ $order->payment_method }}</td>

                                                    <td>
                                                        @php echo $order->paymentBadge @endphp
                                                    </td>
                                                    <td>
                                                        {{ currency($order->total) }}
                                                    </td>
                                                    <td>
                                                        @php echo $order->orderBadge @endphp
                                                    </td>

                                                    <td>
                                                        {{ $order->created_at->diffForHumans() }}
                                                    </td>

                                                    <td>
                                                        <div class="actions-btn-item">
                                                            <button type="button" class="actions-btn" data-bs-toggle="modal" data-bs-target="#showPurchaseHistory{{ $index }}">
                                                                <span>
                                                                    <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M7.79633 0.679688C5.12346 0.679688 2.69957 2.14204 0.910975 4.51729C0.765026 4.71188 0.765026 4.98375 0.910975 5.17835C2.69957 7.55646 5.12346 9.01881 7.79633 9.01881C10.4692 9.01881 12.8931 7.55646 14.6817 5.18121C14.8276 4.98661 14.8276 4.71475 14.6817 4.52015C12.8931 2.14204 10.4692 0.679688 7.79633 0.679688ZM7.98807 7.7854C6.21379 7.897 4.74857 6.43465 4.86018 4.65751C4.95176 3.1923 6.13938 2.00467 7.60459 1.9131C9.37887 1.80149 10.8441 3.26384 10.7325 5.04098C10.638 6.50334 9.45042 7.69096 7.98807 7.7854ZM7.89935 6.42893C6.94353 6.48903 6.15369 5.70205 6.21665 4.74623C6.2653 3.95638 6.90633 3.31822 7.69617 3.2667C8.65199 3.20661 9.44183 3.99359 9.37887 4.94941C9.32736 5.74211 8.68633 6.38028 7.89935 6.42893Z"></path>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="not_found">
                                                    <td colspan="5" class="text-center">{{ __('translate.Order History Not Found') }}</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            @if ($orders->hasPages())
                                <div class="col-lg-12">
                                    {{ $orders->links('pagination_box') }}
                                </div>

                            @endif
                        </div>
                    </div>

                </div>
            </div>


            @foreach ($orders as $index => $order)
                <div class="modal modal-three fade" id="showPurchaseHistory{{ $index }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2">
                                    <a href="{{ route('home') }}" class="px-5 modal-logo" ><img src="{{ asset($setting->logo) }}" alt="logo"></a>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body-item">
                                    @if($order->address != null)
                                    <ul class="modal-body-list">
                                        <li> <span>{{ __('translate.Name') }}:</span> {{ $order->address['name'] }}</li>
                                        <li> <span>{{ __('translate.Phone') }}:</span> {{ $order->address['phone'] }}</li>
                                        <li> <span>{{ __('translate.Email') }}:</span> {{ $order->address['email'] }}</li>
                                        <li> <span>{{ __('translate.Location') }}:</span> {{  $order->address['address'] }}</li>
                                    </ul>
                                    @endif
                                    <ul class="modal-body-list two">
                                        <li> <span>{{ __('translate.Order ID') }}:</span> #{{ $order->order_id }}</li>
                                        <li> <span>{{ __('translate.Amount') }}: </span>{{ currency($order->total) }}</li>
                                        <li> <span>{{ __('translate.Payment') }}: </span> {{ $order->payment_method }}</li>
                                        @if($order->transaction_id != null)
                                        <li> <span>{{ __('translate.Transaction') }}: </span>{!! clean(nl2br(@$order->transaction_id)) !!} </li>
                                        @endif
                                    </ul>
                                </div>

                                <table class="table table-bordered">

                                    <tr>
                                        <td>{{ __('translate.Product') }}</td>
                                        <td>
                                            @foreach($order->order_detail as $detail)
                                                {{ $detail->singleProduct->name }}  x  {{ $detail->quantity }} Qty<br>
                                            @endforeach
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>{{ __('translate.Total Price') }}</td>
                                        <td>{{ currency($order->total) }}</td>
                                    </tr>

                                    <tr>
                                        <td>{{ __('translate.Payment Method') }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                    </tr>

                                    <tr>
                                        <td>{{ __('translate.Transaction') }}</td>
                                        <td>{{ $order->transaction_id }}</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            {{ __('translate.Payment') }}
                                        </td>
                                        <td>
                                           @php echo $order->paymentBadge @endphp
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>{{ __('translate.Order Status') }}</td>
                                        <td>
                                            @php echo $order->orderBadge @endphp
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </main>
@endsection
