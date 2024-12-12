@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Assign Plan') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Assign Plan') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Subscription Plan') }} >> {{ __('translate.Assign Plan') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.store-assign-plan') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Assign Plan') }}</h4>
                                            </div>

                                            <div class="row mg-top-30">

                                                <div class="col-md-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Plan') }} * </label>
                                                        <select name="plan_id" id="" class="form-select crancy__item-input">
                                                            @foreach ($plans as $plan)
                                                                <option value="{{ $plan->id }}">{{ $plan->plan_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Seller') }} * </label>
                                                        <select class="form-select crancy__item-input" name="user_id">
                                                            <option value="">{{ __('Select') }}</option>
                                                            @foreach ($users as $user)
                                                                <option  {{ $user->id == old('user_id') ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('Assign') }}</button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
@endsection
