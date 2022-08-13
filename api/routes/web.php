<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
});

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth', 'isResponsable'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('document', DocumentController::class);
});

Auth::routes(['verify' => true]);
