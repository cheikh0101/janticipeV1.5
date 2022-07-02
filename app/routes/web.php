<?php

use App\Models\Specialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

// Route::get('specialite', function () {
//     $client = Http::get('https://gpe-ws.univ-thies.sn/api/public/filieres-and-options-sync');
//     if ($client->successful()) {
//         $filiereAndOptions = $client->object();
//         foreach ($filiereAndOptions as $filiereAndOption) {
//             foreach ($filiereAndOption->specialites as $specialite) {
//                 $specialitee = new Specialite();
//                 $specialitee->libelle = $specialite->nom;
//                 $specialitee->code = $specialite->code;
//                 $specialitee->save();
//             }
//         }
//     } else {
//         return 'error';
//     }
// });
