<div class="container">
    <div class="optech-section-title center">
        <h2>{{ getTranslatedValue($getProcessData, 'heading', $currentLang) }} </h2>
    </div>
    <div class="row z-index">
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
            <div class="optech-numberbox-wrap">
                <div class="optech-numberbox-icon">
                    <img src="{{ asset(getImage($getProcessData, 'image_1')) }}" alt="">
                </div>
                <div class="optech-numberbox-data">
                    <span>{{ __('01') }}</span>
                    <h4>{{ getTranslatedValue($getProcessData, 'step_1', $currentLang) }}</h4>
                    <p>{{ getTranslatedValue($getProcessData, 'description_1', $currentLang) }}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
            <div class="optech-numberbox-wrap">
                <div class="optech-numberbox-icon">
                    <img src="{{ asset(getImage($getProcessData, 'image_2')) }}" alt="">
                </div>
                <div class="optech-numberbox-data">
                    <span>{{ __('02') }}</span>
                    <h4>{{ getTranslatedValue($getProcessData, 'step_2', $currentLang) }}</h4>
                    <p>{{ getTranslatedValue($getProcessData, 'description_2', $currentLang) }}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
            <div class="optech-numberbox-wrap">
                <div class="optech-numberbox-icon">
                    <img src="{{ asset(getImage($getProcessData, 'image_3')) }}" alt="">
                </div>
                <div class="optech-numberbox-data">
                    <span>{{ __('03') }}</span>
                    <h4>{{ getTranslatedValue($getProcessData, 'step_3', $currentLang) }}</h4>
                    <p>{{ getTranslatedValue($getProcessData, 'description_3', $currentLang) }}</p>
                </div>
            </div>
        </div>
        <div class="optech-line">
            <img src="{{ asset('frontend/assets/img/v2/line.png') }}" alt="">
        </div>
    </div>
</div>
