@extends('master_layout')

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

    <div class="section optech-section-padding">
        <div class="container">
            <div class="row">
                @foreach($testimonials as $testimonial)
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="400">
                    <div class="optech-t-box3">
                        <div class="optech-t-data3">
                            <div class="optech-t-rating3">
                                <ul>
                                    @for($i = 0; $i < $testimonial->rating; $i++)
                                        <li><img src="{{ asset('frontend/assets/img/v1/rating.svg') }}" alt="Rating Star"></li>
                                    @endfor
                                </ul>
                            </div>
                            <p>“ {{ \Illuminate\Support\Str::limit($testimonial->translate?->comment, 90) }} ”</p>
                            <div class="optech-t-footer">
                                <div class="optech-t-author">
                                    <h5>{{ $testimonial->translate?->name }}</h5>
                                    <span>{{ $testimonial->translate?->designation }}</span>
                                </div>
                                <div class="optech-t-quote3">
                                    <img src="{{ asset('frontend/assets/img/v1/quote.svg') }}" alt="Quote Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
