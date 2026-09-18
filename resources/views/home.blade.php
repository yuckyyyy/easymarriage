@extends('layouts.cinematic')

@section('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ProfessionalService',
    'name' => 'Easy Marriage Georgia',
    'url' => config('site.url'),
    'image' => asset('images/cinematic/hero/ring-scene.jpg'),
    'description' => 'Marriage in Georgia for international couples. Document guidance, registration support, and considered ceremony arrangements.',
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
        @include('partials.georgia')
        @include('partials.horizontal')
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
