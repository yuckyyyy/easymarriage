<header class="nav" id="site-nav">
    <a class="nav__logo" href="{{ route('home') }}" data-cursor="home">
        <span>Easy Marriage</span>
        <small>Georgia</small>
    </a>

    <nav class="nav__links" aria-label="Primary">
        <a href="{{ url('/') }}#about">About</a>
        <a href="{{ url('/') }}#services">Services</a>
        <a href="{{ url('/') }}#process">Process</a>
        <a href="{{ url('/') }}#documents">Documents</a>
        <a href="{{ url('/') }}#georgia">Why Georgia</a>
        <a href="{{ url('/') }}#reviews">Reviews</a>
        <a href="{{ url('/') }}#faq">FAQ</a>
    </nav>

    <div class="nav__end">
        <button class="nav__cta btn btn--pill" type="button" data-open-consult data-cursor="open">Get Started</button>
        <button class="nav__toggle" type="button" aria-label="Open menu" aria-controls="mobile-menu" aria-expanded="false">
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<div class="mobile-menu" id="mobile-menu" hidden>
    <div class="mobile-menu__inner">
        <p class="mobile-menu__kicker">Easy Marriage Georgia</p>
        <nav class="mobile-menu__nav" aria-label="Mobile">
            <a href="{{ url('/') }}#about" data-menu-link>About</a>
            <a href="{{ url('/') }}#services" data-menu-link>Services</a>
            <a href="{{ url('/') }}#process" data-menu-link>Process</a>
            <a href="{{ url('/') }}#documents" data-menu-link>Documents</a>
            <a href="{{ url('/') }}#georgia" data-menu-link>Why Georgia</a>
            <a href="{{ url('/') }}#reviews" data-menu-link>Reviews</a>
            <a href="{{ url('/') }}#faq" data-menu-link>FAQ</a>
        </nav>
        <button class="btn btn--pill" type="button" data-open-consult>Get Started</button>
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
