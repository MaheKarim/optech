
@extends('frontend.templates.main_demo_layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection
@php
    $currentLang = session()->get('front_lang');
    $getProcessData = getContent('main_demo_process_section.content', true);
@endphp
@section('content')
    <div class="optech-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumb/breadcrumb.png') }})">
        <div class="container">
            <h1 class="post__title">Our Services</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li aria-current="page"> Our Services</li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section optech-section-padding5">
        @include('frontend.templates.layouts.process_section')
    </div>

    <!-- End section -->
    <div class="section optech-section-padding2 bg-light1">
        <div class="container">
            <div class="optech-section-title center">
                <h2>Our awesome services to give you success</h2>
            </div>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="optech-iconbox-wrap style-two">
                        <div class="optech-iconbox-icon">
                            <img src="assets/images/iconbox/icon4.svg" alt="">
                        </div>
                        <div class="optech-iconbox-data">
                            <h5>Data Tracking Security</h5>
                            <p>Each demo built with Teba will look different. You can customize almost anything the appearance</p>
                            <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                                <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="800">
                    <div class="optech-iconbox-wrap style-two">
                        <div class="optech-iconbox-icon">
                            <img src="assets/images/iconbox/icon5.svg" alt="">
                        </div>
                        <div class="optech-iconbox-data">
                            <h5>IT Management Service</h5>
                            <p>Each demo built with Teba will look different. You can customize almost anything the appearance</p>
                            <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                                <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="optech-iconbox-wrap style-two">
                        <div class="optech-iconbox-icon">
                            <img src="assets/images/iconbox/icon7.svg" alt="">
                        </div>
                        <div class="optech-iconbox-data">
                            <h5>Web & Mobile App Development</h5>
                            <p>Each demo built with Teba will look different. You can customize almost anything the appearance</p>
                            <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                                <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="800">
                    <div class="optech-iconbox-wrap style-two">
                        <div class="optech-iconbox-icon">
                            <img src="assets/images/iconbox/icon6.svg" alt="">
                        </div>
                        <div class="optech-iconbox-data">
                            <h5>UI/UX & Branding Identity</h5>
                            <p>Each demo built with Teba will look different. You can customize almost anything the appearance</p>
                            <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                                <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="optech-iconbox-wrap style-two">
                        <div class="optech-iconbox-icon">
                            <img src="assets/images/iconbox/icon8.svg" alt="">
                        </div>
                        <div class="optech-iconbox-data">
                            <h5>Digital Marketing Services</h5>
                            <p>Each demo built with Teba will look different. You can customize almost anything the appearance</p>
                            <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                                <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="800">
                    <div class="optech-iconbox-wrap style-two">
                        <div class="optech-iconbox-icon">
                            <img src="assets/images/iconbox/icon9.svg" alt="">
                        </div>
                        <div class="optech-iconbox-data">
                            <h5>Cyber Security Solutions</h5>
                            <p>Each demo built with Teba will look different. You can customize almost anything the appearance</p>
                            <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                                <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->
@endsection

@push('js_section')
<script>
    "use strict";
    $(function() {
        $("#category_id, #sort_by, #price_filter, #is_featured").on("change", function(){

            $("#searchFormId").submit();
        })
    });

    </script>
@endpush
