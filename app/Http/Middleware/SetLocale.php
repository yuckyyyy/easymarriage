<?php

namespace App\Http\Middleware;

use App\Support\Locale;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if (! Locale::isSupported(is_string($locale) ? $locale : null)) {
            $posted = $request->input('locale');
            $locale = Locale::isSupported(is_string($posted) ? $posted : null)
                ? $posted
                : Locale::default();
        }

        App::setLocale($locale);

        View::share('currentLocale', $locale);

        return $next($request);
    }
}
