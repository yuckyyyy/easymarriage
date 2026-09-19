<?php

namespace App\Support;

use Illuminate\Support\Facades\Route;

class Locale
{
    public static function current(): string
    {
        return app()->getLocale();
    }

    public static function default(): string
    {
        return (string) config('locales.default', 'uk');
    }

    /**
     * @return list<string>
     */
    public static function supported(): array
    {
        return config('locales.supported', ['uk', 'en', 'ru']);
    }

    /**
     * @return array<string, string>
     */
    public static function labels(): array
    {
        return config('locales.labels', [
            'uk' => 'UA',
            'en' => 'EN',
            'ru' => 'RU',
        ]);
    }

    public static function isSupported(?string $locale): bool
    {
        return is_string($locale) && in_array($locale, self::supported(), true);
    }

    public static function isDefault(?string $locale = null): bool
    {
        return ($locale ?? self::current()) === self::default();
    }

    public static function route(string $name, array $parameters = [], ?string $locale = null, bool $absolute = true): string
    {
        $locale ??= self::current();

        if (self::isDefault($locale)) {
            return route($name, $parameters, $absolute);
        }

        return route('locale.'.$name, ['locale' => $locale] + $parameters, $absolute);
    }

    public static function currentPageName(): string
    {
        $route = Route::currentRouteName() ?? 'home';
        $name = str_starts_with((string) $route, 'locale.') ? substr($route, 7) : $route;

        return in_array($name, ['home', 'privacy', 'terms', 'cookies'], true) ? $name : 'home';
    }

    public static function switchTo(string $locale): string
    {
        return self::route(self::currentPageName(), [], $locale);
    }

    public static function homePath(?string $locale = null): string
    {
        $locale ??= self::current();

        return self::isDefault($locale) ? '/' : '/'.$locale;
    }

    public static function isLegal(): bool
    {
        return request()->routeIs(
            'privacy',
            'terms',
            'cookies',
            'locale.privacy',
            'locale.terms',
            'locale.cookies',
        );
    }
}
