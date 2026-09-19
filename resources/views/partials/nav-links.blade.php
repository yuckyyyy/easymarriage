@php($home = locale_route('home'))
<a href="{{ $home }}#about" @isset($menu) data-menu-link @endisset>{{ __('site.nav.about') }}</a>
<a href="{{ $home }}#services" @isset($menu) data-menu-link @endisset>{{ __('site.nav.services') }}</a>
<a href="{{ $home }}#process" @isset($menu) data-menu-link @endisset>{{ __('site.nav.process') }}</a>
<a href="{{ $home }}#documents" @isset($menu) data-menu-link @endisset>{{ __('site.nav.documents') }}</a>
<a href="{{ $home }}#georgia" @isset($menu) data-menu-link @endisset>{{ __('site.nav.georgia') }}</a>
<a href="{{ $home }}#reviews" @isset($menu) data-menu-link @endisset>{{ __('site.nav.reviews') }}</a>
<a href="{{ $home }}#faq" @isset($menu) data-menu-link @endisset>{{ __('site.nav.faq') }}</a>
