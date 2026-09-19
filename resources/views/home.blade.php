@extends('layouts.cinematic')

@section('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ProfessionalService',
    'name' => 'Easy Marriage Georgia',
    'url' => config('site.url'),
    'image' => asset('images/cinematic/hero/signing.jpg'),
    'description' => 'Marriage registration in Georgia for international couples. Often a single day at the House of Justice in Tbilisi — passports, apostille, and considered ceremony arrangements.',
    'areaServed' => 'Georgia',
    'serviceType' => 'Marriage registration assistance',
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('body')
    @include('partials.loader')
    @include('partials.chrome')

    <main id="main">
        @include('partials.hero')
        @include('partials.story')
        @include('partials.passport')
        @include('partials.process')
        @include('partials.georgia-journey')
        @include('partials.services')
        @include('partials.journey')
        @include('partials.documents')
        @include('partials.trust')
        @include('partials.reviews')
        @include('partials.gallery')
        @include('partials.faq')
        @include('partials.finale')
    </main>

    @include('partials.footer')
    @include('partials.consult')
@endsection
