@php($full = ! empty($full))
<nav class="lang{{ $full ? ' lang--full' : '' }}" aria-label="{{ __('site.nav.language') }}">
    @foreach (config('locales.supported') as $code)
        <a
            href="{{ locale_route(\App\Support\Locale::currentPageName(), [], $code) }}"
            hreflang="{{ $code }}"
            lang="{{ $code }}"
            @if (app()->getLocale() === $code) aria-current="true" @endif
        >{{ $full ? config('locales.names.'.$code) : config('locales.labels.'.$code) }}</a>
    @endforeach
</nav>
