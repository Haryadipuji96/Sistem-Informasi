<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApbdesReport extends Model
{
    use HasFactory;

    protected $table = 'apbdes_reports'; // Nama tabel
    protected $fillable = ['kategori', 'keterangan', 'jumlah', 'tahun']; // Kolom yang bisa diisi
}
