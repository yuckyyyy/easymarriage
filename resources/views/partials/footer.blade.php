<footer class="footer">
    <div class="footer__top">
        <a class="nav__logo" href="{{ route('home') }}">
            <span>Easy Marriage</span>
            <small>Georgia</small>
        </a>
        <nav class="footer__nav" aria-label="Footer">
            <a href="{{ url('/') }}#about">About</a>
            <a href="{{ url('/') }}#services">Services</a>
            <a href="{{ url('/') }}#process">Process</a>
            <a href="{{ url('/') }}#documents">Documents</a>
            <a href="{{ url('/') }}#georgia">Why Georgia</a>
            <a href="{{ url('/') }}#reviews">Reviews</a>
            <a href="{{ url('/') }}#faq">FAQ</a>
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
                    <a href="{{ config('site.social.instagram') }}" rel="noopener noreferrer" target="_blank" aria-label="Instagram">Instagram</a>
                @endif
                @if (config('site.social.telegram'))
                    <a href="{{ config('site.social.telegram') }}" rel="noopener noreferrer" target="_blank" aria-label="Telegram">Telegram</a>
                @endif
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <p>© {{ date('Y') }} Easy Marriage Georgia</p>
        <nav aria-label="Legal">
            <a href="{{ route('privacy') }}">Privacy Policy</a>
            <a href="{{ route('terms') }}">Terms</a>
            <a href="{{ route('cookies') }}">Cookie Policy</a>
        </nav>
        <p class="footer__phrase">Love has no borders.</p>
    </div>
</footer>

<button class="sound-toggle" type="button" id="sound-toggle" aria-pressed="false" hidden>
    Sound off
</button>
