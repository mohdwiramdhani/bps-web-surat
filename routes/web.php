<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\SifatSuratController;
use App\Http\Controllers\KlasifikasiSuratController;
use App\Http\Controllers\NotifikasiDisposisiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {

    Route::prefix('surat')->as('surat.')->group(function () {

        Route::resource('/masuk', MasukController::class);
        Route::resource('/keluar', KeluarController::class);
        Route::resource('{masuk}/disposisi', DisposisiController::class);
        Route::get('/disposisi/views', [DisposisiController::class, 'views'])->name('disposisi.views');

    });

    Route::prefix('agenda')->as('agenda.')->group(function () {
        Route::get('/masuk', [MasukController::class, 'agenda'])->name('masuk');
        Route::get('/keluar', [KeluarController::class, 'agenda'])->name('keluar');
    });

    Route::resource('klasifikasi-surat', KlasifikasiSuratController::class);

    Route::resource('sifat-surat', SifatSuratController::class);
    
    Route::prefix('galeri')->as('galeri.')->group(function () {
        Route::resource('/masuk', Masuk\Controller::class);
        Route::resource('/keluar', KeluarController::class);
    });

    // Route::get('/user/profile', function () {
    //     return view('user/profile');
    // });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::patch('/pengaturan', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('notifikasi', NotifikasiDisposisiController::class);

});

Route::get('/trigger/{token}', 'App\Http\Controllers\DisposisiController@trigger')->name('trigger');

Route::get('/pages/info', function () {
    return view('/pages/info');
});

require __DIR__.'/auth.php';