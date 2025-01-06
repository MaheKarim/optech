<div class="section optech-section-padding dark-bg">
    <div class="container">
        <div class="optech-1column-slider">
            @foreach($testimonials as $testimonial)
                <div class="optech-t-box2">
                    <div class="optech-t-quote2">
                        <img src="{{ asset('frontend/assets/img/v1/quote.svg') }}" alt="">
                    </div>
                    <div class="optech-t-data2">
                        <p>“ {{ \Illuminate\Support\Str::limit($testimonial->translate?->comment, 250) }} ”</p>
                        <div class="optech-t-rating2">
                            <ul>
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <li><img src="{{ asset('frontend/assets/img/v1/rating.svg') }}" alt="Rating Star"></li>
                                @endfor
                            </ul>
                        </div>
                        <h5>{{ $testimonial->translate?->name }}</h5>
                        <span>{{ $testimonial->translate?->designation }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
