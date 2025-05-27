<?php

namespace App\Http\Controllers;

use App\Models\StatistikPenduduk;
use Illuminate\Http\Request;

class StatistikPendudukController extends Controller
{
    public function index()
    {
        $statistik = StatistikPenduduk::all();

        $total = $statistik->sum('jumlah_penduduk');
        $laki_laki = $statistik->sum('laki_laki');
        $perempuan = $statistik->sum('perempuan');
        $kepala_keluarga = $statistik->sum('kepala_keluarga');

        return view('page.Statistik.index', compact('statistik', 'total', 'laki_laki', 'perempuan', 'kepala_keluarga'));
    }

    public function create()
    {
        return view('page.Statistik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bulan' => 'required|string|max:50',
            'jumlah_penduduk' => 'required|integer',
            'laki_laki' => 'required|integer',
            'perempuan' => 'required|integer',
            'kepala_keluarga' => 'required|integer',
        ]);

        StatistikPenduduk::create($validated);

        return redirect()->route('statistik.index')->with('success', 'Data statistik berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = StatistikPenduduk::findOrFail($id);
        return view('page.statistik.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = StatistikPenduduk::findOrFail($id);

        $validated = $request->validate([
            'bulan' => 'required|string|max:50',
            'jumlah_penduduk' => 'required|integer',
            'laki_laki' => 'required|integer',
            'perempuan' => 'required|integer',
            'kepala_keluarga' => 'required|integer',
        ]);

        $data->update($validated);

        return redirect()->route('statistik.index')->with('success', 'Data statistik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = StatistikPenduduk::findOrFail($id);
        $data->delete();

        return redirect()->route('statistik.index')->with('success', 'Data statistik berhasil dihapus.');
    }
}
