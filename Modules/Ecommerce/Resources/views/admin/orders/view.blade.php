@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Order List') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Order') }} - {{ $order->order_id }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Order List') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row row__bscreen">
                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="m-0">{{ __('translate.User Information') }}</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $order->user->name }}</h5>
                            <p class="card-text"><i class="bi bi-whatsapp"></i> {{ $order->user->whatsapp_phone }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h4 class="m-0">{{ __('translate.Payment Information') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.order.paymentStatus', $order->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('PATCH')
                                <h5>{{ __('translate.Paid Via') }}:</h5>
                                <label for="paymentMethod" class="form-label">{{ __('translate.Payment Method') }}</label>
                                <select name="payment_status" id="paymentMethod" class="form-select mb-3" onchange="this.form.submit()">
                                    <option value="0" {{ $order->payment_status == \App\Constants\Status::PENDING ? 'selected' : '' }}>
                                        {{ __('translate.Pending') }}
                                    </option>
                                    <option value="1" {{ $order->payment_status == \App\Constants\Status::APPROVED ? 'selected' : '' }}>
                                        {{ __('translate.Approved') }}
                                    </option>
                                    <option value="2" {{ $order->payment_status == \App\Constants\Status::REJECTED ? 'selected' : '' }}>
                                        {{ __('translate.Rejected') }}
                                    </option>
                                </select>
                            </form>
                            <p class="text-muted">
                                {{ $order->transaction_id ? $order->transaction_id : __('translate.No Transaction ID') }}
                                - @php echo $order->paymentBadge @endphp
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h4 class="m-0">{{ __('translate.Shipping Details') }}</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ $order->shipping_method->name }}</h5>
                            <p class="card-text">{{ $order->address['address'] ?? 'N/A' }}</p>
                            <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('PATCH')
                                <label for="orderStatus" class="form-label">{{ __('translate.Order Status') }}:</label>
                                <select name="order_status" id="orderStatus" class="form-select" onchange="this.form.submit()">
                                    <option value="0" {{ $order->order_status == \App\Constants\Status::PENDING ? 'selected' : '' }}>
                                        {{ __('translate.Pending') }}
                                    </option>
                                    <option value="3" {{ $order->order_status == \App\Constants\Status::PROCESSING ? 'selected' : '' }}>
                                        {{ __('translate.Processing') }}
                                    </option>
                                    <option value="4" {{ $order->order_status == \App\Constants\Status::SHIPPED ? 'selected' : '' }}>
                                        {{ __('translate.Shipped') }}
                                    </option>
                                    <option value="5" {{ $order->order_status == \App\Constants\Status::COMPLETED ? 'selected' : '' }}>
                                        {{ __('translate.Completed') }}
                                    </option>
                                    <option value="2" {{ $order->order_status == \App\Constants\Status::REJECTED ? 'selected' : '' }}>
                                        {{ __('translate.Rejected') }}
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6 col-12 mg-top-30">
                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-dark">
                            <h4 class="m-0">{{ __('translate.Shipping To') }}</h4>
                        </div>
                        <div class="card-body">
                            <h5>{{ @$order->address['name'] }}</h5>
                            <p class="card-text">{{ @$order->address['email'] }} <br>
                            {{ @$order->address['phone'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items Table -->
            <div id="crancy-table__main_wrapper" class="mt-5">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('translate.Serial') }}</th>
                                <th>{{ __('translate.Title') }}</th>
                                <th>{{ __('translate.Quantity') }}</th>
                                <th>{{ __('translate.Price') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->order_detail as $index => $singleOrder)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>
                                        {{ $singleOrder->singleProduct->name }}
                                    </td>
                                    <td>{{ $singleOrder->quantity }}</td>
                                    <td>{{ number_format($singleOrder->price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>{{ __('translate.Shipping Charge') }}</strong></td>
                                <td class="text-end">{{ number_format($order->shipping_charge, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end"><strong>{{ __('translate.Total') }}</strong></td>
                                <td class="text-end">{{ number_format($order->order_detail->sum('price') + $order->shipping_charge, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
