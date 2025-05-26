<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Field yang boleh diisi saat create/update
    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
    ];
}
