<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantuanSosial extends Model
{
     use HasFactory;

    protected $table = 'bantuan_sosial';

    protected $fillable = [
        'nama', 'nik', 'alamat', 'jenis_bantuan', 'tanggal_terima',
    ];
}
