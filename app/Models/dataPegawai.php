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
    protected $table = 'datapegawai'; // Sesuaikan dengan nama tabel di database
}

