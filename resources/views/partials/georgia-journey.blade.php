@php($film = __('site.georgia.chapters'))
<section class="film-run" id="georgia-journey">
    <div class="film-run__pin" id="film-run-pin">
        <div class="georgia" id="georgia" data-chapter="05" data-chapter-name="{{ __('site.chapters.georgia') }}">
            <div class="georgia__visual">
                <div class="georgia__img georgia__img--back">
                    <img src="{{ asset('images/cinematic/georgia/kazbegi.jpg') }}" alt="{{ __('site.georgia.alt_kazbegi') }}" width="1920" height="1080">
                </div>
                <div class="georgia__img georgia__img--mid">
                    <img src="{{ asset('images/cinematic/georgia/tbilisi.jpg') }}" alt="{{ __('site.georgia.alt_tbilisi') }}" width="1920" height="1080">
                </div>
                <div class="georgia__img georgia__img--fore">
                    <img src="{{ asset('images/cinematic/georgia/house-of-justice.jpg') }}" alt="{{ __('site.georgia.alt_house') }}" width="1920" height="1080">
                </div>
            </div>

            <div class="georgia__copy">
                <p class="chapter-kicker"><span>05</span> {{ __('site.georgia.kicker') }}</p>
                <h2 class="display">
                    {{ __('site.georgia.title') }}
                    <em>{{ __('site.georgia.title_em') }}</em>
                </h2>
                <p class="lede">{{ __('site.georgia.lede') }}</p>
            </div>

            <ul class="georgia__facts">
                @foreach (__('site.georgia.facts') as $fact)
                    <li>{{ $fact }}</li>
                @endforeach
            </ul>
        </div>

        <div class="horizontal" id="journey-film" data-chapter="03" data-chapter-name="{{ __('site.chapters.journey') }}">
            <div class="horizontal__track">
                <article class="horizontal__chapter">
                    <p class="horizontal__label">{{ $film[0]['label'] }}</p>
                    <h2 class="display">{{ $film[0]['title'] }}</h2>
                    <p>{{ $film[0]['body'] }}</p>
                    <div class="horizontal__frame">
                        <img src="{{ asset('images/cinematic/couples/arrival.jpg') }}" alt="{{ $film[0]['alt'] }}" width="1920" height="1080">
                    </div>
                </article>
                <article class="horizontal__chapter">
                    <p class="horizontal__label">{{ $film[1]['label'] }}</p>
                    <h2 class="display">{{ $film[1]['title'] }}</h2>
                    <p>{{ $film[1]['body'] }}</p>
                    <div class="horizontal__frame">
                        <img src="{{ asset('images/cinematic/georgia/house-of-justice.jpg') }}" alt="{{ $film[1]['alt'] }}" width="1920" height="1080">
                    </div>
                </article>
                <article class="horizontal__chapter">
                    <p class="horizontal__label">{{ $film[2]['label'] }}</p>
                    <h2 class="display">{{ $film[2]['title'] }}</h2>
                    <p>{{ $film[2]['body'] }}</p>
                    <div class="horizontal__frame">
                        <img src="{{ asset('images/cinematic/hero/signing.jpg') }}" alt="{{ $film[2]['alt'] }}" width="1920" height="1080">
                    </div>
                </article>
                <article class="horizontal__chapter">
                    <p class="horizontal__label">{{ $film[3]['label'] }}</p>
                    <h2 class="display">{{ $film[3]['title'] }}</h2>
                    <p>{{ $film[3]['body'] }}</p>
                    <div class="horizontal__frame">
                        <img src="{{ asset('images/cinematic/couples/mountains.jpg') }}" alt="{{ $film[3]['alt'] }}" width="1200" height="1600">
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
