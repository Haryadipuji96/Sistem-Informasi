<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita'; // Nama tabel (kalau beda dengan default plural)

    protected $fillable = ['title', 'tgl_berita', 'content'];
}
