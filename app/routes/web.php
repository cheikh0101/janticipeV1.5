<?php

use App\Http\Controllers\CoursController;
use App\Mail\SendContactMessageEmail;
use App\Models\Cour;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::post('/new-email', function (Request $request) {
    return 'hello';
    $validators = Validator::make($request->all(), [
        'email' => 'required|exists:mail_boxes,email'
    ]);
    if ($validators->fails()) {
        return back();
    }
    DB::beginTransaction();
    try {
        $infoMessage = "Merci pour la confiance &hearts";
        $alert = "primary";
        DB::commit();
        return view('index', compact('infoMessage', 'alert'));
    } catch (\Throwable $th) {
        $infoMessage = "Une erreur a été rencontré lors de l'envoi. Merci de réessayer!";
        $alert = "danger";
        DB::rollback();
        return view('index', compact('infoMessage', 'alert'));
    }
})->name('new-email');

Route::post('/contact/message', function (Request $request) {
    $validators = Validator::make($request->all(), [
        'objet' => 'required',
        'message' => 'required',
        'email' => 'required',
    ]);
    if ($validators->fails()) {
        return back();
    }
    try {
        $infoMessage = "Message envoyé avec succès. Merci!";
        $alert = "primary";
        $objet = $request->objet;
        $email = $request->email;
        $message = $request->message;
        Mail::to('janticipe0101@gmail.com')->send(new SendContactMessageEmail($objet, $email, $message));
    } catch (\Throwable $th) {
        $infoMessage = "Une erreur a été rencontré lors de l'envoi du message. Merci!";
        $alert = "danger";
    }
    return view('template.contact', compact('infoMessage', 'alert'));
})->name('contact/message');

Route::group(['prefix' => 'guest'], function () {
    Route::get('/cours', [CoursController::class, 'index']);

    Route::post('/cours/search', [CoursController::class, 'search']);

    Route::get('/cours/details', function () {
        return view('cours.show');
    });
});

Auth::routes(['verify' => true]);

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
