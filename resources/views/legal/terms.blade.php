@extends('layouts.cinematic')

@section('title', 'Terms — Easy Marriage Georgia')
@section('description', 'Terms of use for the Easy Marriage Georgia website.')
@section('canonical', url('/terms'))

@section('body')
@include('partials.chrome')
<main class="legal" id="main">
    <p class="chapter-kicker">Legal</p>
    <h1 class="display">Terms</h1>
    <p class="lede">This website provides information about marriage-registration support in Georgia. It is not legal advice and does not create a client relationship until we confirm an engagement with you in writing.</p>

    <h2>Accuracy</h2>
    <p>Requirements for marriage in Georgia can depend on nationality and individual circumstances. Information on this site is general. Your exact path is confirmed during consultation.</p>

    <h2>Enquiries</h2>
    <p>Submitting the consultation form is a request for contact, not a booking or a guarantee of eligibility, timing, or outcome.</p>

    <p><a class="text-link" href="{{ route('home') }}">Return home</a></p>
</main>
@include('partials.footer')
@include('partials.consult')
@endsection
