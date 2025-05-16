<?php

namespace App\Http\Controllers;

use App\Models\ApbdesReport;
use Illuminate\Http\Request;

class ApbdesReportController extends Controller
{
    // Menampilkan semua laporan dengan filter tahun dan grafik
    public function index(Request $request)
    {
        $tahun = $request->get('tahun');
        $query = ApbdesReport::query();

        if ($tahun) {
            $query->where('tahun', $tahun);
        }

        $reports = $query->orderBy('tahun', 'desc')->get();
        $allYears = ApbdesReport::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');

        // Data untuk grafik Chart.js
        $grouped = $reports->groupBy('kategori');
        $chartLabels = [];
        $chartData = [];

        foreach ($grouped as $kategori => $items) {
            $chartLabels[] = $kategori;
            $chartData[] = $items->sum('jumlah');
        }

        return view('page.laporan.index', compact('reports', 'chartLabels', 'chartData', 'allYears', 'tahun'));
    }

}
