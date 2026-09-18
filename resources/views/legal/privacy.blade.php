@extends('layouts.cinematic')

@section('title', 'Privacy Policy — Easy Marriage Georgia')
@section('description', 'How Easy Marriage Georgia handles personal information submitted through this website.')
@section('canonical', url('/privacy'))

@section('body')
@include('partials.chrome')
<main class="legal" id="main">
    <p class="chapter-kicker">Legal</p>
    <h1 class="display">Privacy Policy</h1>
    <p class="lede">This policy describes how Easy Marriage Georgia collects and uses information when you contact us through this website.</p>

    <h2>What we collect</h2>
    <p>When you send a consultation request, we collect the details you provide: names, email, phone, nationality, preferred date, guest numbers, the service you are considering, and your message.</p>

    <h2>How we use it</h2>
    <p>We use this information only to respond to your enquiry and, if you continue, to prepare guidance relevant to your marriage in Georgia. We do not sell personal data.</p>

    <h2>Storage</h2>
    <p>Requests are stored so that we can follow up with you. If email delivery is configured, a copy may also be sent to our team inbox.</p>

    <h2>Contact</h2>
    <p>For privacy questions, write to us using the consultation form or, if published, the contact email on this site.</p>
    <p><a class="text-link" href="{{ route('home') }}">Return home</a></p>
</main>
@include('partials.footer')
@include('partials.consult')
@endsection
