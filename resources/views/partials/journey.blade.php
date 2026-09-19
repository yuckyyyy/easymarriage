@php($steps = __('site.journey.steps'))
<section class="couple-journey" id="couple-journey" data-chapter="03">
    <p class="chapter-kicker"><span>03</span> {{ __('site.journey.kicker') }}</p>
    <h2 class="display">{{ __('site.journey.title') }}<em> {{ __('site.journey.title_em') }}</em></h2>

    <div class="journey" id="journey-line">
        <div class="journey__line" aria-hidden="true">
            <span class="journey__grow"></span>
            <span class="journey__glow"></span>
        </div>
        <ol class="journey__steps">
            <li>
                <span>01</span>
                <h3>{{ $steps[0] }}</h3>
                <div class="journey__shot">
                    <img src="{{ asset('images/cinematic/gallery/rings.jpg') }}" alt="" width="800" height="800">
                </div>
            </li>
            <li>
                <span>02</span>
                <h3>{{ $steps[1] }}</h3>
                <div class="journey__shot">
                    <img src="{{ asset('images/cinematic/passport/desk.jpg') }}" alt="" width="1920" height="1080">
                </div>
            </li>
            <li>
                <span>03</span>
                <h3>{{ $steps[2] }}</h3>
                <div class="journey__shot">
                    <img src="{{ asset('images/cinematic/couples/arrival.jpg') }}" alt="" width="1920" height="1080">
                </div>
            </li>
            <li>
                <span>04</span>
                <h3>{{ $steps[3] }}</h3>
                <div class="journey__shot">
                    <img src="{{ asset('images/cinematic/hero/signing.jpg') }}" alt="" width="1920" height="1080">
                </div>
            </li>
            <li>
                <span>05</span>
                <h3>{{ $steps[4] }}</h3>
                <div class="journey__shot">
                    <img src="{{ asset('images/cinematic/passport/certificates.jpg') }}" alt="" width="1920" height="1080">
                </div>
            </li>
            <li>
                <span>06</span>
                <h3>{{ $steps[5] }}</h3>
                <div class="journey__shot">
                    <img src="{{ asset('images/cinematic/gallery/ceremony.jpg') }}" alt="" width="1920" height="1080">
                </div>
            </li>
        </ol>
    </div>
</section>
