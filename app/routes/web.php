<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\DocumentController;
use App\Mail\SendContactMessageEmail;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\MailBox;
use App\Models\Specialite;
use App\Models\TypeDocument;
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
    $specialite = Specialite::count();
    $classe = Classe::count();
    $cm = TypeDocument::whereRelation('type', 'code', 'CM')->count();
    $examens = TypeDocument::whereRelation('type', 'code', 'EN')->count();
    return view('index', compact('specialite', 'classe', 'cm', 'examens'));
});

Route::get('/', function () {
    $specialite = Specialite::count();
    $classe = Classe::count();
    $cm = TypeDocument::whereRelation('type', 'code', 'CM')->count();
    $examens = TypeDocument::whereRelation('type', 'code', 'EN')->count();
    return view('index', compact('specialite', 'classe', 'cm', 'examens'));
});

Route::get('/about', function () {
    return view('template.about');
});

Route::get('/contact', function () {
    return view('template.contact');
});

Route::post('/new-email', function (Request $request) {
    $request->validate([
        'email' => 'required|unique:mail_boxes|email:rfc,dns'
    ]);
    $specialite = Specialite::count();
    $classe = Classe::count();
    $cm = TypeDocument::whereRelation('type', 'code', 'CM')->count();
    $examens = TypeDocument::whereRelation('type', 'code', 'EN')->count();
    DB::beginTransaction();
    try {
        $infoMessage = "Abonnement réussi. Merci pour la confiance!";
        $alert = "primary";
        $newEmail = new MailBox();
        $newEmail->email = $request->email;
        $newEmail->saveOrFail();
        DB::commit();
        return view('index', compact('infoMessage', 'alert', 'specialite', 'classe', 'cm', 'examens'));
    } catch (\Throwable $th) {
        $infoMessage = "Une erreur a été rencontré. Merci de réessayer!";
        $alert = "danger";
        DB::rollback();
        return view('index', compact('infoMessage', 'alert', 'specialite', 'classe', 'cm', 'examens'));
    }
})->name('new-email');

Route::post('/contact/message', function (Request $request) {
    $request->validate([
        'objet' => 'required',
        'message' => 'required',
        'email' => 'required',
    ]);
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
    Route::resource('/cours', CoursController::class)->only(['index', 'show']);
    Route::post('/cours/search', [CoursController::class, 'search']);
    Route::post('/document/search/', [DocumentController::class, 'search']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('document', DocumentController::class);
});

Auth::routes(['verify' => true]);
