<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function index()
    {
        // Ambil semua kritik dan saran yang sudah dikirim
        $kritikSaran = KritikSaran::all();

        return view('admin.kritik-saran.index', compact('kritikSaran'));
    }

    public function create()
    {
        return view('page.kritik-saran.create');
    }

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
}
