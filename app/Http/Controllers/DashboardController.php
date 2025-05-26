<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // <- Wajib! Untuk ambil berita dari database
use App\Models\StatistikPenduduk;


class DashboardController extends Controller
{
    // DashboardController.php
    public function index()
    {
        $berita = Berita::all();
        $statistik = StatistikPenduduk::latest()->first();
        $statistik = StatistikPenduduk::orderBy('id', 'desc')->first();
        

        
        $laki_laki = $statistik?->laki_laki ?? 0;
        $perempuan = $statistik?->perempuan ?? 0;
        $kepala_keluarga = $statistik?->kepala_keluarga ?? 0;

        // Hitung total otomatis
        $total = $laki_laki + $perempuan;

        return view('dashboard', [
            'beritaManual' => [
                [
                    'id' => 1,
                    'title' => 'Desa Indrajaya mendapat kunjungan dari Bapa Sekretaris Daerah Kabupaten Tasikmalaya',
                    'image' => 'image/kunjungan.jpg',
                    'tanggal' => '17 Januari 2025',
                ],
            ],
            'berita' => $berita,
            'statistik' => $statistik,
            'total' => $total,
            'laki_laki' => $laki_laki,
            'perempuan' => $perempuan,
            'kepala_keluarga' => $kepala_keluarga,
        ]);
    }
}
