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
    Route::get('/login', function () {
        return view('admin.layouts.login');
    });

    Route::prefix('/userdata')->group(function () {
        Route::get('/', [App\Http\Controllers\UserDataController::class, 'index'])->name('userdata.home');
    });
    Route::prefix('/studentdata')->group(function () {
        Route::get('/', [App\Http\Controllers\StudentDataController::class, 'index'])->name('studentdata.home');
    });
    Route::prefix('/achievementdata')->group(function () {
        Route::get('/', [App\Http\Controllers\AchievementDataController::class, 'index'])->name('achievementdata.home');
    });
    Route::prefix('/selectionhealths')->group(function () {
        Route::get('/', [App\Http\Controllers\SelectionHealthsController::class, 'index'])->name('selectionhealths.home');
    });

    // Route::get('/', [KerjaController::class, 'myjob'])->name('user.jobsaya');
    // Route::post('/store', [KerjaController::class, 'store']);
    // Route::get('/get/{id}', [KerjaController::class, 'getById']);
    // Route::delete('/delete/{id}',[KerjaController::class, 'delete']);
    // Route::put('/update/{id}', [KerjaController::class, 'update']);
});


Auth::routes();
Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('public');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
