<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
       'position',
       'address',
        'gender',
        'pendidikan',
    ];
    protected $table = 'DataPegawai'; // Sesuaikan dengan nama tabel di database
}

