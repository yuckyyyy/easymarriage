<?php

use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/privacy', 'legal.privacy')->name('privacy');
Route::view('/terms', 'legal.terms')->name('terms');
Route::view('/cookies', 'legal.cookies')->name('cookies');

Route::post('/consultation', [ConsultationController::class, 'store'])
    ->middleware('throttle:8,1')
    ->name('consultation.store');
