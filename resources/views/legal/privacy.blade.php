@extends('layouts.cinematic')

@section('title', __('site.legal.privacy.title').' — Easy Marriage Georgia')
@section('description', __('site.legal.privacy.meta'))
@section('canonical', locale_route('privacy'))

@section('body')
@include('partials.chrome')
<main class="legal" id="main">
    <p class="chapter-kicker">{{ __('site.legal.kicker') }}</p>
    <h1 class="display">{{ __('site.legal.privacy.title') }}</h1>
    <p class="lede">{{ __('site.legal.privacy.lede') }}</p>

    <h2>{{ __('site.legal.privacy.collect_title') }}</h2>
    <p>{{ __('site.legal.privacy.collect') }}</p>

    <h2>{{ __('site.legal.privacy.use_title') }}</h2>
    <p>{{ __('site.legal.privacy.use') }}</p>

    <h2>{{ __('site.legal.privacy.storage_title') }}</h2>
    <p>{{ __('site.legal.privacy.storage') }}</p>

    <h2>{{ __('site.legal.privacy.contact_title') }}</h2>
    <p>{{ __('site.legal.privacy.contact') }}</p>
    <p><a class="text-link" href="{{ locale_route('home') }}">{{ __('site.legal.home') }}</a></p>
</main>
@include('partials.footer')
@include('partials.consult')
@endsection
