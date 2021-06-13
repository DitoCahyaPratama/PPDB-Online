<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

//Route::get('/', function () {
//    return view('welcome');
//});


//Admin Pages

Route::get('/admin', function () {
    return view('admin.layouts.admin');
});



// Route::prefix('/jobsaya')->group(function () {
//     Route::get('/', [KerjaController::class, 'myjob'])->name('user.jobsaya');
//     Route::post('/store', [KerjaController::class, 'store']);
//     Route::get('/get/{id}', [KerjaController::class, 'getById']);
//     Route::delete('/delete/{id}',[KerjaController::class, 'delete']);
//     Route::put('/update/{id}', [KerjaController::class, 'update']);
// });


Auth::routes();
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('public');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
