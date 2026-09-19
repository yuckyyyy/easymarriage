<section class="process" id="process" data-chapter="02">
    <div class="process__intro">
        <p class="chapter-kicker"><span>02</span> {{ __('site.process.kicker') }}</p>
        <h2 class="display">
            {{ __('site.process.title') }}
            <em>{{ __('site.process.title_em') }}</em>
        </h2>
        <p class="lede">{{ __('site.process.lede') }}</p>
    </div>

    <ul class="process__list">
        @foreach (__('site.process.items') as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <ol class="timeline" id="process-timeline">
        @foreach (__('site.process.steps') as $index => $step)
            <li>
                <span>{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                <h3>{{ $step['title'] }}</h3>
                <p>{{ $step['body'] }}</p>
            </li>
        @endforeach
    </ol>
</section>
