<?php

namespace App\Http\Controllers;

use App\Models\BantuanSosial;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BantuanSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jenis = $request->input('jenis');
        $search = $request->input('search');

        $query = BantuanSosial::query();

        if ($jenis) {
            $query->where('jenis_bantuan', $jenis);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $data = $query->latest()->paginate(10);
        $data->appends($request->query());

        $jenisBantuan = BantuanSosial::distinct()->pluck('jenis_bantuan');

        return view('page.bantuan.index', compact('data', 'jenisBantuan', 'jenis', 'search'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'jenis_bantuan' => 'required',
            'tanggal_terima' => 'required|date',
        ]);

        BantuanSosial::create($request->all());
        return redirect()->back()->with('success', 'Data bantuan ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = BantuanSosial::findOrFail($id);
        $data->update($request->all());

        return redirect()->back()->with('success', 'Data bantuan diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = BantuanSosial::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data bantuan dihapus.');
    }

    public function exportPdf(Request $request)
    {
        $jenis = $request->input('jenis');
        $query = BantuanSosial::query();

        if ($jenis) {
            $query->where('jenis_bantuan', $jenis);
        }

        $data = $query->get();
        $pdf = Pdf::loadView('page.bantuan.pdf', compact('data'));

        return $pdf->download('bantuan-sosial.pdf');
    }
}
