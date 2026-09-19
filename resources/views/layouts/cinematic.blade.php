<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#070605">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Easy Marriage Georgia — Marriage in Georgia for International Couples')</title>
    <meta name="description" content="@yield('description', 'Marriage registration in Georgia for international couples. Often a single day at the House of Justice in Tbilisi.')">
    <link rel="canonical" href="@yield('canonical', config('site.url'))">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Easy Marriage Georgia">
    <meta property="og:title" content="@yield('og_title', 'Easy Marriage Georgia')">
    <meta property="og:description" content="@yield('description', 'Marriage in Georgia for international couples — quietly handled, beautifully considered.')">
    <meta property="og:url" content="@yield('canonical', config('site.url'))">
    <meta property="og:image" content="{{ asset('images/cinematic/hero/signing.jpg') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Easy Marriage Georgia')">
    <meta name="twitter:description" content="@yield('description', 'Marriage in Georgia for international couples.')">
    <meta name="twitter:image" content="{{ asset('images/cinematic/hero/signing.jpg') }}">

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&family=IBM+Plex+Mono:wght@400;500&family=Outfit:wght@300;400;500&display=swap" rel="stylesheet">

    @if (! request()->routeIs('privacy', 'terms', 'cookies'))
        <link rel="preload" as="image" href="{{ asset('images/cinematic/hero/signing.jpg') }}">
        <link rel="preload" as="image" href="{{ asset('images/cinematic/georgia/house-of-justice.jpg') }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @hasSection('schema')
        @yield('schema')
    @endif
</head>
<body class="{{ request()->routeIs('privacy', 'terms', 'cookies') ? 'page-legal' : 'page-home' }}">
    <a class="skip-link" href="#main">Skip to content</a>
    @yield('body')
</body>
</html>
