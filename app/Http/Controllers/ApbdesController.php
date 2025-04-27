<?php

namespace App\Http\Controllers;

use App\Models\Apbdes;
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
            'tahun' => 'required|integer',
            'jenis' => 'required|in:Pendapatan,Belanja',
            'kategori' => 'required|string',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Apbdes::create($request->all());

        return redirect()->route('apbdes.index')->with('success', 'Data berhasil ditambahkan.');
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
        'jenis' => 'required',
        'kategori' => 'required|string',
        'jumlah' => 'required|numeric',
        'keterangan' => 'nullable|string',
    ]);

    $data = Apbdes::findOrFail($id);
    $data->update($request->all());

    return redirect()->route('apbdes.index')->with('success', 'Data berhasil diperbarui.');
}

public function destroy($id)
{
    $data = Apbdes::findOrFail($id);
    $data->delete();

    return redirect()->route('apbdes.index')->with('success', 'Data berhasil dihapus.');
}

}
