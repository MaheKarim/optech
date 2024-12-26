@extends('frontend.templates.main_demo_layout')

@section('content')
    @php
        $currentLang = session()->get('front_lang');
        $getSidebarCTAData = getContent('main_demo_sidebar_cta_section.content', true);
    @endphp
    <!-- Page Update -->
    <div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png')}})">
        <div class="container">
            <h1 class="post__title">{{ __($service->translate->title) }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li aria-current="page"> {{ __($service->translate->title) }}</li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section optech-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="optech-service-details-wrap">
                        <img data-aos="fade-up" data-aos-duration="800" src="{{ asset($galleries[0]->image) }}" alt="">
                        <div class="optech-service-details-item">
                             @php echo @$service->translate->description  @endphp
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="optech-service-sidebar">
                        <div class="optech-service-menu">
                            <ul>
                                @foreach($showServices as $service)
                                <li><a href="{{ route('service', $service->slug) }}">{{ __($service->title) }} <i class="ri-arrow-right-up-line"></i></a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="optech-service-contact" data-aos="fade-up" data-aos-duration="800" style="background-image: url({{ asset('frontend/assets/img/service/bg.png') }})">
                            <div class="optech-service-contact-icon">
                                <img src="{{ asset('frontend/assets/img/service/icon.svg') }}" alt="Sidebar Service">
                            </div>
                            <h3> {{ getTranslatedValue($getSidebarCTAData,'heading', $currentLang) }}</h3>
                            <p>{{ getTranslatedValue($getSidebarCTAData,'description', $currentLang) }}</p>
                            <a class="optech-default-btn" href="{{ getTranslatedValue($getSidebarCTAData,'button_link', $currentLang) }}" data-text="{{ getTranslatedValue($getSidebarCTAData,'button_text', $currentLang) }}">
                                <span class="btn-wraper">{{ getTranslatedValue($getSidebarCTAData,'button_text', $currentLang) }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->


@endsection
