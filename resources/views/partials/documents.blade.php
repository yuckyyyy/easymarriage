<section class="documents" id="documents" data-chapter="04">
    <p class="chapter-kicker"><span>04</span> {{ __('site.documents.kicker') }}</p>
    <h2 class="display">{{ __('site.documents.title') }}</h2>
    <p class="lede">{{ __('site.documents.lede') }}</p>

    <ul class="documents__cats">
        @foreach (__('site.documents.cats') as $cat)
            <li>
                <h3>{{ $cat['title'] }}</h3>
                <p>{{ $cat['body'] }}</p>
            </li>
        @endforeach
    </ul>

    <p class="documents__note">{{ __('site.documents.note') }}</p>
    <button class="btn btn--pill" type="button" data-open-consult data-cursor="open">{{ __('site.documents.cta') }}</button>
</section>
