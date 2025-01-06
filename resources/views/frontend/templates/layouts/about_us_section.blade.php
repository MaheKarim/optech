@php
    $aboutUsSection = getContent('startup_home_about_us.content', true);
@endphp

<div class="section large-padding-tb7 overflow-hidden bg-light1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="optech-thumb extra-mr">
                    <img data-aos="fade-up" data-aos-duration="600" src="{{ asset(getImage($aboutUsSection, 'image_1')) }}" alt="Image">
                    <div class="optech-thumb-position" data-aos="fade-up" data-aos-duration="800">
                        <img src="{{ asset(getImage($aboutUsSection, 'image_2')) }}" alt="Image">
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
                    <h2>{{ getTranslatedValue($aboutUsSection, 'heading', $currentLang) }}</h2>
                    <h5>{{ getTranslatedValue($aboutUsSection, 'sub_heading', $currentLang) }}</h5>
                    <p>{{ getTranslatedValue($aboutUsSection, 'description', $currentLang) }}</p>
                    <div class="optech-extra-mt">
                        <div class="optech-iconbox-column">
                            <div class="optech-iconbox-wrap3">
                                <div class="optech-iconbox-icon3">
                                    <img src="{{ asset('frontend/assets/img/iconbox/icon11.svg') }}" alt="Blade">
                                </div>
                                <div class="optech-iconbox-data3">
                                    <p>{{ getTranslatedValue($aboutUsSection, 'left_text', $currentLang) }}</p>
                                </div>
                            </div>
                            <div class="optech-iconbox-wrap3">
                                <div class="optech-iconbox-icon3">
                                    <img src="{{ asset('frontend/assets/img/iconbox/icon12.svg') }}" alt="Image">
                                </div>
                                <div class="optech-iconbox-data3">
                                    <p>{{ getTranslatedValue($aboutUsSection, 'right_text', $currentLang) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
