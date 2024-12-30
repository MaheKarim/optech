@extends('frontend.templates.main_demo_layout')

@section('title')
    <title>{{ __($project->translate->seo_title) }} || {{ __($project->translate->title) }}</title>
    <meta name="title" content="{{ __($project->translate->seo_title) }}">
    <meta name="description" content="{{ __($project->translate->seo_description) }}">
@endsection

@section('content')
    @php
        $currentLang = session()->get('front_lang');
        $getSidebarCTAData = getContent('main_demo_sidebar_cta_section.content', true);
    @endphp
    <div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png')}})">
        <div class="container">
            <h1 class="post__title">{{ __($project->translate->title) }}</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('services') }}">{{ __('Portfolio') }}</a></li>
                    <li aria-current="page"> {{ __($project->translate->title) }}</li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="section optech-section-padding">
        <div class="container">
            <div class="optech-pd-thumb" data-aos="fade-up" data-aos-duration="800">
                <img src="{{ asset($project->thumb_image) }}" alt="Dardnak Image">
            </div>
            <div class="optech-pd-wrap">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="optech-pd-content-wrap">
                            <div class="optech-pd-content-item">
                                <p>@php echo $project->translate->description @endphp</p>
                            </div>

                            <div class="optech-pd-content-item">
                                <div class="row">
                                    @foreach($project->gallery as $gallery)
                                    <div class="col-md-6" data-aos="fade-up" data-aos-duration="600">
                                        <img src="{{ asset($gallery->image) }}" alt="Gallery Image">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="optech-pd-sidebar-wrap">
                            <div class="optech-pd-sidebar">
                                <h5>{{ __('Project Details') }}</h5>
                                <div class="optech-pd-sidebar-item">
                                    <span>{{ __('Client:') }}</span>
                                    <p>{{ __($project->translate?->client_name) }}</p>
                                </div>
                                <div class="optech-pd-sidebar-item">
                                    <span>{{ __('Category:') }}</span>
                                    <p>{{ $project->category?->translate->name }}</p>
                                </div>
                                <div class="optech-pd-sidebar-item">
                                    <span>{{ __('Date:') }}</span>
                                    <p>{{ $project->project_date }}</p>
                                </div>
                                <div class="optech-pd-sidebar-item">
                                    <span>{{ __('Website:') }}</span>
                                    <a href="{{ $project->website_url }}" target="_blank">{{ $project->website_url }}</a>
                                </div>
                                <div class="optech-social-icon-box">
                                    <ul>
                                        @if($project->project_fb)
                                            <li>
                                                <a href="{{ $project->project_fb }}">
                                                    <i class="ri-facebook-fill"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($project->project_linkedin)
                                            <li>
                                                <a href="{{ $project->project_linkedin }}">
                                                    <i class="ri-linkedin-fill"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($project->project_x)
                                            <li>
                                                <a href="{{ $project->project_x }}">
                                                    <i class="ri-twitter-fill"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($project->project_instagram)
                                            <li>
                                                <a href="{{ $project->project_instagram }}">
                                                    <i class="ri-instagram-fill"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>

                            </div>
                            <div class="optech-service-contact" data-aos="fade-up" data-aos-duration="800"
                                 style="background-image: url({{asset('frontend/assets/img/service/bg.png')}})">

                                <div class="optech-service-contact-icon">
                                    <img src="{{ asset('frontend/assets/img/service/icon.svg') }}" alt="Image">
                                </div>
                                <h3>{{ getTranslatedValue($getSidebarCTAData, 'heading', $currentLang) }}</h3>
                                <p>{{ getTranslatedValue($getSidebarCTAData,'description', $currentLang) }}</p>
                                <a class="optech-default-btn" href="{{ route('contact-us') }}" data-text="{{ getTranslatedValue($getSidebarCTAData,'button_text', $currentLang) }}"><span
                                        class="btn-wraper">{{ getTranslatedValue($getSidebarCTAData,'button_text', $currentLang) }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="optech-post-navigation2">
                @if($previousProject)
                    <a href="{{ route('portfolio.show', $previousProject->slug) }}" class="p-nav-previous">
                        <div class="optech-post-icon">
                            <i class="ri-arrow-left-s-line"></i>
                        </div>
                        <div class="optech-post-data">
                            <p>{{ __('Prev Project') }}</p>
                            <h5>{{ __($previousProject->translate->title) }}</h5>
                        </div>
                    </a>
                @endif

                @if($nextProject)
                    <a href="{{ route('portfolio.show', $nextProject->slug) }}" class="p-nav-next">
                        <div class="optech-post-data">
                            <p>{{ __('Next Project') }}</p>
                            <h5>{{ __($nextProject->translate->title) }}</h5>
                        </div>
                        <div class="optech-post-icon">
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>
    <!-- End section -->
@endsection
