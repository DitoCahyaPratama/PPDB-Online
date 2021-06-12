<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


//Admin Pages

Route::prefix('/admin')->group(function () {

    Route::get('/login', [App\Http\Controllers\Auth\CheckLoginController::class, 'checkLoginAdmin']);
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

Auth::routes();
Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('public');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

