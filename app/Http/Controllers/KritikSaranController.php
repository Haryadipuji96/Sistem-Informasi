<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KritikSaranController extends Controller
{
    // Halaman form kritik dan saran untuk user publik (tanpa login)
    public function create()
    {
        if (Auth::check() && Auth::user()->role === 'ADMIN') {
            return redirect()->route('kritik-saran.index');
        }

        return view('page.kritik-saran.create');
    }



    // Simpan kritik dan saran dari user publik
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'isi' => 'required|string',
        ]);

        KritikSaran::create($request->only('nama', 'email', 'isi'));

        return redirect()->route('dashboard')->with('success', 'Terima kasih atas kritik dan sarannya!');
    }


    // Halaman admin untuk melihat semua kritik dan saran (harus login)
    public function index()
    {
        $kritikSaran = KritikSaran::latest()->get();
        return view('page.kritik-saran.admin.index', compact('kritikSaran'));
    }

    public function destroy($id)
    {
        $kritik = KritikSaran::findOrFail($id);
        $kritik->delete();

        return redirect()->route('kritik-saran.index')->with('success', 'Kritik/saran berhasil dihapus.');
    }
}
