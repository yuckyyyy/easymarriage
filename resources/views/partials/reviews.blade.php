@php
    $reviews = __('site.reviews.items');
    $images = [
        asset('images/cinematic/couples/mountains.jpg'),
        asset('images/cinematic/couples/arrival.jpg'),
        asset('images/cinematic/gallery/ceremony.jpg'),
        asset('images/cinematic/gallery/rings.jpg'),
    ];
@endphp
<section class="reviews" id="reviews" data-chapter="06" data-chapter-name="{{ __('site.chapters.story') }}">
    <p class="chapter-kicker"><span>06</span> {{ __('site.reviews.kicker') }}</p>
    <h2 class="display">{{ __('site.reviews.title') }}<em> {{ __('site.reviews.title_em') }}</em></h2>

    <div class="reviews__stage">
        <div class="reviews__image">
            <img id="review-image" src="{{ $images[0] }}" alt="{{ $reviews[0]['alt'] }}" width="1200" height="1600">
        </div>
        <figure class="reviews__quote">
            <blockquote id="review-quote">{{ $reviews[0]['quote'] }}</blockquote>
            <figcaption id="review-name">{{ $reviews[0]['name'] }}</figcaption>
        </figure>
    </div>

    <div class="reviews__thumbs" role="tablist" aria-label="{{ __('site.reviews.aria') }}">
        @foreach ($reviews as $index => $review)
            <button
                type="button"
                role="tab"
                aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                data-cursor="explore"
                data-review="{{ json_encode([
                    'quote' => $review['quote'],
                    'name' => $review['name'],
                    'image' => $images[$index],
                    'alt' => $review['alt'],
                ], JSON_UNESCAPED_UNICODE | JSON_HEX_APOS | JSON_HEX_QUOT) }}"
            >
                <img src="{{ $images[$index] }}" alt="{{ $review['thumb_alt'] }}">
            </button>
        @endforeach
    </div>
    <p class="reviews__aside">{{ __('site.reviews.aside') }}</p>
</section>
