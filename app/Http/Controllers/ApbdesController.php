<?php

namespace App\Http\Controllers;

use App\Models\Apbdes;
use App\Models\ApbdesReport;
use Illuminate\Http\Request;

class ApbdesController extends Controller
{
    public function index()
    {
        $data = Apbdes::orderBy('tahun', 'desc')->get();
        return view('page.apbdes.index', compact('data'));
    }

    public function create()
    {
        return view('page.apbdes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            //'jenis' => 'required|string',  // dihapus validasi jenis
            'kategori' => 'required|string',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $input = $request->only('tahun', 'kategori', 'jumlah', 'keterangan');
        $apbdes = Apbdes::create($input);

        ApbdesReport::create([
            'kategori' => $apbdes->kategori,
            'keterangan' => $apbdes->keterangan, // <-- ini yang harus diperbaiki
            'jumlah' => $apbdes->jumlah,
            'tahun' => $apbdes->tahun,
        ]);

        return redirect()->route('apbdes.index')->with('success', 'Data APBDES dan laporan berhasil dibuat.');
    }


    public function edit($id)
    {
        $data = Apbdes::findOrFail($id);
        return view('page.apbdes.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            //'jenis' => 'required|string', // jika memang dihapus
            'kategori' => 'required|string',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $data = Apbdes::findOrFail($id);

        // Simpan nilai lama sebelum update
        $oldTahun = $data->tahun;
        $oldKategori = $data->kategori;

        // Update data
        $input = $request->only('tahun', 'kategori', 'jumlah', 'keterangan');
        $data->update($input);

        // Cari laporan berdasarkan nilai lama
        $report = ApbdesReport::where('tahun', $oldTahun)
            ->where('kategori', $oldKategori)
            ->first();

        if ($report) {
            // Update laporan dengan data baru
            $report->update([
                'keterangan' => $data->keterangan,
                'jumlah' => $data->jumlah,
                'tahun' => $data->tahun,
                'kategori' => $data->kategori,
            ]);
        } else {
            // Buat laporan baru kalau tidak ada
            ApbdesReport::create([
                'keterangan' => $data->keterangan,
                'jumlah' => $data->jumlah,
                'tahun' => $data->tahun,
                'kategori' => $data->kategori,
            ]);
        }

        return redirect()->route('apbdes.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $data = Apbdes::findOrFail($id);

        ApbdesReport::where('kategori', $data->kategori)
            ->where('tahun', $data->tahun)
            ->delete();

        $data->delete();

        return redirect()->route('apbdes.index')->with('success', 'Data berhasil dihapus.');
    }
}
