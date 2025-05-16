<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // <- Wajib! Untuk ambil berita dari database

class DashboardController extends Controller
{
    // DashboardController.php
public function index()
{
    $berita = Berita::all();
    //dd($berita);
    return view('dashboard', [
        'beritaManual' => [
            [
                'id' => 1,
                'title' => 'Desa Indrajaya mendapat kunjungan dari Bapa Sekretaris Daerah Kabupaten Tasikmalaya',
                'image' => 'image/kunjungan.jpg',
                'tanggal' => '17 Januari 2025',
            ],
            // Tambahkan lainnya sesuai kebutuhan
        ],
    ])->with([
        'berita'=>$berita
    ]);
}

}
