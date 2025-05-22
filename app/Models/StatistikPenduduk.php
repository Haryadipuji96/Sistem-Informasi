<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikPenduduk extends Model
{
    use HasFactory;

    protected $table = 'statistik_penduduk';

    protected $fillable = [
        'bulan',
        'jumlah_penduduk',
        'laki_laki',
        'perempuan',
        'kepala_keluarga',
    ];
}
