<?php

use App\Http\Controllers\Api\V1\CoursController;
use App\Http\Controllers\Api\V1\DocumentController;
use App\Mail\SendContactMessageEmail;
use App\Models\MailBox;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('new-email', function (Request $request) {
    $request->validate([
        'email' => 'required|unique:mail_boxes|email:rfc,dns'
    ]);
    DB::beginTransaction();
    try {
        $newEmail = new MailBox();
        $newEmail->email = $request->email;
        $newEmail->saveOrFail();
        DB::commit();
    } catch (\Throwable $th) {
    }
})->name('new-email');

Route::post('contact/message', function (Request $request) {
    $request->validate([
        'objet' => 'required',
        'message' => 'required',
        'email' => 'required',
    ]);
    try {
        $objet = $request->objet;
        $email = $request->email;
        $message = $request->message;
        Mail::to('janticipe0101@gmail.com')->send(new SendContactMessageEmail($objet, $email, $message));
    } catch (\Throwable $th) {
    }
})->name('contact/message');

Route::prefix('V1')->group(function () {
    Route::apiResource('cours', CoursController::class)->only(['index', 'show']);
    Route::post('cours/search', [CoursController::class, 'search']);
    Route::post('document/search/', [DocumentController::class, 'search']);
});
