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
            Route::prefix('/selectionhealths')->group(function () {
                Route::get('/', [App\Http\Controllers\SelectionHealthsController::class, 'index'])->name('selectionhealths.home');
                Route::get('/detail/{id}', [App\Http\Controllers\SelectionHealthsController::class, 'show'])->name('selectionhealths.detail');
                Route::get('/statusupdate/{id}/{status}', [App\Http\Controllers\SelectionHealthsController::class, 'update'])->name('selectionhealths.statusupdate');
            });
            Route::prefix('/selectionachievements')->group(function () {
                Route::get('/{departementId}', [App\Http\Controllers\SelectionAchievementsController::class, 'index'])->name('selectionachievement.home');
                Route::get('/detail/{id}', [App\Http\Controllers\SelectionAchievementsController::class, 'show'])->name('selectionachievement.detail');
                Route::get('/statusupdate/{id}/{departementId}/{status}', [App\Http\Controllers\SelectionAchievementsController::class, 'update'])->name('selectionachievement.statusupdate');
            });
            Route::prefix('/selectionreports')->group(function () {
                Route::get('/{departementId}', [App\Http\Controllers\SelectionReportsController::class, 'index'])->name('selectionreports.home');
                Route::get('/finalization/{departementId}', [App\Http\Controllers\SelectionReportsController::class, 'update'])->name('selectionreports.finalization');
            });
            Route::prefix('/config')->group(function () {
                Route::get('/', [App\Http\Controllers\ConfigController::class, 'index'])->name('config.home');
                Route::put('/update', [App\Http\Controllers\ConfigController::class, 'update'])->name('config.update');
            });

            Route::prefix('/info')->group(function () {
                Route::get('/', [App\Http\Controllers\InfoController::class, 'index'])->name('info.home');
                Route::post('/add', [App\Http\Controllers\InfoController::class, 'store'])->name('info.store');
                Route::get('/delete/{id}', [App\Http\Controllers\InfoController::class, 'destroy'])->name('info.delete');
                Route::get('/show/{id}', [App\Http\Controllers\InfoController::class, 'show'])->name('info.detail');
                Route::get('/show/edit/{id}', [App\Http\Controllers\InfoController::class, 'edit'])->name('info.editform');
                Route::post('/update/{id}', [App\Http\Controllers\InfoController::class, 'update'])->name('info.update');
                Route::get('/search', [App\Http\Controllers\InfoController::class, 'search'])->name('info.search');
            });
        });
        Route::get('/logoutAdmin',[App\Http\Controllers\Auth\LogoutController::class, 'logoutAdmin']);
    });
    Route::group(['middleware' => 'verified'], function(){
        Route::group(['middleware' => 'role:2'], function() {
            Route::prefix('/students')->group(function () {
                Route::prefix('/dashboard')->group(function () {
                    Route::get('/', [App\Http\Controllers\DashboardController::class, 'student'])->name('dashboard.student');
                });
                Route::get('/biodata', [\App\Http\Controllers\StudentController::class, 'index'])->name('student.biodata');
                Route::post('/biodata', [\App\Http\Controllers\StudentController::class, 'store'])->name('student.updateBiodata');
                Route::post('/upload/photo', [\App\Http\Controllers\StudentController::class, 'uploadPhoto'])->name('student.uploadPhoto');

                Route::get('/sekolah-asal', [\App\Http\Controllers\SchoolOriginController::class, 'index'])->name('student.schoolorigin');
                Route::post('/sekolah-asal', [\App\Http\Controllers\SchoolOriginController::class, 'store'])->name('student.updateSchoolorigin');
                Route::post('/upload/skl', [\App\Http\Controllers\SchoolOriginController::class, 'uploadSkl'])->name('student.uploadSKL');

                Route::get('/kesehatan', [\App\Http\Controllers\HealthController::class, 'index'])->name('student.health');
                Route::post('/upload/kesehatan', [\App\Http\Controllers\HealthController::class, 'store'])->name('student.uploadSuratKesehatan');

                Route::get('/prestasi', [\App\Http\Controllers\AchievementController::class, 'index'])->name('student.achievement');
                Route::post('/prestasi/add', [\App\Http\Controllers\AchievementController::class, 'store'])->name('student.add.achievement');
                Route::delete('/prestasi/delete/{id}', [\App\Http\Controllers\AchievementController::class, 'destroy'])->name('student.delete.achievement');
                Route::get('/prestasi/edit/{id}', [\App\Http\Controllers\AchievementController::class, 'edit'])->name('student.edit.achievement');
                Route::put('/prestasi/update/{id}', [\App\Http\Controllers\AchievementController::class, 'update'])->name('student.update.achievement');
                Route::post('/prestasi/final', [\App\Http\Controllers\AchievementController::class, 'final'])->name('student.final.achievement');

                Route::get('/rapor', [\App\Http\Controllers\ReportController::class, 'index'])->name('student.report');
                Route::post('/rapor/add', [\App\Http\Controllers\ReportController::class, 'store'])->name('student.add.report');
                Route::post('/rapor/final', [\App\Http\Controllers\ReportController::class, 'final'])->name('student.final.report');

                Route::get('/bukti_penerimaan', [App\Http\Controllers\StudentController::class, 'bukti_penerimaan'])->name('bukti.penerimaan');
                Route::get('/bukti_pendaftaran', [App\Http\Controllers\StudentController::class, 'bukti_pendaftaran'])->name('bukti.pendaftaran');

                Route::post('/get-provinces', [\App\Http\Controllers\RegionController::class, 'getProvincesById'])->name('region.getProvinces');
                Route::post('/get-regencies', [\App\Http\Controllers\RegionController::class, 'getRegenciesById'])->name('region.getRegencies');
                Route::post('/get-districts', [\App\Http\Controllers\RegionController::class, 'getDistrictsById'])->name('region.getDistricts');
                Route::post('/get-villages', [\App\Http\Controllers\RegionController::class, 'getVillagesById'])->name('region.getVillages');
            });
        });
    });
});

Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify');
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
