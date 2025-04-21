<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamRegistration extends Model
{

    use HasFactory;

    protected $fillable = [
        'event_id', 'village_name', 'team_name', 'contact_person'
    ];

    // Relasi: TeamRegistration milik satu Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relasi: TeamRegistration memiliki banyak TeamMember
    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }
}
