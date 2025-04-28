<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_registration_id', 'name', 'birth_date'
    ];

    // Relasi: TeamMember milik satu TeamRegistration
    public function teamRegistration()
    {
        return $this->belongsTo(TeamRegistration::class);
    }
}
