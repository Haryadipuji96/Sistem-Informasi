<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');
            $query = DataPegawai::query();

            if ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            }

            $DataPegawai = $query->paginate(5); // Pagination dengan 5 item per halaman

            return view('page.DataPegawai.index', compact('DataPegawai'));
        } catch (Exception $e) {
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
            return view('page.DataPegawai.create');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat membuka formulir tambah data pegawai.']);
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
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'address' => 'required|string',
                'gender' => 'required|in:male,female',
                'pendidikan' => 'required|string|max:255',
            ]);

            // Simpan data ke database
            DataPegawai::create($validated);

            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('DataPegawai.index')->with('success', 'Data pegawai berhasil ditambahkan.');
        } catch (Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $pegawai = DataPegawai::findOrFail($id);
            return view('page.DataPegawai.show', compact('pegawai'));
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Data pegawai tidak ditemukan.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPegawai $employee)
    {
        try {
            return view('page.DataPegawai.edit', compact('employee'));
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat membuka formulir edit data pegawai.']);
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
                'edit_name' => 'required|string|max:255',
                'edit_position' => 'required|string|max:255',
                'edit_address' => 'required|string|max:255',
                'edit_gender' => 'required|in:male,female',
                'edit_pendidikan' => 'required|in:SLTA,D3,S1,S2,S3',
            ]);

            // Temukan data pegawai berdasarkan ID
            $pegawai = DataPegawai::find($id);

            if (!$pegawai) {
                return response()->json(['message' => 'Data tidak ditemukan'], 404);
            }

            // Perbarui data pegawai
            $pegawai->update([
                'name' => $validatedData['edit_name'],
                'position' => $validatedData['edit_position'],
                'address' => $validatedData['edit_address'],
                'gender' => $validatedData['edit_gender'],
                'pendidikan' => $validatedData['edit_pendidikan'],
            ]);

            // Kembalikan respons sukses
            return redirect()
                ->route('DataPegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
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
            $data = DataPegawai::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Customer Sudah dihapus');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
