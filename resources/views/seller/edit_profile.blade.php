@extends('seller.dashboard_layout')
@section('title')
    <title>{{ __('User || Edit Profile') }}</title>
@endsection

@section('breadcrumb')
    <h1 class="post__title">{{ __('Edit Profile') }}</h1>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="{{ route('user.dashboard') }}">{{ __('Home') }}</a></li>
            <li> {{ __('Edit Profile') }} </li>
        </ul>
    </nav>
@endsection

@section('dashboard-content')

    <div class="dashbord_titel">
        <h4>{{ __('Profile Settings') }}</h4>
    </div>

    <form class="d_profile_setting_from" method="post" action="{{ route('user.update-profile') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d_profile_setting_from_item mt-0">
            <div class="optech-checkout-field">
                <label>{{ __('Full Name*') }}</label>
                <input type="text"
                       placeholder="{{ __('translate.Name') }}"
                       name="name"
                       value="{{ html_decode($user->name) }}"
                >
            </div>

        </div>
        <div class="d_profile_setting_from_item">
            <div class="optech-checkout-field">
                <label>{{ __('Phone*') }}</label>
                <input type="text"
                       placeholder="{{ __('translate.Phone') }}"
                       name="phone"
                       value="{{ html_decode($user->phone) }}">
            </div>
            <div class="optech-checkout-field">
                <label>{{ __('Email Address') }}</label>
                <input type="email"
                         name="email"
                         value="{{ html_decode($user->email) }}"
                         readonly>
            </div>
        </div>
        <div class="d_profile_setting_from_item">
            <div class="optech-checkout-field">
                <label>{{ __('Full Address*') }}</label>
                <input
                    type="text"
                    placeholder="{{ __('translate.Address') }}"
                    name="address"
                    value="{{ html_decode($user->address) }}"
                />
            </div>
            <div class="optech-checkout-field">
                <label>{{ __('ZIP Code*') }}</label>
                <input type="text" placeholder="Zip Code" name="zip"
                       value="{{ $user->zip }}">
            </div>
        </div>
        <div class="d_profile_setting_from_item">
            <div class="optech-checkout-field">
                <label>Profile Image*</label>
                <div class="change_profile_img_box_main">
                    <div class="change_profile_img_box">
                        <div class="change_profile_img_box_thumb">
                            <img
                                id="view_img"
                                src="{{ $user->image ? asset($user->image) : asset($general_setting->placeholder_image) }}"
                                alt="Profile Image"
                                class="gig-img-icon"
                            />
                        </div>
                        <div class="change_profile_img_box_text">
                            <p>Select <span>New File</span> to Upload</p>
                        </div>

                        <input
                            type="file"
                            class="my_file"
                            name="image"
                            id="profile-img"
                            accept="image/*"
                            onchange="previewImage(this)"
                        >
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="optech-default-btn " data-text="{{ __('Update Now') }}">
            <span class="btn-wraper">{{ __('Update Now') }}</span>
        </button>
    </form>
@endsection


@push('js_section')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const viewImg = document.getElementById('view_img');
                    viewImg.src = e.target.result;
                }

                reader.onerror = function(error) {
                    console.error('Error:', error);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
