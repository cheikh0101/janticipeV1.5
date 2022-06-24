<?php

use App\Http\Controllers\AnneeAcademiqueController;
use App\Http\Controllers\EcController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\UeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::fallback(function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('template.about');
});

Route::get('/contact', function () {
    return view('template.contact');
});

Route::group(['middleware' => 'auth'], function () {
    // Route::group(['middleware' => 'is_admin', 'prefix' => 'admin'], function () {
    // });
    // Route::group(['middleware' => 'is_res', 'prefix' => 'res'], function () {
    // });
    Route::resource('anneeAcademique', AnneeAcademiqueController::class);
    Route::resource('semestre', SemestreController::class);
    Route::resource('ue', UeController::class);
    Route::resource('ec', EcController::class);
});

Route::group(['prefix' => 'guest'], function () {
    Route::get('/cours', function () {
        return view('cours.index');
    });

    Route::get('/cours/details', function () {
        return view('cours.show');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
