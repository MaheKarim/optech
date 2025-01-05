<div class="section optech-section-padding bg-light1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <div class="optech-default-content mr40">
                    <h2>{{ getTranslatedValue($contactInfoContent, 'heading', $currentLang) }}</h2>
                    <p>{{ getTranslatedValue($contactInfoContent, 'description', $currentLang) }}</p>
                    <div class="optech-contact-info-column">
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
                    {{ getTranslatedValue($contactInfoContent, 'office_hours', $currentLang) }}
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="600">
                <div class="optech-main-form bg-white ml60">
                    <h3>{{ getTranslatedValue($contactContent, 'heading', $currentLang) }}</h3>
                    <p>{{ getTranslatedValue($contactContent, 'description', $currentLang) }}</p>
                    @include('frontend.templates.layouts.contact_form')
                </div>
            </div>
        </div>
    </div>
</div>
