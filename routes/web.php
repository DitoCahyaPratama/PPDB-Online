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

Route::get('/', function () {
    return view('welcome');
});


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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
