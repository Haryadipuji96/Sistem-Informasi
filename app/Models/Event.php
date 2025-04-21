<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date'
    ];

    // Relasi: Event memiliki banyak TeamRegistration
    public function teamRegistrations()
    {
        return $this->hasMany(TeamRegistration::class);
    }

    // app/Models/Event.php
    public function teams()
    {
        return $this->hasMany(TeamMember::class);
    }

    // app/Models/Team.php
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
