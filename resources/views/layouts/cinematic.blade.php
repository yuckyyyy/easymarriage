<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#070605">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $page = \App\Support\Locale::currentPageName();
        $canonical = locale_route($page);
    @endphp

    <title>@yield('title', __('site.meta.title'))</title>
    <meta name="description" content="@yield('description', __('site.meta.description'))">
    <link rel="canonical" href="@yield('canonical', $canonical)">
    @foreach (config('locales.supported') as $code)
        <link rel="alternate" hreflang="{{ $code }}" href="{{ locale_route($page, [], $code) }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ locale_route($page, [], config('locales.default')) }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Easy Marriage Georgia">
    <meta property="og:locale" content="{{ config('locales.og.'.app()->getLocale(), 'uk_UA') }}">
    @foreach (config('locales.supported') as $code)
        @if ($code !== app()->getLocale())
            <meta property="og:locale:alternate" content="{{ config('locales.og.'.$code) }}">
        @endif
    @endforeach
    <meta property="og:title" content="@yield('og_title', __('site.meta.og_title'))">
    <meta property="og:description" content="@yield('description', __('site.meta.og_description'))">
    <meta property="og:url" content="@yield('canonical', $canonical)">
    <meta property="og:image" content="{{ asset('images/cinematic/hero/signing.jpg') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', __('site.meta.og_title'))">
    <meta name="twitter:description" content="@yield('description', __('site.meta.twitter_description'))">
    <meta name="twitter:image" content="{{ asset('images/cinematic/hero/signing.jpg') }}">

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@300;400;500&family=Outfit:wght@300;400;500&display=swap" rel="stylesheet">

    @if (! \App\Support\Locale::isLegal())
        <link rel="preload" as="image" href="{{ asset('images/cinematic/hero/signing.jpg') }}">
        <link rel="preload" as="image" href="{{ asset('images/cinematic/georgia/house-of-justice.jpg') }}">
    @endif

    @php
        $i18n = [
            'openMenu' => __('site.nav.open_menu'),
            'closeMenu' => __('site.nav.close_menu'),
            'formError' => __('site.form.error'),
            'homePath' => \App\Support\Locale::homePath(),
            'chapters' => [
                'promise' => __('site.chapters.promise'),
                'paperwork' => __('site.chapters.paperwork'),
                'georgia' => __('site.chapters.georgia'),
                'journey' => __('site.chapters.journey'),
                'signature' => __('site.chapters.signature'),
                'story' => __('site.chapters.story'),
                'begin' => __('site.chapters.begin'),
            ],
            'cursor' => [
                'home' => __('site.cursor.home'),
                'open' => __('site.cursor.open'),
                'view' => __('site.cursor.view'),
                'explore' => __('site.cursor.explore'),
            ],
        ];
    @endphp
    <script>
        window.__I18N = @json($i18n);
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @hasSection('schema')
        @yield('schema')
    @endif
</head>
<body class="{{ \App\Support\Locale::isLegal() ? 'page-legal' : 'page-home' }}">
    <a class="skip-link" href="#main">{{ __('site.meta.skip') }}</a>
    @yield('body')
</body>
</html>
