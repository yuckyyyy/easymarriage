@extends('layouts.cinematic')

@section('title', __('site.legal.cookies.title').' — Easy Marriage Georgia')
@section('description', __('site.legal.cookies.meta'))
@section('canonical', locale_route('cookies'))

@section('body')
@include('partials.chrome')
<main class="legal" id="main">
    <p class="chapter-kicker">{{ __('site.legal.kicker') }}</p>
    <h1 class="display">{{ __('site.legal.cookies.title') }}</h1>
    <p class="lede">{{ __('site.legal.cookies.lede') }}</p>
    <p>{{ __('site.legal.cookies.later') }}</p>
    <p><a class="text-link" href="{{ locale_route('home') }}">{{ __('site.legal.home') }}</a></p>
</main>
@include('partials.footer')
@include('partials.consult')
@endsection
