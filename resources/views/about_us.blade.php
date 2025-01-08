@extends('master_layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('new-layout')
    <div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
        <div class="container">
            <h1 class="post__title">{{ __($pageTitle) }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li aria-current="page">{{ __($pageTitle) }}</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    @php
       $currentLang = session()->get('front_lang');
       $aboutUsContent = getContent('it_solutions_about_us.content', true);
       $agencyFeatureSection = getContent('digital_agency_feature_section.content', true);
        $counterContent = getContent('it_consulting_counter_section.content', true);

    @endphp
    <div class="section large-padding-tb4 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="optech-thumb extra-mr">
                        <img data-aos="fade-up" data-aos-duration="600" src="{{ asset(getImage($aboutUsContent, 'image_1')) }}" alt="">
                        <div class="optech-thumb-position" data-aos="fade-up" data-aos-duration="800">
                            <img src="{{ asset(getImage($aboutUsContent, 'image_2')) }}" alt="">
                        </div>
                        <div class="optech-shape1">
                            <img src="{{ asset('frontend/assets/img/shape/shape1.svg') }}" alt="Image">
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
                        <div class="optech-icon-list">
                            <ul>
                                <li><i class="ri-check-line"></i>{{ getTranslatedValue($aboutUsContent, 'feature_text_1', $currentLang) }}</li>
                                <li><i class="ri-check-line"></i>{{ getTranslatedValue($aboutUsContent, 'feature_text_2', $currentLang) }}</li>
                                <li><i class="ri-check-line"></i>{{ getTranslatedValue($aboutUsContent, 'feature_text_3', $currentLang) }}</li>
                            </ul>
                        </div>
                        <div class="optech-extra-mt">
                            <a class="optech-default-btn" href="{{ route('about-us') }}" data-text="{{ getTranslatedValue($aboutUsContent, 'button_text', $currentLang) }}"><span class="btn-wraper">
                                {{ getTranslatedValue($aboutUsContent, 'button_text', $currentLang) }}
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section large-padding-tb2 overflow-hidden bg-light1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <div class="optech-thumb extra-ml">
                        <img data-aos="fade-up" data-aos-duration="600" src="{{ asset(getImage($agencyFeatureSection,'image_1')) }}" alt="">
                        <div class="optech-thumb-position2" data-aos="fade-up" data-aos-duration="800">
                            <img src="{{ asset(getImage($agencyFeatureSection,'image_2')) }}" alt="">
                        </div>
                        <div class="optech-shape3">
                            <img src="{{ asset('frontend/assets/img/shape/shape3.svg') }}" alt="">
                        </div>
                        <div class="optech-shape4">
                            <img src="{{ asset('frontend/assets/img/shape/shape2.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="optech-default-content mr40">
                        <h2>{{ getTranslatedValue($agencyFeatureSection,'heading', $currentLang) }}</h2>
                        <div class="optech-extra-mt">
                            <div class="optech-iconbox-wrap2 rt-mb-35">
                                <div class="optech-iconbox-icon2">
                                    <img src="{{ asset(getImage($agencyFeatureSection, 'image_3')) }}" alt="">
                                </div>
                                <div class="optech-iconbox-data2">
                                    <a href="{{ getTranslatedValue($agencyFeatureSection,'feature_1_url', $currentLang) }}">
                                        <h5>{{ getTranslatedValue($agencyFeatureSection,'feature_1_heading', $currentLang) }}</h5>
                                    </a>
                                    <p>{{ getTranslatedValue($agencyFeatureSection,'feature_description_1', $currentLang) }}
                                    </p>
                                </div>
                            </div>
                            <div class="optech-iconbox-wrap2 rt-mb-35">
                                <div class="optech-iconbox-icon2">
                                    <img src="{{ asset(getImage($agencyFeatureSection, 'image_4')) }}" alt="">
                                </div>
                                <div class="optech-iconbox-data2">
                                    <a href="{{ getTranslatedValue($agencyFeatureSection,'feature_2_url', $currentLang) }}">
                                        <h5>{{ getTranslatedValue($agencyFeatureSection,'feature_2_heading', $currentLang) }}</h5>
                                    </a>
                                    <p>{{ getTranslatedValue($agencyFeatureSection,'feature_description_2', $currentLang) }}</p>
                                </div>
                            </div>
                            <div class="optech-iconbox-wrap2 mb-0">
                                <div class="optech-iconbox-icon2">
                                    <img src="{{ asset(getImage($agencyFeatureSection, 'image_5')) }}" alt="">
                                </div>
                                <div class="optech-iconbox-data2">
                                    <a href="{{ getTranslatedValue($agencyFeatureSection,'feature_3_url', $currentLang) }}">
                                        <h5>{{ getTranslatedValue($agencyFeatureSection,'feature_3_heading', $currentLang) }}</h5>
                                    </a>
                                    <p>{{ getTranslatedValue($agencyFeatureSection,'feature_description_3', $currentLang) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    @include('frontend.templates.layouts.teams')

    @include('frontend.templates.layouts.contact_section')

@endsection
