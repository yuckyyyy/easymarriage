<section class="faq" id="faq">
    <p class="chapter-kicker">{{ __('site.faq.kicker') }}</p>
    <h2 class="display">{{ __('site.faq.title') }}</h2>

    <div class="faq__list">
        @foreach (__('site.faq.items') as $item)
            <article class="faq__item">
                <button type="button" aria-expanded="false">
                    {{ $item['q'] }}
                    <span aria-hidden="true"></span>
                </button>
                <div class="faq__body">
                    <p>{{ $item['a'] }}</p>
                </div>
            </article>
        @endforeach
    </div>
</section>
