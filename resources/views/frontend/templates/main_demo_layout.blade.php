@extends('layout')

@section('front-content')
@include('frontend.templates.layouts.white_navbar')
    <div class="search-overlay"></div>

    @yield('content')

<!-- Footer Section Start -->
    @unless(Route::is('contact-us'))
        @include('frontend.templates.layouts.main_demo_cta')
    @endunless
<footer class="optech-footer-section dark-bg">
    <div class="container">
        <div class="optech-footer-top optech-section-padding">
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="optech-footer-textarea light-color">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset($general_setting->logo) }}" alt="Logo">
                        </a>
                        <p>{{ $footer->about_us }}</p>
                        <div class="optech-social-icon-box">
                            <ul>
                                <li>
                                    <a href="{{ @$footer->facebook }}">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ @$footer->linkedin }}">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ @$footer->twitter }}">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ @$footer->instagram }}">
                                        <i class="ri-instagram-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-4">
                    <div class="optech-footer-menu">
                        <div class="optech-footer-title">
                            <h5>{{ __('translate.Quick Links') }}</h5>
                        </div>
                        <ul>
                            <li><a href="{{ route('about-us') }}">{{ __('About Us') }}</a></li>
                            <li><a href="{{ route('teams') }}">{{ __('Our Team') }}</a></li>
                            <li><a href="{{ route('pricing') }}">{{ __('Pricing') }}</a></li>
                            <li><a href="{{ route('blogs') }}">{{ __('Blogs') }}</a></li>
                            <li><a href="{{ route('contact-us') }}">{{ __('Contact Us') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-5">
                    <div class="optech-footer-menu">
                        <div class="optech-footer-title">
                            <h5>{{ __('Services') }}</h5>
                        </div>
                        <ul>
                            @foreach($services as $service)
                                <li><a href="{{ $service->slug }}">{{ $service->translate?->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3">
                    <div class="optech-footer-menu mb-0">
                        <div class="optech-footer-title">
                            <h5>{{ __('Information') }}</h5>
                        </div>
                        <ul>
                            <li><a href="{{ route('privacy-policy') }}">{{ __('Privacy Policy') }}</a></li>
                            <li><a href="{{ route('terms-conditions') }}">{{ __('Terms & Conditions') }}</a></li>
                            <li><a href="{{ route('faq') }}">{{__('Faqs')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="optech-footer-bottom center">
            <div class="optech-copywright">
                <p>  {{ $footer->copyright }}</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
@endsection
