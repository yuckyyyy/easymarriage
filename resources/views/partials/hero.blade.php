<section class="hero" id="hero" data-chapter="01" data-chapter-name="{{ __('site.chapters.promise') }}">
    <div class="hero__bars" aria-hidden="true">
        <span class="hero__bar hero__bar--top"></span>
        <span class="hero__bar hero__bar--bot"></span>
    </div>

    <div class="hero__stage" id="ring-stage">
        <img
            class="hero__plate hero__plate--a"
            src="{{ asset('images/cinematic/hero/signing.jpg') }}"
            alt="{{ __('site.hero.alt_signing') }}"
            width="1920"
            height="1080"
            fetchpriority="high"
        >
        <img
            class="hero__plate hero__plate--b"
            src="{{ asset('images/cinematic/georgia/house-of-justice.jpg') }}"
            alt="{{ __('site.hero.alt_house') }}"
            width="1920"
            height="1080"
        >
        <div class="hero__grade"></div>
        <div class="hero__light"></div>
        <div class="hero__vignette"></div>
    </div>

    <div class="hero__copy">
        <p class="hero__place">{{ __('site.hero.place') }}</p>
        <h1 class="hero__title">
            <span class="split-line">{{ __('site.hero.title_1') }}</span>
            <span class="split-line">{{ __('site.hero.title_2') }}</span>
            <em class="hero__italic">{{ __('site.hero.title_3') }}</em>
        </h1>
        <p class="hero__lede">{{ __('site.hero.lede') }}</p>
        <ul class="hero__facts">
            <li>
                <strong>{{ __('site.hero.fact_day') }}</strong>
                <span>{{ __('site.hero.fact_day_label') }}</span>
            </li>
            <li>
                <strong>{{ __('site.hero.fact_passports') }}</strong>
                <span>{{ __('site.hero.fact_passports_label') }}</span>
            </li>
            <li>
                <strong>{{ __('site.hero.fact_countries') }}</strong>
                <span>{{ __('site.hero.fact_countries_label') }}</span>
            </li>
        </ul>
        <button class="btn btn--ghost" type="button" data-open-consult data-cursor="open">
            {{ __('site.hero.begin') }}
            <span class="btn__arrow" aria-hidden="true">→</span>
        </button>
    </div>

    <p class="hero__scroll">
        <span class="hero__scroll-icon" aria-hidden="true"></span>
        {{ __('site.hero.scroll') }}
    </p>
</section>
