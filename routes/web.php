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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KritikSaranController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';


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
Route::get('/apbdes', [ApbdesController::class, 'index'])->name('apbdes.index');
Route::get('/apbdes/create', [ApbdesController::class, 'create'])->name('apbdes.create');
Route::post('/apbdes', [ApbdesController::class, 'store'])->name('apbdes.store');
Route::get('/apbdes/{id}/edit', [ApbdesController::class, 'edit'])->name('apbdes.edit');
Route::put('/apbdes/{id}', [ApbdesController::class, 'update'])->name('apbdes.update');
Route::delete('/apbdes/{id}', [ApbdesController::class, 'destroy'])->name('apbdes.destroy');
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

//    Route kritik dan saran khusus admin
Route::middleware('can:role-A')->group(function () {
    Route::get('/admin/kritik-saran', [KritikSaranController::class, 'index'])->name('admin.kritik-saran.index');
});
    // Tampilkan form tambah event
    // Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    // Simpan event baru
    // Route::post('/events', [EventController::class, 'store'])->name('events.store');
});

require __DIR__ . '/auth.php';
