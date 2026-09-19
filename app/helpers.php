<?php

use App\Support\Locale;

if (! function_exists('locale_route')) {
    function locale_route(string $name, array $parameters = [], ?string $locale = null, bool $absolute = true): string
    {
        return Locale::route($name, $parameters, $locale, $absolute);
    }
}
