@extends('seller.dashboard_layout')
@section('title')
    <title>{{ __('User || Change Password') }}</title>
@endsection

@section('breadcrumb')
    <h1 class="post__title">{{ __('Change Password') }}</h1>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li> {{ __('Change Password') }} </li>
        </ul>
    </nav>
@endsection
@section('dashboard-content')

    <div class="d_change_password_box">
        <div class="d_change_password_box_df">
            <div class="d_change_password_box_df_left">
                <div class="d_change_password_box_text">
                    <h4>{{ __('Update your Password') }}</h4>
                    <p>{{ __('Your email address will not be published. Required fields are marked *') }}</p>
                </div>

                    <form class="d_change_password_box_form" method="POST" action="{{ route('user.update-password') }}">
                        @csrf
                        @method('PUT')
                    <div class="d_profile_setting_from_item">
                        <div class="optech-checkout-field">
                            <label>{{ __('Current Password*') }}</label>
                            <input
                                type="password"
                                placeholder="*******"
                                name="current_password"
                            />
                            <button type="button" class="eye_btn">
                                <span><i class="fa-regular fa-eye"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="d_profile_setting_from_item">
                        <div class="optech-checkout-field">
                            <label>{{ __('New Password*') }}</label>
                            <input
                                type="password"
                                placeholder="*******"
                                name="password"
                            />
                            <button type="button" class="eye_btn">
                                <span><i class="fa-regular fa-eye-slash"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="d_profile_setting_from_item">
                        <div class="optech-checkout-field">
                            <label>{{ __('Confirm Password*') }}</label>
                            <input
                                type="password"
                                placeholder="*******"
                                name="password_confirmation"
                            />
                            <button type="button" class="eye_btn">
                                <span><i class="fa-regular fa-eye-slash"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="d_profile_setting_from_btn">
                        <button class="optech-default-btn" data-text="{{ __('Update Password') }}">
                            <span class="btn-wraper">{{ __('Update Password') }}</span>
                        </button>

                        <button class="optech-default-btn two" data-text="{{ __('Cancel') }}">
                            <span class="btn-wraper">{{ __('Cancel') }}</span>
                        </button>

                    </div>
                </form>
            </div>

            <div class="d_change_password_box_thumb">
                <img src="{{ asset($general_setting->login_page_bg) }}" alt="thumb">
            </div>
        </div>
    </div>
<!-- Main -->
@endsection
