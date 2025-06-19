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
        return view('page.Events.index', compact('events'));  // Tampilkan ke view
    }

    // Menampilkan detail event
    public function show($id)
    {
        // Ambil event berdasarkan ID
        $events = Event::findOrFail($id);

        // Kirim data ke view
        return view('page.Events.show', compact('events'));
    }

    public function create()
    {
        return view('page.Events.create');
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
        return view('page.Events.register')->with(
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
            'members.*.birth_date' => 'required|date',  // Ganti age dengan birth_date dan validasi sebagai date
        ]);

        // Simpan data pendaftaran tim
        $teamRegistration = TeamRegistration::create([
            'event_id' => $id,
            'village_name' => $validated['village_name'],
            'team_name' => $validated['team_name'],
            'contact_person' => $validated['contact_person'],
        ]);

        // Simpan anggota tim dengan birth_date
        foreach ($validated['members'] as $member) {
            TeamMember::create([
                'team_registration_id' => $teamRegistration->id,
                'name' => $member['name'],
                'birth_date' => $member['birth_date'],  // Simpan tanggal lahir, bukan usia
            ]);
        }

        return redirect()->route('events.show', $id);  // Redirect ke halaman event
    }

    public function teams(Event $event)
    {
        // dd($event->id);
        $teams = TeamRegistration::where('event_id', $event->id)->paginate(5);
        // dd($teams);
        return view('page.Events.teamsMembers', compact('event', 'teams'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus.');
    }
}
