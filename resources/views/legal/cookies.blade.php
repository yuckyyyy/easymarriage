@extends('layouts.cinematic')

@section('title', 'Cookie Policy — Easy Marriage Georgia')
@section('description', 'How Easy Marriage Georgia uses cookies on this website.')
@section('canonical', url('/cookies'))

@section('body')
@include('partials.chrome')
<main class="legal" id="main">
    <p class="chapter-kicker">Legal</p>
    <h1 class="display">Cookie Policy</h1>
    <p class="lede">This site uses essential cookies required for security (including form protection). We do not use advertising trackers.</p>
    <p>If analytics are added later, this page will be updated to describe them.</p>
    <p><a class="text-link" href="{{ route('home') }}">Return home</a></p>
</main>
@include('partials.footer')
@include('partials.consult')
@endsection
