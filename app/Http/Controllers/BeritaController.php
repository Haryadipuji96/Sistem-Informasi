<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BeritaController extends Controller
{
    public function index()
    {
        // Ambil 4 berita terbaru
        $berita = Berita::latest()->take(4)->get();
    
        // Kirim data ke view 'dashboard'
        return view('dashboard', compact('berita'));
    }

    // Menampilkan form buat berita baru
    public function create()
    {
        return view('page.berita.create');
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']); // generate slug dari title

        Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil disimpan!');
    }


    // Menampilkan detail berita
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('page.berita.show', compact('berita'));
    }


    // Menampilkan form edit berita
    public function edit(Berita $berita)
    {
        return view('page.berita.edit', compact('berita'));
    }

    // Update berita
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']); // generate ulang slug jika title berubah

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
