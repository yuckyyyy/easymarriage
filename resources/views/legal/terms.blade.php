@extends('layouts.cinematic')

@section('title', __('site.legal.terms.title').' — Easy Marriage Georgia')
@section('description', __('site.legal.terms.meta'))
@section('canonical', locale_route('terms'))

@section('body')
@include('partials.chrome')
<main class="legal" id="main">
    <p class="chapter-kicker">{{ __('site.legal.kicker') }}</p>
    <h1 class="display">{{ __('site.legal.terms.title') }}</h1>
    <p class="lede">{{ __('site.legal.terms.lede') }}</p>

    <h2>{{ __('site.legal.terms.accuracy_title') }}</h2>
    <p>{{ __('site.legal.terms.accuracy') }}</p>

    <h2>{{ __('site.legal.terms.enquiries_title') }}</h2>
    <p>{{ __('site.legal.terms.enquiries') }}</p>

    <p><a class="text-link" href="{{ locale_route('home') }}">{{ __('site.legal.home') }}</a></p>
</main>
@include('partials.footer')
@include('partials.consult')
@endsection
