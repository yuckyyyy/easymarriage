@php($items = __('site.services.items'))
<section class="services" id="services" data-chapter="04" data-chapter-name="{{ __('site.chapters.signature') }}">
    <p class="chapter-kicker"><span>04</span> {{ __('site.services.kicker') }}</p>
    <h2 class="display">{{ __('site.services.title') }}<em> {{ __('site.services.title_em') }}</em></h2>

    <div class="services__rows">
        <article class="service-row" data-cursor="view" style="--img: url('{{ asset('images/cinematic/hero/signing.jpg') }}')">
            <span>01</span>
            <h3>{{ $items[0]['title'] }}</h3>
            <p>{{ $items[0]['body'] }}</p>
        </article>
        <article class="service-row" data-cursor="view" style="--img: url('{{ asset('images/cinematic/passport/certificates.jpg') }}')">
            <span>02</span>
            <h3>{{ $items[1]['title'] }}</h3>
            <p>{{ $items[1]['body'] }}</p>
        </article>
        <article class="service-row" data-cursor="view" style="--img: url('{{ asset('images/cinematic/gallery/ceremony.jpg') }}')">
            <span>03</span>
            <h3>{{ $items[2]['title'] }}</h3>
            <p>{{ $items[2]['body'] }}</p>
        </article>
        <article class="service-row" data-cursor="view" style="--img: url('{{ asset('images/cinematic/couples/mountains.jpg') }}')">
            <span>04</span>
            <h3>{{ $items[3]['title'] }}</h3>
            <p>{{ $items[3]['body'] }}</p>
        </article>
        <article class="service-row" data-cursor="view" style="--img: url('{{ asset('images/cinematic/georgia/kazbegi.jpg') }}')">
            <span>05</span>
            <h3>{{ $items[4]['title'] }}</h3>
            <p>{{ $items[4]['body'] }}</p>
        </article>
    </div>
</section>
