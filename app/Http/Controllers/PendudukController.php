<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Illuminate\Log\log;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Kalau mau tampilkan PDF, gak perlu ambil data penduduk semua
            $pdfUrl = asset('storage/Statistik_Desa_Indrajaya.pdf');

            // Kirim URL PDF ke view
            return view('page.Penduduk.index', compact('pdfUrl'));
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }


}
