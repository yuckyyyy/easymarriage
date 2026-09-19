<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

$pages = function (): void {
    Route::view('/', 'home')->name('home');
    Route::view('/privacy', 'legal.privacy')->name('privacy');
    Route::view('/terms', 'legal.terms')->name('terms');
    Route::view('/cookies', 'legal.cookies')->name('cookies');
};

Route::middleware(SetLocale::class)->group($pages);

Route::prefix('{locale}')
    ->whereIn('locale', config('locales.prefixed', ['en', 'ru']))
    ->middleware(SetLocale::class)
    ->name('locale.')
    ->group($pages);

Route::get('/uk/{path?}', function (?string $path = null) {
    return redirect('/'.ltrim((string) $path, '/'), 301);
})->where('path', '.*');

Route::post('/consultation', [ConsultationController::class, 'store'])
    ->middleware(['throttle:8,1', SetLocale::class])
    ->name('consultation.store');
