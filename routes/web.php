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
Route::prefix('/admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\CheckLoginController::class, 'checkLoginAdmin']);
});

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'role:1'], function() {
        Route::prefix('/admin')->group(function () {
            Route::prefix('/dashboard')->group(function () {
                Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.home');
            });
            Route::prefix('/userdata')->group(function () {
                Route::get('/', [App\Http\Controllers\UserDataController::class, 'index'])->name('userdata.home');
                Route::get('/delete/{id}', [App\Http\Controllers\UserDataController::class, 'destroy'])->name('userdata.delete');
            });
            Route::prefix('/studentdata')->group(function () {
                Route::get('/', [App\Http\Controllers\StudentDataController::class, 'index'])->name('studentdata.home');
                Route::get('/detail/{id}', [App\Http\Controllers\StudentDataController::class, 'show'])->name('studentdata.detail');
            });
            Route::prefix('/achievementdata')->group(function () {
                Route::get('/', [App\Http\Controllers\AchievementDataController::class, 'index'])->name('achievementdata.home');
            });
            Route::prefix('/selectionhealths')->group(function () {
                Route::get('/', [App\Http\Controllers\SelectionHealthsController::class, 'index'])->name('selectionhealths.home');
                Route::get('/statusupdate/{id}/{status}', [App\Http\Controllers\SelectionHealthsController::class, 'update'])->name('selectionhealths.statusupdate');
            });

            Route::prefix('/selectionreports')->group(function () {
                Route::get('/{departementId}', [App\Http\Controllers\SelectionReportsController::class, 'index'])->name('selectionreports.home');
                // Route::get('/statusupdate/{id}/{status}', [App\Http\Controllers\SelectionHealthsController::class, 'update'])->name('selectionhealths.statusupdate');
            });

            // Route::get('/', [KerjaController::class, 'myjob'])->name('user.jobsaya');
            // Route::post('/store', [KerjaController::class, 'store']);
            // Route::get('/get/{id}', [KerjaController::class, 'getById']);
            // Route::delete('/delete/{id}',[KerjaController::class, 'delete']);
            // Route::put('/update/{id}', [KerjaController::class, 'update']);
        });
        Route::get('/logoutAdmin',[App\Http\Controllers\Auth\LogoutController::class, 'logoutAdmin']);
    });
    Route::group(['middleware' => 'role:2'], function() {
        Route::prefix('/students')->group(function () {
            Route::prefix('/dashboard')->group(function () {
                Route::get('/', [App\Http\Controllers\DashboardController::class, 'student'])->name('dashboard.student');
            });
            Route::get('/bukti_penerimaan', [App\Http\Controllers\StudentController::class, 'bukti_penerimaan'])->name('bukti.penerimaan');
            Route::get('/bukti_pendaftaran', [App\Http\Controllers\StudentController::class, 'bukti_pendaftaran'])->name('bukti.pendaftaran');
        });
    });
});

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
Route::get('/info', [App\Http\Controllers\InfoController::class, 'index'])->name('info');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
