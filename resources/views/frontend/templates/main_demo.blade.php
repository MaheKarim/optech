@extends('layout')

@section('front-content')

    <header class="site-header optech-header-section optech-header-one" id="sticky-menu">
        <div class="optech-header-top">
            <div class="container">
                <div class="optech-header-info-wrap">
                    <div class="optech-header-info ">
                        <ul>
                            <li><i class="ri-map-pin-2-fill"></i>{{ $footer->address }}</li>
                            <li><a href="tel:{{ $footer->phone }}"><i class="ri-phone-fill"></i>{{ $footer->phone }}</a>
                            </li>
                            <li><a href="mailto:{{ $footer->email }}"><i class="ri-mail-fill"></i> {{ $footer->email }}
                                </a></li>
                        </ul>
                    </div>

                    <div class="optech-header-info-right">
                        <div class="cur_lun_login_item">
              <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 11.25C11.3096 11.25 10.75 10.6904 10.75 10C10.75 9.30964 11.3096 8.75 12 8.75C12.6904 8.75 13.25 9.30964 13.25 10C13.25 10.4142 13.5858 10.75 14 10.75C14.4142 10.75 14.75 10.4142 14.75 10C14.75 8.74122 13.9043 7.67998 12.75 7.35352V6.5C12.75 6.08579 12.4142 5.75 12 5.75C11.5858 5.75 11.25 6.08579 11.25 6.5V7.35352C10.0957 7.67998 9.25 8.74122 9.25 10C9.25 11.5188 10.4812 12.75 12 12.75C12.6904 12.75 13.25 13.3096 13.25 14C13.25 14.6904 12.6904 15.25 12 15.25C11.3096 15.25 10.75 14.6904 10.75 14C10.75 13.5858 10.4142 13.25 10 13.25C9.58579 13.25 9.25 13.5858 9.25 14C9.25 15.2588 10.0957 16.32 11.25 16.6465V17.5C11.25 17.9142 11.5858 18.25 12 18.25C12.4142 18.25 12.75 17.9142 12.75 17.5V16.6465C13.9043 16.32 14.75 15.2588 14.75 14C14.75 12.4812 13.5188 11.25 12 11.25Z"
                        fill="white"/>
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
                        fill="white"/>
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
                        fill="white"/>
                </svg>
              </span>
                            <a href="{{ route('login') }}" class="login-btn">{{ __('translate.Login') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="optech-header-bottom">
            <div class="container">
                <div class="optech-header-bottom2">
                    <nav class="navbar site-navbar">
                        <!-- Brand Logo-->
                        <div class="brand-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset($general_setting->logo) }}" alt="logo" class="light-version-logo">
                            </a>
                        </div>

                        @include('frontend.templates.layouts._menu_nav')

                        <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                            <div class="optech-header-icon">
                                <div class="optech-header-search">
                                    <i class="ri-search-line"></i>
                                </div>

                                @include('frontend.templates.layouts._cart')

                                <a class="optech-default-btn optech-header-btn" href="{{ route('contact-us') }}" data-text="Get in Touch">
                                    <span class="btn-wraper">{{ __('translate.Get in Touch') }}</span>
                                </a>
                            </div>
                        </div>
                        <!-- mobile menu trigger -->
                        <div class="mobile-menu-trigger">
                            <span></span>
                        </div>
                        <!--/.Mobile Menu Hamburger Ends-->
                    </nav>
                </div>

            </div>
        </div>

        <div class="optech-header-search-section">
            <div class="container">
                <div class="optech-header-search-box">
                    <form id="searchForm" action="{{ route('product.search') }}" method="GET">
                        <input type="search" name="query" placeholder="Search here..." id="searchInput">
                        <button id="header-search" type="button"><i class="ri-search-line"></i></button>
                        <p>{{ __('translate.Type above and press Enter to search. Press Close to cancel.') }}</p>
                    </form>
                </div>
            </div>
            <div class="optech-header-search-close">
                <i class="ri-close-line"></i>
            </div>
        </div>
    </header>

    <div class="search-overlay"></div>
    @php
        function getAnimationDuration($index) {
           $durations = [500, 700, 900];
           return $durations[$index % 3];
        }
       $currentLang = session()->get('front_lang');
       $contactUsContent = getContent('main_demo_hero.content', true);
       $keyFeaturesContent = getContent('key_feature.content', true);
       $aboutUsContent = getContent('main_demo_about_us.content', true);
       $serviceContent = getContent('main_demo_service_section.content', true);
       $serviceSuccessContent = getContent('main_demo_service_success_section.content', true);
       $testimonialContent = getContent('main_demo_testimonial_section.content', true);
       $blogContent = getContent('main_demo_blog_section.content', true);
       $expertTeamContent = getContent('expert_feature_section.content', true);
    @endphp
    <div class="optech-hero-section bg-cover"
         style="background-image: url({{ asset('frontend/assets/img/hero/bg1.png') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="optech-hero-content">
                        <h5>{{ getTranslatedValue($contactUsContent, 'heading', $currentLang) }}</h5>
                        <h1>{{ getTranslatedValue($contactUsContent, 'description', $currentLang) }}</h1>
                        <p>{{ getTranslatedValue($contactUsContent, 'small_description', $currentLang) }}</p>
                        <div class="optech-extra-mt">
                            <div class="optech-btn-wrap">
                                <a class="optech-default-btn"
                                   href="{{ url(@$contactUsContent->data_values['left_button_url']) }}"
                                   data-text="Work With Us"><span
                                        class="btn-wraper">{{ getTranslatedValue($contactUsContent,'left_button_text', $currentLang) }}</span></a>
                                <a class="optech-default-btn optech-white-btn"
                                   href="{{ url(@$contactUsContent->data_values['right_button_url']) }}"
                                   data-text="View Services"> <span
                                        class="btn-wraper">{{ getTranslatedValue($contactUsContent,'right_button_text', $currentLang) }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="optech-hero-thumb" data-aos="fade-up" data-aos-duration="700">
                        <img src="{{ url(@$contactUsContent->data_values['images']['hero_image']) }}" alt="Hero Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End section -->

    <div class="section extra-padding-tb">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="optech-iconbox-wrap2">
                        <div class="optech-iconbox-icon2">
                            <img src="{{ url(@$keyFeaturesContent->data_values['images']['image1']) }}" alt="">
                        </div>
                        <div class="optech-iconbox-data2">
                            <h5>{{ getTranslatedValue($keyFeaturesContent, 'heading_1', $currentLang) }}</h5>
                            <p>{{ getTranslatedValue($keyFeaturesContent,'description_1', $currentLang) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="optech-iconbox-wrap2">
                        <div class="optech-iconbox-icon2">
                            <img src="{{ url(@$keyFeaturesContent->data_values['images']['image2']) }}" alt="">
                        </div>
                        <div class="optech-iconbox-data2">
                            <h5>{{ getTranslatedValue($keyFeaturesContent, 'heading_2', $currentLang) }}</h5>
                            <p>{{ getTranslatedValue($keyFeaturesContent,'description_2', $currentLang) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="optech-iconbox-wrap2">
                        <div class="optech-iconbox-icon2">
                            <img src="{{ url(@$keyFeaturesContent->data_values['images']['image1']) }}" alt="Icon">
                        </div>
                        <div class="optech-iconbox-data2">
                            <h5>{{ getTranslatedValue($keyFeaturesContent, 'heading_3', $currentLang) }}</h5>
                            <p>{{ getTranslatedValue($keyFeaturesContent,'description_3', $currentLang) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="container">
        <div class="optech-divider"></div>
    </div>
    <!-- End section -->

    <div class="section large-padding-tb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="optech-thumb extra-mr">
                        <img data-aos="fade-up" data-aos-duration="600" src="{{ url(@$aboutUsContent->data_values['images']['image_1']) }}" alt="">
                        <div class="optech-thumb-position" data-aos="fade-up" data-aos-duration="800">
                            <img src="{{ url(@$aboutUsContent->data_values['images']['image_2']) }}" alt="">
                        </div>
                        <div class="optech-shape1">
                            <img src="{{ asset('frontend/assets/img/shape/shape1.svg') }}" alt="">
                        </div>
                        <div class="optech-shape2">
                            <img src="{{ asset('frontend/assets/img/shape/shape2.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-end">
                    <div class="optech-default-content ml40">
                        <h2>{{ getTranslatedValue($aboutUsContent, 'heading', $currentLang) }}</h2>
                        <h5>
                            {{ getTranslatedValue($aboutUsContent, 'sub_heading', $currentLang) }}
                        </h5>
                        <p>
                            {{ getTranslatedValue($aboutUsContent, 'description', $currentLang) }}
                        </p>
                        <div class="optech-extra-mt">
                            <a class="optech-default-btn" href="{{ getTranslatedValue($aboutUsContent, 'button_link', $currentLang) }}" data-text="{{ getTranslatedValue($aboutUsContent, 'button_text', $currentLang) }}"><span
                                    class="btn-wraper">
                                   {{ getTranslatedValue($aboutUsContent, 'button_text', $currentLang) }}
                                </span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="sectin bg-light1 optech-section-padding">
        <div class="container">
            <div class="optech-section-title center">
                <h2>{{ getTranslatedValue($serviceContent, 'heading', $currentLang) }}</h2>
            </div>
        </div>
            <div class="optech-4column-slider" data-aos="fade-up" data-aos-duration="800">
               @foreach($listings as $listing)
                <div class="optech-iconbox-wrap">
                    <div class="optech-iconbox-icon">
                        <img src="{{ asset($listing->thumb_image) }}" alt="Icon">
                    </div>
                    <div class="optech-iconbox-data">
                        <h5> {{ __($listing->translate?->title) }} </h5>
                        <p>{!!  Str::limit($listing->translate?->description, 15) !!}</p>
                        <a class="optech-icon-btn" href="{{ route('service', $listing->slug) }}">
                            <i class="icon-show ri-arrow-right-line"></i>
                            <span>{{ __('translate.Learn More') }}</span>
                            <i class="icon-hide ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
                 @endforeach
            </div>
    </div>
    <!-- End section -->

    <div class="section large-padding-tb4 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <div class="optech-thumb extra-ml">
                        <img data-aos="fade-up" data-aos-duration="600" src="{{ url(@$serviceSuccessContent->data_values['images']['image_1']) }}" alt="Image">
                        <div class="optech-thumb-position2" data-aos="fade-up" data-aos-duration="800">
                            <img src="{{ url(@$serviceSuccessContent->data_values['images']['image_2']) }}" alt="Image">
                        </div>
                        <div class="optech-shape3">
                            <img src="{{ asset('frontend/assets/img/shape/shape3.svg') }}" alt="shape vector">
                        </div>
                        <div class="optech-shape4">
                            <img src="{{ asset('frontend/assets/img/shape/shape4.svg') }}" alt="shape vector">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-end">
                    <div class="optech-default-content mr40">
                        <h2> {{ getTranslatedValue($serviceSuccessContent, 'heading', $currentLang) }} </h2>
                        <p>{{ getTranslatedValue($serviceSuccessContent, 'description', $currentLang) }}</p>
                        <div class="optech-extra-mt">
                            <section id="first-sec"></section>
                            <div class="optech-progress-item">
                                <div class="progress-bar" data-percentage="{{ getTranslatedValue($serviceSuccessContent, 'service_percentage_1', $currentLang) }}%">
                                    <div class="progress-title-holder">
                                        <div class="progress-title">{{ getTranslatedValue($serviceSuccessContent, 'service_name_1', $currentLang) }}</div>
                                        <div class="progress-number-wrapper">
                                            <div class="progress-number-mark">
                                                <div class="percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-content-outter">
                                        <div class="progress-content"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="optech-progress-item">
                                <div class="progress-bar" data-percentage="{{ getTranslatedValue($serviceSuccessContent, 'service_percentage_2', $currentLang) }}%">
                                    <div class="progress-title-holder">
                                        <div class="progress-title">{{ getTranslatedValue($serviceSuccessContent, 'service_name_2', $currentLang) }}</div>
                                        <div class="progress-number-wrapper">
                                            <div class="progress-number-mark">
                                                <div class="percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-content-outter">
                                        <div class="progress-content"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="optech-progress-item">
                                <div class="progress-bar" data-percentage="{{ getTranslatedValue($serviceSuccessContent, 'service_percentage_1', $currentLang) }}%">
                                    <div class="progress-title-holder">
                                        <div class="progress-title">{{ getTranslatedValue($serviceSuccessContent, 'service_name_3', $currentLang) }}</div>
                                        <div class="progress-number-wrapper">
                                            <div class="progress-number-mark">
                                                <div class="percent"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-content-outter">
                                        <div class="progress-content"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section optech-section-padding bg-light1">
        <div class="container">
            <div class="optech-section-title center">
                <h2>{{ __('Explore our recent projects') }}</h2>
            </div>
            <div class="row">
                @foreach($projects as $index => $project)
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="{{ getAnimationDuration($index) }}">
                        <div class="optech-portfolio-wrap">
                            <div class="optech-portfolio-thumb">

                                <img src="{{ asset($project->thumb_image) }}" alt="{{ $project->translate?->title ?? 'Portfolio Image' }}">
                                <a class="optech-portfolio-btn" href="{{ route('portfolio.show', $project->slug) }}">
                                    <span class="p-btn-wraper"><i class="ri-arrow-right-up-line"></i></span>
                                </a>
                                <div class="optech-portfolio-data">
                                    <a href="{{ route('portfolio.show', $project->slug) }}">
                                        <h4>{{ $project->translate?->title }}</h4>
                                    </a>
                                    <p>
                                        @if($project->category && $project->category->translate)
                                            {{ $project->category->translate->name }}
                                        @elseif($project->category)
                                            {{ $project->category->name }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                <div class="optech-center-btn">
                    <a class="optech-default-btn" href="{{ route('services') }}" data-text="{{ __('View Our All Works') }}">
                        <span class="btn-wraper">{{ __('View Our All Services') }}</span>
                    </a>
                </div>
            </div>
    </div>


    <!-- End section -->

    <div class="section optech-section-padding2 dark-bg">
        <div class="container">
            <div class="optech-section-title light-color center">
                <h2>{{ getTranslatedValue($expertTeamContent, 'heading', $currentLang) }}</h2>
            </div>
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-duration="400">
                    <div class="optech-team-wrap">
                        <div class="optech-team-thumb">
                            <img src="{{ asset($team->image) }}" alt="Team Member Image">
                            <div class="optech-social-icon-box style-three position">
                                <ul>
                                    <li>
                                        <a href="{{ $team->facebook }}" target="_blank">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $team->twitter }}" target="_blank">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $team->instagram }}" target="_blank">
                                            <i class="ri-instagram-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="optech-team-data">
                            <a href="{{ route('teamPerson', $team->slug) }}">
                                <h5>{{ $team->translate->name }}</h5>
                            </a>
                            <p>{{ $team->translate->designation }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Team section -->

    <div class="section optech-section-padding bg-light1">
        <div class="container">
            <div class="optech-section-title center">
                <h2>{{ getTranslatedValue($testimonialContent, 'heading', $currentLang) }}</h2>
            </div>
            <div class="optech-2column-slider" data-aos="fade-up" data-aos-duration="600">
                @foreach($testimonials as $testimonial)
                    <div class="optech-t-box">
                    <div class="optech-t-quote">
                        <img src="{{ asset('frontend/assets/img/v1/quote.svg') }}" alt="Image Section">
                    </div>
                    <div class="optech-t-data">
                        <p>“ {{ \Illuminate\Support\Str::limit($testimonial->translate?->comment, 250) }} ”</p>
                        <div class="optech-t-rating">
                            <ul>
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <li><img src="{{ asset('frontend/assets/img/v1/rating.svg') }}" alt="Rating Star"></li>
                                @endfor
                            </ul>
                        </div>
                        <div class="optech-t-author">
                            <h5>{{ $testimonial->translate?->name }}</h5>
                            <span>{{ $testimonial->translate?->designation }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Testimonial section -->

    <div class="section optech-section-padding2">
        <div class="container">
            <div class="optech-section-title">
                <div class="row">
                    <div class="col-xxl-5 col-lg-7">
                        <h2>{{ getTranslatedValue($blogContent, 'heading', $currentLang) }}</h2>
                    </div>
                    <div class="col-xxl-7 col-lg-5 d-flex align-items-center justify-content-end">
                        <div class="optech-title-btn">
                            <a class="optech-default-btn" href="{{ route('blogs') }}" data-text="{{ getTranslatedValue($blogContent, 'button_text', $currentLang) }}">
                                <span class="btn-wraper">
                                    {{ getTranslatedValue($blogContent, 'button_text', $currentLang) }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogPosts as $blog)
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="optech-blog-wrap">
                        <a href="{{ route('blog', $blog->slug) }}">
                            <div class="optech-blog-thumb">
                                <img src="{{ asset($blog->image) }}" alt="Blog Image">
                            </div>
                        </a>
                        <div class="optech-blog-content reduced-padding">
                            <div class="optech-blog-meta">
                                <ul>
                                    <li><a href="{{ route('blog', $blog->slug) }}">{{ $blog->category->translate->name ?? '' }}</a></li>
                                    <li><a href="{{ route('blog', $blog->slug) }}">{{ $blog->created_at->diffForHumans() }}</a></li>
                                </ul>
                            </div>
                            <a href="{{ route('blog', $blog->slug) }}">
                                <h4>{{ \Illuminate\Support\Str::limit($blog->translate->title, 25) }}</h4>
                            </a>
                            <a class="optech-icon-btn" href="{{ route('blog', $blog->slug) }}"><i
                                    class="icon-show ri-arrow-right-line"></i>
                                <span>{{ __('Learn More') }}</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End section -->

    @include('frontend.templates.layouts.main_demo_cta')

    <!-- End section -->
    <!-- Footer  -->
    <footer class="optech-footer-section">
        <div class="container">
            <div class="optech-footer-top optech-section-padding">
                <div class="row">
                    <div class="col-xl-4 col-lg-12">
                        <div class="optech-footer-textarea dark-color">
                            <a href="{{ route('home') }}">
                                <img src="{{ $general_setting->logo }}" alt="Image">
                            </a>
                            <p> {{ $footer->about_us }}</p>
                            <div class="optech-social-icon-box style-two">
                                <ul>
                                    <li>
                                        <a href="{{ $footer->facebook }}" target="_blank">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $footer->linkedin }}" target="_blank">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $footer->twitter }}" target="_blank">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $footer->instagram }}" target="_blank">
                                            <i class="ri-instagram-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-4">
                        <div class="optech-footer-menu dark-color">
                            <div class="optech-footer-title dark-color">
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
                        <div class="optech-footer-menu dark-color ml30">
                            <div class="optech-footer-title dark-color">
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
                        <div class="optech-footer-menu dark-color mb-0">
                            <div class="optech-footer-title dark-color">
                                <h5>{{ __('Information') }}</h5>
                            </div>
                            <ul>
                                <li><a href="{{ route('services') }}">{{ __('Services') }}</a></li>
                                <li><a href="{{ route('privacy-policy') }}">{{ __('Privacy Policy') }}</a></li>
                                <li><a href="{{ route('terms-conditions') }}">{{ __('Terms & Conditions') }}</a></li>
                                <li><a href="{{ route('faq') }}">{{__('Faqs')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="optech-footer-bottom center one">
                <div class="optech-copywright dark-color">
                    <p> {{ $footer->copyright }} </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- End Footer -->
@endsection

@push('js_section')

    <script>
        (function($) {
            "use strict";
            $(document).ready(function () {
                $("#language_dropdown").on("change", function(){
                    $("#language_form").submit();
                });
            });
        })(jQuery);
    </script>

    <script>
        @if(Session::has('message'))
        var type="{{Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif


        @if(Session::has('demo_mode'))
        toastr.warning("{{ __('translate.All Language keywords are not implemented in the demo mode') }}");
        toastr.info("{{ __('translate.Admin can translate every word from the admin panel') }}");
        @endif
    </script>
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif
    @stack('js_section')

    <script>
        // Cart Related Code
        $(document).on('click', '.cart-add-btn', function (e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            var quantity = $('input[name="quantity"]').val() || 1;
            var $this = $(this);

            // Create Form Data
            let formData = new FormData();
            formData.append('product_id', productId);
            formData.append('quantity', quantity);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('cart.add') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $this.attr("disabled", true);
                },
                complete: function () {
                    $this.attr("disabled", false);
                },
                success: function (response) {
                    if (response.success) {
                        $('.cart-count').text(response.totalCartItem);
                        toastr.success("{{ __('translate.Cart Added Successfully') }}");
                    } else {
                        toastr.error("{{ __('translate.Something Went Wrong') }}");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX error:", xhr.responseText);
                }
            });
        });
    </script>
@endpush
