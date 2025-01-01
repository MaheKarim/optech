@extends('frontend.templates.main_demo_layout')


@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('content')

    <!-- Main Start -->
    <div class="optech-breadcrumb"
        style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
        <div class="container">
            <h1 class="post__title">{{ __('Contact Us') }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li aria-current="page"> {{ __('Contact Us') }}</li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section optech-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="optech-default-content mr40">
                        <h2>{{ $contact_us->title }}</h2>
                        <p>{{ $contact_us->description }}</p>
                        <div class="optech-contact-info-column">
                            <div class="optech-contact-info">
                                <i class="ri-map-pin-2-fill"></i>
                                <h5>{{ __('Address') }}</h5>
                                <p> {{ Str::limit($contact_us->address, 20) }} </p>
                            </div>
                            <div class="optech-contact-info">
                                <i class="ri-mail-fill"></i>
                                <h5>{{ __('Contact') }}</h5>
                                <a href="mailto:{{ $contact_us->email }}">{{ $contact_us->email }}</a>
                                <a href="tel:123">{{ $contact_us->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="optech-main-form bg-light1 ml60" data-aos="fade-up" data-aos-duration="800">
                        <h3>{{ __('Fill The Contact Form') }}</h3>
                        <p>{{ __('Feel free to contact with us, we don’t spam your email') }}</p>
                        <form action="{{ route('store-contact-message') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="optech-main-field">
                                        <input
                                            type="text"
                                            id="name"
                                            placeholder="{{ __('translate.Name') }}"
                                            name="name"
                                            value="{{ old('name') }}"
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="optech-main-field">
                                        <input
                                            type="text"
                                            id="phone"
                                            placeholder="{{ __('translate.Phone') }}"
                                            name="phone"
                                            value="{{ old('phone') }}"
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="optech-main-field">
                                        <input
                                            type="email"
                                            id="email"
                                            placeholder="{{ __('translate.Email') }}"
                                            name="email"
                                            value="{{ old('email') }}"
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="optech-main-field">
                                        <textarea name="message" placeholder="{{ __('translate.Message') }}">{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                @if($general_setting->recaptcha_status==1)
                                    <div class="optech-main-field">
                                        <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                                    </div>
                                @endif
                                <div class="col-lg-12">
                                    <button id="optech-main-form-btn" type="submit" data-text="{{ __('Send Message') }}">
                                        <span class="btn-wraper">{{ __('Send Message') }}</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="optech-map-page">
        <div id="map"></div>
    </div>

@endsection

@push('js_section')
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyArZVfNvjnLNwJZlLJKuOiWHZ6vtQzzb1Y"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endpush
