<footer class="footer">
    <div class="footer__top">
        <a class="nav__logo" href="{{ locale_route('home') }}">
            <span>{{ __('site.brand.name') }}</span>
            <small>{{ __('site.brand.place') }}</small>
        </a>
        <nav class="footer__nav" aria-label="{{ __('site.nav.footer') }}">
            @include('partials.nav-links')
        </nav>
        <div class="footer__contact">
            @if (config('site.email'))
                <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>
            @endif
            @if (config('site.phone'))
                <a href="tel:{{ config('site.phone') }}">{{ config('site.phone') }}</a>
            @endif
            <div class="footer__social">
                @if (config('site.social.instagram'))
                    <a href="{{ config('site.social.instagram') }}" rel="noopener noreferrer" target="_blank" aria-label="{{ __('site.footer.instagram') }}">{{ __('site.footer.instagram') }}</a>
                @endif
                @if (config('site.social.telegram'))
                    <a href="{{ config('site.social.telegram') }}" rel="noopener noreferrer" target="_blank" aria-label="{{ __('site.footer.telegram') }}">{{ __('site.footer.telegram') }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <p>{{ __('site.footer.copy', ['year' => date('Y')]) }}</p>
        <nav aria-label="{{ __('site.nav.legal') }}">
            <a href="{{ locale_route('privacy') }}">{{ __('site.footer.privacy') }}</a>
            <a href="{{ locale_route('terms') }}">{{ __('site.footer.terms') }}</a>
            <a href="{{ locale_route('cookies') }}">{{ __('site.footer.cookies') }}</a>
        </nav>
        <p class="footer__phrase">{{ __('site.footer.phrase') }}</p>
    </div>
</footer>

<button class="sound-toggle" type="button" id="sound-toggle" aria-pressed="false" hidden>
    {{ __('site.footer.sound_off') }}
</button>
