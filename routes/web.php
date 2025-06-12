<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleriDesaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileKepalaDesaController;
use App\Http\Controllers\StukturOrganisasiController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TentangDesaController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Controller\ErrorController;
use App\Http\Controllers\ApbdesController;
use App\Http\Controllers\ApbdesReportController;
use App\Http\Controllers\BantuanSosialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\StatistikPendudukController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('dashboard');
});

Route::resource('error', ErrorController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');






// Halaman daftar event
// Route::get('/events', [EventController::class, 'index'])->name('events.index');
// // Halaman detail event
// Route::get('/events/{event}', [EventController::class, 'show']);
// // Halaman form pendaftaran tim
// Route::get('/events/{event}/register', [EventController::class, 'register']);
// // Simpan pendaftaran tim (proses form)
// Route::post('/events/{event}/register', [EventController::class, 'storeRegistration']);

Route::resource('events', EventController::class);
// Route::post('events', [EventController::class, 'store'])->name('events.store');
Route::get('/teamsMembers/{event}', [EventController::class, 'teams'])->name('events.teamsMembers');
Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');

// Route Untuk Page Data ApBDES

// Route Untuk Page agendas
Route::resource('agendas', AgendaController::class);
// Route Untuk Page Laporan
Route::prefix('laporan')->group(function () {
    Route::get('index', [ApbdesReportController::class, 'index'])->name('laporan.index');
    Route::get('create', [ApbdesReportController::class, 'create'])->name('laporan.create');
    Route::post('store', [ApbdesReportController::class, 'store'])->name('laporan.store');
});

// Route Page Kritik Dan Saran
Route::get('/kritik-saran', [KritikSaranController::class, 'create'])->name('kritik-saran.create');
Route::post('/kritik-saran', [KritikSaranController::class, 'store'])->name('kritik-saran.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Rute untuk halaman detail berita
// Menampilkan detail berita dengan format halaman-berita-{id}
// Route manual berita dengan URL spesifik
Route::get('/halaman-berita-{id}', [BeritaController::class, 'show'])->name('halaman.berita');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('VisiMisi', VisiMisiController::class);
Route::get('TentangDesa', [MapController::class, 'show'])->name('page.TentangDesa.index');
Route::resource('TentangDesa', TentangDesaController::class);
// Route untuk galeri
Route::resource('galeris', GaleriController::class);
Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

// Route UMKM
Route::resource('Umkm', UmkmController::class);
Route::resource('ProfileKepalaDesa', ProfileKepalaDesaController::class);
Route::resource('berita', BeritaController::class);

// Route Info Bantuan Sosial
Route::resource('/bantuan-sosial', BantuanSosialController::class)->except(['create', 'edit', 'show']);
Route::get('/bantuan-sosial/export/pdf', [BantuanSosialController::class, 'exportPdf'])->name('bantuan-sosial.export.pdf');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('StukturOrganisasi', StukturOrganisasiController::class)->middleware('auth');
    Route::resource('DataPegawai', DataPegawaiController::class)->middleware('auth');
    Route::get('/DataPegawai/search', [DataPegawaiController::class, 'search'])->name('DataPegawai.search');
    Route::resource('kontak', KontakController::class)->middleware('auth');
    Route::get('/apbdes', [ApbdesController::class, 'index'])->name('apbdes.index');
    Route::get('/apbdes/create', [ApbdesController::class, 'create'])->name('apbdes.create');
    Route::post('/apbdes', [ApbdesController::class, 'store'])->name('apbdes.store');
    Route::get('/apbdes/{id}/edit', [ApbdesController::class, 'edit'])->name('apbdes.edit');
    Route::put('/apbdes/{id}', [ApbdesController::class, 'update'])->name('apbdes.update');
    Route::delete('/apbdes/{id}', [ApbdesController::class, 'destroy'])->name('apbdes.destroy');
    Route::resource('statistik', StatistikPendudukController::class);

    //    Route kritik dan saran khusus admin
    Route::middleware(['auth'])->group(function () {
        Route::get('/admin/kritik-saran', [KritikSaranController::class, 'index'])->name('kritik-saran.index');
        Route::delete('/admin/kritik-saran/{id}', [KritikSaranController::class, 'destroy'])->name('kritik-saran.destroy');
    });

    // Tampilkan form tambah event
    // Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    // Simpan event baru
    // Route::post('/events', [EventController::class, 'store'])->name('events.store');
});

require __DIR__ . '/auth.php';
