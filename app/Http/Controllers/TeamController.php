<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\TeamRegistration;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function show(TeamMember $team)
    {
        $regist = TeamRegistration::where('id', $team->id)->first();
        $teams = TeamMember::where('team_registration_id', $team->id)->paginate(5);
        return view('page.teams.show', compact(['teams','regist']));
    }
}
