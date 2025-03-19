<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Exception;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $umkms = Umkm::all(); // Mengambil semua data UMKM tanpa pagination
            return view('page.Umkm.index', compact('umkms'));
        } catch (Exception $umkms) {
            echo "<script>console.error('PHP Error: " . addslashes($umkms->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('page.Umkm.create');
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
            // Validasi input
            $validated = $request->validate([
                'nama_umkm' => 'required|string|max:255',
                'pemilik' => 'required|string|max:255',
                'alamat' => 'required|string',
                'jenis_usaha' => 'required|string|max:255',
                'jumlah_karyawan' => 'nullable|integer|min:0',
                'modal' => 'nullable|numeric|min:0',
            ]);

            // Simpan data ke database
            Umkm::create($validated);

            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('Umkm.index')->with('success', 'UMKM berhasil ditambahkan.');
        } catch (Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Umkm $umkm)
    {
        try {
            return view('page.Umkm.show', compact('umkm'));
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Data UMKM tidak ditemukan.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm)
    {
        try {
            return view('page.Umkm.edit', compact('umkm'));
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat membuka formulir edit data UMKM.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'edit_nama_umkm' => 'required|string|max:255',
                'edit_pemilik' => 'required|string|max:255',
                'edit_alamat' => 'required|string|max:255',
                'edit_jenis_usaha' => 'required|string|max:255',
                'edit_jumlah_karyawan' => 'nullable|integer|min:0',
                'edit_modal' => 'nullable|numeric|min:0',
            ]);

            // Temukan data UMKM berdasarkan ID
            $umkm = Umkm::find($id);

            if (!$umkm) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }

            // Perbarui data UMKM
            $umkm->update([
                'nama_umkm' => $validatedData['edit_nama_umkm'],
                'pemilik' => $validatedData['edit_pemilik'],
                'alamat' => $validatedData['edit_alamat'],
                'jenis_usaha' => $validatedData['edit_jenis_usaha'],
                'jumlah_karyawan' => $validatedData['edit_jumlah_karyawan'],
                'modal' => $validatedData['edit_modal'],
            ]);

            // Kembalikan respons sukses
            return redirect()
                ->route('Umkm.index')->with('success', 'Data pegawai berhasil diperbarui.');
        } catch (Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Umkm::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Customer Sudah dihapus');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
