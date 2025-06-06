<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_umkm',
        'pemilik',
        'alamat',
        'jenis_usaha',
        'jumlah_karyawan',
        'modal',
    ];
}