@extends('layout')

@section('front-content')
    <header class="site-header optech-header-section site-header--menu-right" id="sticky-menu">
        <div class="optech-header-top dark-bg">
            <div class="container">
                <div class="optech-header-info-wrap">
                    <div class="optech-header-info ">
                        <ul>
                            <li><i class="ri-map-pin-2-fill"></i>{{ $footer->address }}</li>
                            <li><a href="tel:{{ $footer->phone }}"><i class="ri-phone-fill"></i>{{ $footer->phone }}</a></li>
                            <li><a href="mailto:{{ $footer->email }}"><i class="ri-mail-fill"></i> {{ $footer->email }}</a></li>
                        </ul>
                    </div>

                    <div class="optech-header-info-right">
                        <div class="cur_lun_login_item">
                          <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 11.25C11.3096 11.25 10.75 10.6904 10.75 10C10.75 9.30964 11.3096 8.75 12 8.75C12.6904 8.75 13.25 9.30964 13.25 10C13.25 10.4142 13.5858 10.75 14 10.75C14.4142 10.75 14.75 10.4142 14.75 10C14.75 8.74122 13.9043 7.67998 12.75 7.35352V6.5C12.75 6.08579 12.4142 5.75 12 5.75C11.5858 5.75 11.25 6.08579 11.25 6.5V7.35352C10.0957 7.67998 9.25 8.74122 9.25 10C9.25 11.5188 10.4812 12.75 12 12.75C12.6904 12.75 13.25 13.3096 13.25 14C13.25 14.6904 12.6904 15.25 12 15.25C11.3096 15.25 10.75 14.6904 10.75 14C10.75 13.5858 10.4142 13.25 10 13.25C9.58579 13.25 9.25 13.5858 9.25 14C9.25 15.2588 10.0957 16.32 11.25 16.6465V17.5C11.25 17.9142 11.5858 18.25 12 18.25C12.4142 18.25 12.75 17.9142 12.75 17.5V16.6465C13.9043 16.32 14.75 15.2588 14.75 14C14.75 12.4812 13.5188 11.25 12 11.25Z"
                                    fill="white" />
                            </svg>
                          </span>
                            <select class="js-example-basic-single" name="currency_code">
                                @foreach ($currency_list as $currency_item)
                                    <option
                                        {{ Session::get('currency_code') == $currency_item->currency_code ? 'selected' : '' }} value="{{ $currency_item->currency_code }}">{{ $currency_item->currency_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="cur_lun_login_item">
                          <span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.87643 2.47813C7.18954 4.3671 6.75001 7.02637 6.75001 10C6.75001 10.3796 6.75718 10.754 6.7711 11.1224C7.79627 11.2054 8.87923 11.25 10 11.25C11.1208 11.25 12.2038 11.2054 13.2289 11.1224C13.2429 10.754 13.25 10.3796 13.25 10C13.25 7.02637 12.8105 4.3671 12.1236 2.47813C11.779 1.53057 11.3865 0.816517 10.9883 0.353377C10.8696 0.215345 10.7565 0.106123 10.6496 0.0207619C10.4349 0.00699121 10.2183 0 10 0C9.78177 0 9.56516 0.00699124 9.3504 0.020762C9.24349 0.106123 9.13042 0.215345 9.01175 0.353377C8.61357 0.816517 8.221 1.53057 7.87643 2.47813ZM13.1315 12.6346C12.1291 12.71 11.0797 12.75 10 12.75C8.92028 12.75 7.87096 12.71 6.86854 12.6346C7.04293 14.5326 7.40024 16.2123 7.87643 17.5219C8.221 18.4694 8.61357 19.1835 9.01175 19.6466C9.13042 19.7847 9.24348 19.8939 9.35039 19.9792C9.56516 19.993 9.78177 20 10 20C10.2183 20 10.4349 19.993 10.6496 19.9792C10.7565 19.8939 10.8696 19.7847 10.9883 19.6466C11.3865 19.1835 11.779 18.4694 12.1236 17.5219C12.5998 16.2123 12.9571 14.5326 13.1315 12.6346ZM5.26493 10.968C5.25504 10.6486 5.25001 10.3257 5.25001 10C5.25001 6.8985 5.70592 4.05777 6.46674 1.96552C6.67341 1.39719 6.90681 0.872262 7.16688 0.407001C3.12245 1.59958 0.144576 5.28026 0.00512695 9.67717C0.882073 10.0753 2.09222 10.433 3.56698 10.7066C4.104 10.8062 4.67155 10.8938 5.26493 10.968ZM0.0879116 11.3317C1.0045 11.6736 2.09274 11.9587 3.29339 12.1814C3.94235 12.3018 4.63038 12.4051 5.3503 12.4893C5.5238 14.6072 5.91514 16.5176 6.46674 18.0345C6.67341 18.6028 6.90681 19.1277 7.16688 19.593C3.43599 18.4929 0.612705 15.2755 0.0879116 11.3317ZM14.6497 12.4893C15.3697 12.4051 16.0577 12.3018 16.7066 12.1814C17.9073 11.9587 18.9955 11.6736 19.9121 11.3317C19.3873 15.2755 16.564 18.4929 12.8332 19.593C13.0932 19.1277 13.3266 18.6028 13.5333 18.0345C14.0849 16.5176 14.4762 14.6072 14.6497 12.4893ZM19.9949 9.67717C19.118 10.0753 17.9078 10.433 16.4331 10.7066C15.896 10.8062 15.3285 10.8938 14.7351 10.968C14.745 10.6486 14.75 10.3257 14.75 10C14.75 6.8985 14.2941 4.05777 13.5333 1.96552C13.3266 1.39719 13.0932 0.872265 12.8332 0.407004C16.8776 1.59958 19.8555 5.28026 19.9949 9.67717Z"
                                    fill="white" />
                            </svg>
                          </span>
                            <form action="{{ route('language-switcher') }}" id="language_form">
                                <select id="language_dropdown" class="js-example-basic-single" name="lang_code">
                                    @foreach ($language_list as $language_item)
                                        <option {{ Session::get('front_lang') == $language_item->lang_code ? 'selected' : '' }} value="{{ $language_item->lang_code }}">{{ $language_item->lang_name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>

                        <div class="cur_lun_login_item">
                          <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11ZM12 21C15.866 21 19 19.2091 19 17C19 14.7909 15.866 13 12 13C8.13401 13 5 14.7909 5 17C5 19.2091 8.13401 21 12 21Z"
                                    fill="white" />
                            </svg>
                          </span>
                            <a href="{{ route('login') }}" class="login-btn">{{ __('translate.Login') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="optech-header-bottom p-0">
            <div class="container">
                <div class="header-bottom-border border-color-light">
                    <nav class="navbar site-navbar">
                        <!-- Brand Logo-->
                        <div class="brand-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset($general_setting->white_logo) }}" alt="logo" class="light-version-logo">
                            </a>
                        </div>


                        @include('frontend.templates.layouts._menu_nav',['menuTheme' => 'light-color'])


                        <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                            <div class="optech-header-icon">
                                <div class="optech-header-search light-color">
                                    <i class="ri-search-line"></i>
                                </div>
                                @include('frontend.templates.layouts._cart', ['iconColor' => '#fff'])

                                <div class="optech-header-barger light-color">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <!-- mobile menu trigger -->
                        <div class="mobile-menu-trigger light-color">
                            <span></span>
                        </div>
                        <!--/.Mobile Menu Hamburger Ends-->
                    </nav>
                </div>

            </div>
        </div>

    </header>


    @include('frontend.templates.layouts.search_bar')

    <div class="search-overlay"></div>
    <!--End search -->

    <div class="optech-sidemenu-wraper">
        <div class="optech-sidemenu-column">
            <div class="optech-sidemenu-body">
                <div class="optech-sidemenu-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset($general_setting->logo) }}" alt="Home"></a>
                </div>
                <p>{{ $footer->about_us }}</p>

                <div class="optech-social-icon-box style-two">
                    <ul>
                        <li>
                            <a href="{{ $footer->facebook }}" >
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $footer->linkedin }}">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $footer->twitter }}">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $footer->instagram }}">
                                <i class="ri-instagram-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="optech-contact-info-wrap mt-2">
                    <div class="optech-contact-info">
                        <i class="ri-map-pin-2-fill"></i>
                        <h5>{{ __('Address') }}</h5>
                        <p>{{ $footer->address }}</p>
                    </div>
                    <div class="optech-contact-info">
                        <i class="ri-mail-fill"></i>
                        <h5>{{ __('Contact') }}</h5>
                        <a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>
                        <a href="tel:{{ $footer->phone }}">{{ $footer->phone }}</a>
                    </div>
                </div>

            </div>
            <span class="optech-sidemenu-close">
        <i class="ri-close-line"></i>
      </span>
        </div>
        <div class="offcanvas-overlay"></div>

    </div>

    <div class="offcanves-menu"></div>

    <!-- End sidebar -->

    @php
        $currentLang = session()->get('front_lang');
        $heroContent = getContent('it_consulting_hero_section.content', true);
        $keyContent = getContent('key_feature.content', true);
        $aboutUsContent = getContent('main_demo_about_us.content', true);
        $serviceContent = getContent('main_demo_service_section.content', true);
        $processContent = getContent('main_demo_process_section.content', true);
        $counterContent = getContent('it_consulting_counter_section.content', true);
        $testimonialContent = getContent('main_demo_testimonial_section.content', true);
        $blogContent = getContent('main_demo_blog_section.content', true);


    @endphp

    <div class="optech-hero-section5" style="background-image: url({{ asset(getImage($heroContent, 'hero_image')) }})">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 d-flex align-items-center">
                    <div class="optech-hero-content white-color sm">
                        <h1>{{ getTranslatedValue($heroContent, 'heading', $currentLang) }}</h1>
                        <p>{{ getTranslatedValue($heroContent, 'description', $currentLang) }}</p>
                        <div class="optech-extra-mt" data-aos="fade-up" data-aos-duration="600">
                            <a class="optech-default-btn optech-white-btn" href="{{ route('contact-us') }}" data-text="{{ getTranslatedValue($heroContent, 'left_button_text', $currentLang) }}">
                                <span class="btn-wraper">
                                {{ getTranslatedValue($heroContent, 'left_button_text', $currentLang) }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5" data-aos="fade-up" data-aos-duration="800">
                    <div class="optech-hero-form">
                        <h4>{{ getTranslatedValue($heroContent, 'form_title', $currentLang) }}</h4>
                        <p>{{ getTranslatedValue($heroContent, 'form_description', $currentLang) }}</p>
                        <form action="{{ route('store-contact-message') }}" method="post">
                            @csrf
                            <div class="optech-main-field">
                                <input type="text" placeholder="{{ __('Your name') }}" name="name">
                            </div>
                            <div class="optech-main-field">
                                <input type="email" placeholder="{{ __('Email address') }}" name="email">
                            </div>
                            <div class="optech-main-field">
                                <textarea name="message" placeholder="{{ __('Write your message') }}"></textarea>
                            </div>
                            <button id="optech-main-form-btn" type="submit" data-text="{{ getTranslatedValue($heroContent, 'form_button_text', $currentLang) }}">
                                <span class="btn-wraper">
                                    {{ getTranslatedValue($heroContent, 'form_button_text', $currentLang) }}
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section optech-section-padding2 bg-light1">
        <div class="container">
            <div class="optech-section-title center">
                <h2>{{ getTranslatedValue($keyContent, 'title', $currentLang) }}</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="optech-iconbox-wrap4">
                        <div class="optech-iconbox-icon4">
                            <img src="{{ asset(getImage($keyContent,'image1')) }}" alt="">
                        </div>
                        <div class="optech-iconbox-data4">
                            <h4>{{ getTranslatedValue($keyContent, 'heading_1', $currentLang) }}</h4>
                            <p>{{ getTranslatedValue($keyContent, 'description_1', $currentLang) }}</p>
                            <a class="optech-icon-btn" href="{{ route(getTranslatedValue($keyContent, 'service_url_1', $currentLang)) }}"><i class="icon-show ri-arrow-right-line"></i>
                                <span>{{ __('Learn More') }}</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                    <div class="optech-iconbox-wrap4">
                        <div class="optech-iconbox-icon4">
                            <img src="{{ asset(getImage($keyContent,'image2')) }}" alt="">
                        </div>
                        <div class="optech-iconbox-data4">
                            <h4>{{ getTranslatedValue($keyContent, 'heading_2', $currentLang) }}</h4>
                            <p>{{ getTranslatedValue($keyContent, 'description_2', $currentLang) }}</p>
                            <a class="optech-icon-btn" href="{{ route(getTranslatedValue($keyContent, 'service_url_2', $currentLang)) }}"><i class="icon-show ri-arrow-right-line"></i>
                                <span>{{ __('Learn More') }}</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                    <div class="optech-iconbox-wrap4">
                        <div class="optech-iconbox-icon4">
                            <img src="{{ asset(getImage($keyContent,'image3')) }}" alt="">
                        </div>
                        <div class="optech-iconbox-data4">
                            <h4>{{ getTranslatedValue($keyContent, 'heading_3', $currentLang) }}</h4>
                            <p>{{ getTranslatedValue($keyContent, 'description_3', $currentLang) }}</p>
                            <a class="optech-icon-btn" href="{{ route(getTranslatedValue($keyContent, 'service_url_3', $currentLang)) }}"><i class="icon-show ri-arrow-right-line"></i>
                                <span>{{ __('Learn More') }}</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section large-padding-tb2 overflow-hidden">
        <div class="container">
            <div id="optech-counter"></div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="optech-thumb extra-mr">
                        <img data-aos="fade-up" data-aos-duration="600" src="{{ url(@$aboutUsContent->data_values['images']['image_1']) }}" alt="Image">
                        <div class="optech-thumb-position" data-aos="fade-up" data-aos-duration="800">
                            <img src="{{ url(@$aboutUsContent->data_values['images']['image_2']) }}" alt="Image">
                        </div>
                        <div class="optech-shape1">
                            <img src="{{ asset('frontend/assets/img/shape/shape1.svg') }}" alt="">
                        </div>
                        <div class="optech-shape2">
                            <img src="{{ asset('frontend/assets/img/shape/shape2.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="optech-default-content ml40">
                        <h2>{{ getTranslatedValue($aboutUsContent, 'heading', $currentLang) }}</h2>
                        <p>{{ getTranslatedValue($aboutUsContent, 'description', $currentLang) }}</p>
                        <div class="optech-extra-mt">
                            <div class="optech-counter-wrap2">
                                <div class="optech-counter-data">
                                    <div class="optech-counter-number">
                                        <span data-percentage="{{ $aboutUsContent->data_values['left_counter'] }}" class="optech-counter"></span>+
                                    </div>
                                    <p>{{ getTranslatedValue($aboutUsContent, 'left_text', $currentLang) }}</p>
                                </div>
                                <div class="optech-counter-data">
                                    <div class="optech-counter-number">
                                        <span data-percentage="{{ $aboutUsContent->data_values['right_counter'] }}" class="optech-counter"></span>+
                                    </div>
                                    <p>{{ getTranslatedValue($aboutUsContent, 'right_text', $currentLang) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="optech-extra-mt">
                            <a class="optech-default-btn" href="{{ getTranslatedValue($aboutUsContent, 'button_link', $currentLang) }}" data-text="{{ getTranslatedValue($aboutUsContent, 'button_text', $currentLang) }}">
                                <span class="btn-wraper">{{ getTranslatedValue($aboutUsContent, 'button_text', $currentLang) }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Us section -->

    <div class="section optech-section-padding bg-light1">
        <div class="container">
            <div class="optech-section-title center">
                <h2>{{ getTranslatedValue($serviceContent, 'heading', $currentLang) }}</h2>
            </div>
            <div class="optech-4column-slider2" data-aos="fade-up" data-aos-duration="800">
                @foreach($listings as $listing)
                <div class="optech-service-box">
                    <div class="optech-service-thumb">

                        @if($listing->gallery->isNotEmpty())
                        <img src="{{ asset($listing->gallery->first()['image']) }}" alt="Image Coupon">
                        @endif
                        <div class="optech-service-data">
                            <div class="optech-service-icon">
                                <img src="{{ asset($listing->thumb_image) }}" alt="">
                            </div>
                            <a href="{{ route('service', $listing->slug) }}">
                                <h5>{{ $listing->translate?->title }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section optech-section-padding5">
        <div class="container">
            <div class="optech-section-title center">
                <h2>{{ getTranslatedValue($processContent, 'heading', $currentLang) }}</h2>
            </div>
            <div class="row z-index">
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="optech-numberbox-wrap">
                        <div class="optech-numberbox-icon">
                            <img src="{{ asset(getImage($processContent,'image_1')) }}" alt="">
                        </div>
                        <div class="optech-numberbox-data">
                            <span>{{ __('01') }}</span>
                            <h4>{{ getTranslatedValue($processContent, 'step_1', $currentLang) }}</h4>
                            <p>{{ getTranslatedValue($processContent, 'description_1', $currentLang) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                    <div class="optech-numberbox-wrap">
                        <div class="optech-numberbox-icon">
                            <img src="{{ asset(getImage($processContent,'image_2')) }}" alt="">
                        </div>
                        <div class="optech-numberbox-data">
                            <span>{{ __('02') }}</span>
                            <h4>{{ getTranslatedValue($processContent, 'step_2', $currentLang) }}</h4>
                            <p>{{ getTranslatedValue($processContent, 'description_2', $currentLang) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                    <div class="optech-numberbox-wrap">
                        <div class="optech-numberbox-icon">
                            <img src="{{ asset(getImage($processContent,'image_3')) }}" alt="">
                        </div>
                        <div class="optech-numberbox-data">
                            <span>{{__('03')}}</span>
                            <h4>{{ getTranslatedValue($processContent, 'step_3', $currentLang) }}</h4>
                            <p>{{ getTranslatedValue($processContent, 'description_3', $currentLang) }}</p>
                        </div>
                    </div>
                </div>
                <div class="optech-line">
                    <img src="{{ asset('frontend/assets/img/v2/line.png') }}" alt="Line">
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section optech-section-padding dark-bg">
        <div class="container">
            <div class="optech-section-title light-color center">
                <h2>{{ __('Explore our recent projects') }}</h2>
            </div>
        </div>
        <div class="optech-3column-slider" data-aos="fade-up" data-aos-duration="800">
            @foreach($projects as $index => $project)

            <div class="optech-portfolio-wrap2">
                <div class="optech-portfolio-thumb2">
                    <img src="{{ asset($project->thumb_image) }}" alt="Image">
                </div>
                <div class="optech-portfolio-data2-wrap">
                    <div class="optech-portfolio-data2">
                        <a href="{{ route('portfolio.show', $project->slug) }}">
                            <h4>{{ $project->translate?->title }}</h4>
                        </a>
                        <p>@if($project->category && $project->category->translate)
                                {{ $project->category->translate->name }}
                            @elseif($project->category)
                                {{ $project->category->name }}
                            @endif
                        </p>
                    </div>
                    <a class="optech-portfolio-btn2" href="{{ route('portfolio.show', $project->slug) }}">
                        <span class="p-btn-wraper"><i class="ri-arrow-right-up-line"></i></span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End section -->

    <div class="optech-counter-section3">
        <div class="container">
            <div id="optech-counter2"></div>
            <div class="optech-counter-wrap3">
                <div class="optech-counter-data3" data-aos="fade-up" data-aos-duration="{{ getTranslatedValue($counterContent, 'counter_1', $currentLang) }}">
                    <div class="optech-counter-icon3">
                        <img src="{{ asset(getImage($counterContent, 'image_1')) }}" alt="">
                    </div>
                    <div class="optech-counter-right">
                        <div class="optech-counter-number3">
                            <span data-percentage="{{ getTranslatedValue($counterContent, 'counter_1', $currentLang) }}" class="optech-counter"></span>+
                        </div>
                        <p>{{ getTranslatedValue($counterContent, 'title_1', $currentLang) }}</p>
                    </div>
                </div>
                <div class="optech-counter-data3" data-aos="fade-up" data-aos-duration="{{ getTranslatedValue($counterContent, 'counter_2', $currentLang) }}">
                    <div class="optech-counter-icon3">
                        <img src="{{ asset(getImage($counterContent, 'image_2')) }}" alt="">
                    </div>
                    <div class="optech-counter-right">
                        <div class="optech-counter-number3">
                            <span data-percentage="{{ getTranslatedValue($counterContent, 'counter_2', $currentLang) }}" class="optech-counter"></span>+
                        </div>
                        <p>{{ getTranslatedValue($counterContent, 'title_2', $currentLang) }}</p>
                    </div>
                </div>
                <div class="optech-counter-data3" data-aos="fade-up" data-aos-duration="{{ getTranslatedValue($counterContent, 'counter_3', $currentLang) }}">
                    <div class="optech-counter-icon3">
                        <img src="{{ asset(getImage($counterContent, 'image_3')) }}" alt="">
                    </div>
                    <div class="optech-counter-right">
                        <div class="optech-counter-number3">
                            <span data-percentage="{{ getTranslatedValue($counterContent, 'counter_3', $currentLang) }}" class="optech-counter"></span>+
                        </div>
                        <p>{{ getTranslatedValue($counterContent, 'title_3', $currentLang) }}</p>
                    </div>
                </div>
                <div class="optech-counter-data3" data-aos="fade-up" data-aos-duration="{{ getTranslatedValue($counterContent, 'counter_4', $currentLang) }}">
                    <div class="optech-counter-icon3">
                        <img src="{{ asset(getImage($counterContent, 'image_4')) }}" alt="">
                    </div>
                    <div class="optech-counter-right">
                        <div class="optech-counter-number3">
                            <span data-percentage="{{ getTranslatedValue($counterContent, 'counter_4', $currentLang) }}" class="optech-counter"></span>%
                        </div>
                        <p>{{ getTranslatedValue($counterContent, 'title_4', $currentLang) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Counter section -->

    <div class="container">
        <div class="optech-divider"></div>
    </div>
    <!-- End -->

    <div class="section optech-section-padding">
        <div class="container">
            <div class="optech-section-title center">
                <h2>{{ getTranslatedValue($testimonialContent, 'heading', $currentLang) }}</h2>
            </div>
            <div class="optech-3column-slider2" data-aos="fade-up" data-aos-duration="800">
                @foreach($testimonials as $testimonial)
                <div class="optech-t-box3 mb-0">
                    <div class="optech-t-data3">
                        <div class="optech-t-rating3">
                            <ul>
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <li><img src="{{ asset('frontend/assets/img/v1/rating.svg') }}" alt="Rating Star"></li>
                                @endfor

                            </ul>
                        </div>
                        <p>“ {{ \Illuminate\Support\Str::limit($testimonial->translate?->comment, 250) }} ”</p>
                        <div class="optech-t-footer">
                            <div class="optech-t-author">
                                <h5>{{ $testimonial->translate?->name }}</h5>
                                <span>{{ $testimonial->translate?->designation }}</span>
                            </div>
                            <div class="optech-t-quote3">
                                <img src="{{ asset('frontend/assets/img/v1/quote.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section optech-section-padding2 bg-light1">
        <div class="container">
            <div class="optech-section-title">
                <div class="row">
                    <div class="col-xxl-5 col-lg-7">
                        <h2>{{ getTranslatedValue($blogContent, 'heading', $currentLang) }}</h2>
                    </div>
                    <div class="col-xxl-7 col-lg-5 d-flex align-items-center justify-content-end">
                        <div class="optech-title-btn">
                            <a class="optech-default-btn" href="{{ route('blogs') }}" data-text="{{ __('View All Posts') }}"><span class="btn-wraper">{{ __('View All Posts') }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogPosts as $blog)
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="optech-blog-wrap2">
                        <div class="optech-blog-thumb2">
                            <img src="{{ asset($blog->image) }}" alt="Image Blog">
                            <div class="optech-blog-content2">
                                <div class="optech-blog-meta">
                                    <ul>
                                        <li><a href="{{ route('blog', $blog->slug) }}">{{ $blog->category->translate->name ?? '' }}</a></li>
                                        <li><a href="{{ route('blog', $blog->slug) }}">{{ $blog->created_at->diffForHumans() }}</a></li>
                                    </ul>
                                </div>
                                <a href="{{ route('blog', $blog->slug) }}">
                                    <h4>{{ \Illuminate\Support\Str::limit($blog->translate->title, 25) }}</h4>
                                </a>
                                <a class="optech-icon-btn" href="{{ route('blog', $blog->slug) }}"><i class="icon-show ri-arrow-right-line"></i>
                                    <span>{{ __('Learn More') }}</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End section -->

    <!-- Footer  -->

    <footer class="optech-footer-section footer-v5">
        <div class="optech-footer-form-section">
            <div class="container">
                <div class="optech-footer-form-wrap">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="optech-footer-form">
                                <h4>{{ __('Fill The Contact Form') }}</h4>
                                <p>{{ __('Get Free Consultation For IT Solutions') }}</p>
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
                                                />                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="optech-main-field">
                                                <input
                                                    type="number"
                                                    id="phone"
                                                    placeholder="{{ __('translate.Phone') }}"
                                                    name="phone"
                                                    value="{{ old('phone') }}"
                                                />                                            </div>
                                        </div>
                                    </div>

                                    <div class="optech-main-field">
                                        <input
                                            type="email"
                                            id="email"
                                            placeholder="{{ __('translate.Email') }}"
                                            name="email"
                                            value="{{ old('email') }}"
                                        />                                    </div>
                                    <div class="optech-main-field">
                                        <textarea name="message" placeholder="{{ __('translate.Message') }}">{{ old('message') }}</textarea>
                                    </div>

                                    @if($general_setting->recaptcha_status==1)
                                        <div class="optech-main-field">
                                            <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                                        </div>
                                    @endif


                                    <button id="optech-main-form-btn" type="submit" data-text="{{ __('Send Message') }}"> <span class="btn-wraper">{{ __('Send Message') }}
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="optech-footer-top optech-section-padding">
                <div class="row">
                    <div class="col-xl-4 col-lg-12">
                        <div class="optech-footer-textarea light-color">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset($general_setting->white_logo) }}}" alt="">
                            </a>
                            <p>{{ __($footer->about_us) }}</p>
                            <div class="optech-social-icon-box">
                                <ul>
                                    <li>
                                        <a href="{{ $footer->facebook }}">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $footer->linkedin }}">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $footer->twitter }}">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $footer->instagram }}">
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
                                <h5>{{ __('Quick Links') }}</h5>
                            </div>
                            <ul>
                                <li><a href="{{ route('about-us') }}">{{ __('About Us') }}</a></li>
                                <li><a href="{{ route('teams') }}">{{ __('Our Teams') }}</a></li>
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
                    <p> {{ $footer->copyright }}</p>
                </div>
            </div>
        </div>
    </footer>

@endsection

@push('js_section')
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyArZVfNvjnLNwJZlLJKuOiWHZ6vtQzzb1Y"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endpush
