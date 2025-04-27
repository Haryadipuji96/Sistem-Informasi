<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apbdes extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari nama model
    protected $table = 'apbdes';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'tahun',
        'jenis',
        'kategori',
        'jumlah',
        'keterangan',
    ];
}
