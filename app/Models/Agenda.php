<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas'; // Sesuaikan jika nama tabel Anda bukan default plural Laravel

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'status',
    ];
}
