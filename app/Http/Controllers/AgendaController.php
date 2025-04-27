<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::all();
        return view('page.agendas.index', compact('agendas'));
    }


    public function create()
    {
        return view('page.agendas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
        ]);

        Agenda::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
        ]);

        return redirect()->route('agendas.index')->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'status' => 'required|in:aktif,selesai',
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'status' => $request->status,
        ]);

        return redirect()->route('agendas.index')->with('success', 'Agenda berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id); // Mencari agenda berdasarkan id
        $agenda->delete(); // Menghapus agenda

        return redirect()->route('agendas.index')->with('success', 'Agenda berhasil dihapus!');
    }
}
