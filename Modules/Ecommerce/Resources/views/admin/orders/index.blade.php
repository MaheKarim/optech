@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Order List') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Order List') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Order List') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Order List') }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer" id="dataTable">
                                        <thead class="crancy-table__head">
                                        <tr>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Serial') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Name') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Price') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Payment Method') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Payment Status') }}
                                            </th>

                                            <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                {{ __('translate.Status') }}
                                            </th>

                                            <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                {{ __('translate.Action') }}
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                        @foreach ($orders as $index => $order)
                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">
                                                        <br>
                                                        {{ $order->user->name }}
                                                    </h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ number_format($order->total, 2) }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $order->payment_method }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                     @php echo $order->paymentBadge @endphp
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @php echo $order->orderBadge @endphp
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">

                                                    <a href="{{ route('admin.order.show', $order->id) }}" class="crancy-btn"><i class="fas fa-eye"></i> {{ __('translate.View') }}</a>



                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
