@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Frontend Management') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Frontend Management') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Frontend Management') }}</p>
@endsection
@php

@endphp
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
                                            <h4 class="crancy-product-card__title">Title</h4>
                                        </div>
                                    </div>



{{--                                    @section('content')--}}
                                        <div class="container">
                                            <div class="row">
                                                @foreach ($sections as $key => $section)
                                                    <div class="col-md-4 mb-4">
                                                        <div class="card h-100">
                                                            <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $section['name'] }}</h5>
                                                                <p class="card-text">
                                                                    {{ $section['content']['heading'] ?? 'No heading available.' }}
                                                                </p>
                                                                <a href="{{ route('admin.front-end.section', $key) }}" class="btn btn-primary">Manage {{ $section['name'] }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
{{--                                    @endsection--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
