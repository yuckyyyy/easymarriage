<section class="trust" id="trust">
    <h2 class="display">{{ __('site.trust.title') }}</h2>
    <ul class="trust__pillars">
        @foreach (__('site.trust.pillars') as $pillar)
            <li>
                <span class="trust__mark" aria-hidden="true"></span>
                <h3>{{ $pillar['title'] }}</h3>
                <p>{{ $pillar['body'] }}</p>
            </li>
        @endforeach
    </ul>
</section>
