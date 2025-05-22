<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::all();

        $total = $penduduk->count();
        $laki = $penduduk->where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = $penduduk->where('jenis_kelamin', 'Perempuan')->count();

        return view('page.Penduduk.index', compact('penduduk', 'total', 'laki', 'perempuan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:penduduk|max:16',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
        ]);

        Penduduk::create($validated);

        return redirect()->route('penduduk.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:penduduk,nik,' . $id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
        ]);

        $penduduk = Penduduk::findOrFail($id);
        $penduduk->update($validated);

        return redirect()->route('penduduk.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect()->route('penduduk.index')->with('success', 'Data berhasil dihapus.');
    }

    public function create()
    {
        return view('page.Penduduk.create'); // Pastikan file blade ini ada dan berisi form tambah data
    }
}
