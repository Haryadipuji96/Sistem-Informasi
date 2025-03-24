<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Exception;
use Illuminate\Http\Request;

use function Illuminate\Log\log;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $penduduk = Penduduk::all();
            return view('page.Penduduk.index', compact('penduduk'));
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('page.Penduduk.create');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat membuka formulir tambah data UMKM.']);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'nik' => 'required|string|unique:penduduk|max:16',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'alamat' => 'nullable|string',
            ]);

            Penduduk::create($validated);

            return redirect()->route('Penduduk.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
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
    public function edit(Penduduk $penduduk)
    {
        try {
            return view('page.Penduduk.edit', compact('penduduk'));
        } catch (Exception $penduduk) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat membuka formulir edit data PENDUDUK.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // try {
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:penduduk,nik,' . $penduduk->id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
        ]);

        // Perbarui data penduduk
        Penduduk::update($validatedData);
        // Redirect kelo halaman index dengan pesan sukses
        // } catch (\Exception $e) {
        //     // Tangkap error dan kembalikan pesan error
        //     return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $id)
    {
        try {
            $data = Penduduk::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Customer Sudah dihapus');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
