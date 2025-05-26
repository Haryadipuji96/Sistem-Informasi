<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Tampilkan semua galeri
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('page.galeri.index', compact('galeris'));
    }

    // Tampilkan form tambah galeri
    public function create()
    {
        return view('page.galeri.create');
    }

    // Simpan galeri baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil ditambahkan!');
    }
    
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if (Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
