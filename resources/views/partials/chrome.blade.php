<header class="nav" id="site-nav">
    <a class="nav__logo" href="{{ locale_route('home') }}" data-cursor="home">
        <span>{{ __('site.brand.name') }}</span>
        <small>{{ __('site.brand.place') }}</small>
    </a>

    <nav class="nav__links" aria-label="{{ __('site.nav.primary') }}">
        @include('partials.nav-links')
    </nav>

    <div class="nav__end">
        @include('partials.lang-switcher')
        <button class="nav__cta btn btn--pill" type="button" data-open-consult data-cursor="open">{{ __('site.nav.cta') }}</button>
        <button class="nav__toggle" type="button" aria-label="{{ __('site.nav.open_menu') }}" aria-controls="mobile-menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<div class="mobile-menu" id="mobile-menu" hidden>
    <div class="mobile-menu__inner">
        <p class="mobile-menu__kicker">{{ __('site.brand.full') }}</p>
        @include('partials.lang-switcher', ['full' => true])
        <nav class="mobile-menu__nav" aria-label="{{ __('site.nav.mobile') }}">
            @include('partials.nav-links', ['menu' => true])
        </nav>
        <button class="btn btn--pill" type="button" data-open-consult>{{ __('site.nav.cta') }}</button>
        <button class="mobile-menu__close" type="button" data-close-menu>{{ __('site.nav.close_menu') }}</button>
    </div>
</div>

<div class="progress" aria-hidden="true">
    <div class="progress__bar" id="progress-bar"></div>
    <p class="progress__chapter" id="chapter-indicator"><span>01</span> / 07</p>
</div>

<div class="cursor" id="cursor" hidden>
    <span class="cursor__dot"></span>
    <span class="cursor__ring"></span>
    <span class="cursor__label"></span>
</div>

<div class="grain" aria-hidden="true"></div>
<div class="vignette" aria-hidden="true"></div>
