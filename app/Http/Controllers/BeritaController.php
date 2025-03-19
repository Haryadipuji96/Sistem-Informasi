<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Menampilkan semua berita
    public function index()
    {
        $berita = Berita ::latest()->get();
        return view('berita.index', compact('berita'));
    }

    // Menampilkan formulir tambah berita
    public function create()
    {
        return view('berita.create');
    }

    // Simpan berita baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil disimpan!');
    }

    // Tampilkan detail berita
    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    // Menampilkan formulir edit berita
    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    // Update berita
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // Hapus berita
    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
