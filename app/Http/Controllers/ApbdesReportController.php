<?php

namespace App\Http\Controllers;

use App\Models\ApbdesReport;
use Illuminate\Http\Request;

class ApbdesReportController extends Controller
{
    // Menampilkan semua laporan
    public function index(Request $request)
{
    $tahun = $request->get('tahun');
    $query = ApbdesReport::query();

    if ($tahun) {
        $query->where('tahun', $tahun);
    }

    $reports = $query->orderBy('tahun', 'desc')->get();
    $allYears = ApbdesReport::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');

    // Chart data
    $grouped = $reports->groupBy('kategori');
    $chartLabels = [];
    $chartData = [];

    foreach ($grouped as $kategori => $items) {
        $chartLabels[] = $kategori;
        $chartData[] = $items->sum('jumlah');
    }

    return view('page.laporan.index', compact('reports', 'chartLabels', 'chartData', 'allYears', 'tahun'));
}
    

    // Menambahkan laporan baru
    public function create()
    {
        return view('page.laporan.create'); // Menampilkan form tambah laporan
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'uraian' => 'required|string',
            'jumlah' => 'required|numeric',
            'tahun' => 'required|digits:4',
        ]);

        ApbdesReport::create($request->all()); // Simpan data

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }
}
