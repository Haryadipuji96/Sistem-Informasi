<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TeamRegistration;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Menampilkan daftar event
    public function index()
    {
        $events = Event::all();  // Ambil semua event
        return view('page.events.index', compact('events'));  // Tampilkan ke view
    }

    // Menampilkan detail event
    public function show(String $id)
    {
        $events = Event::where('id', $id)->first();
        return view('page.events.show')->with(
            ['events' => $events]
        );  // Tampilkan detail event
    }

    public function create()
    {
        return view('page.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
        ]);

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    // Menampilkan form pendaftaran tim
    public function edit(String $id)
    {
        $event = Event::where('id', $id)->first();
        return view('page.events.register')->with(
            ['event' => $event]
        );  // Tampilkan detail event
    }

    // Menyimpan pendaftaran tim
    public function update(Request $request, String $id)
    {
        $validated = $request->validate([
            'village_name' => 'required|string',
            'team_name' => 'required|string',
            'contact_person' => 'required|string',
            'members' => 'required|array',
            'members.*.name' => 'required|string',
            'members.*.age' => 'required|integer',
        ]);

        // Simpan data pendaftaran tim
        $teamRegistration = TeamRegistration::create([
            'event_id' => $id,
            'village_name' => $validated['village_name'],
            'team_name' => $validated['team_name'],
            'contact_person' => $validated['contact_person'],
        ]);

        // Simpan anggota tim
        foreach ($validated['members'] as $member) {
            TeamMember::create([
                'team_registration_id' => $teamRegistration->id,
                'name' => $member['name'],
                'age' => $member['age'],
            ]);
        }

        return redirect()->route('events.show', $id);  // Redirect ke halaman event
    }

    public function teams(Event $event)
    {
        // dd($event->id);
        $teams = TeamRegistration::where('event_id', $event->id)->paginate(5);
        // dd($teams);
        return view('page.events.teamsMembers', compact('event', 'teams'));
    }
}
