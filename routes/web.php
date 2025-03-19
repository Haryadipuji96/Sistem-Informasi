<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\GaleriDesaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileKepalaDesaController;
use App\Http\Controllers\StukturOrganisasiController;
use App\Http\Controllers\TentangDesaController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Controller\ErrorController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});

Route::resource('error', ErrorController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('TentangDesa', [MapController::class, 'show'])->name('page.TentangDesa.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('berita', BeritaController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('ProfileKepalaDesa', ProfileKepalaDesaController::class)->middleware('auth');
    Route::resource('StukturOrganisasi', StukturOrganisasiController::class)->middleware('auth');
    Route::resource('DataPegawai', DataPegawaiController::class)->middleware('auth');
    Route::resource('VisiMisi', VisiMisiController::class)->middleware('auth');
    Route::resource('kontak', KontakController::class)->middleware('auth');
    Route::resource('TentangDesa', TentangDesaController::class)->middleware('auth');
    Route::resource('GaleriDesa', GaleriDesaController::class)->middleware('auth');
    Route::resource('Umkm', UmkmController::class)->middleware('auth');
    Route::resource('Penduduk', PendudukController::class)->middleware('auth');


});

require __DIR__.'/auth.php';
