<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni tutti gli eventi dal database
        $events = Event::all();

        // Passa i dati degli eventi alla vista 'events.index'
        return view('admin.events.index', compact('events'));
    }
    public function jsonEvents()
    {
        // Ottieni tutti gli eventi dal database
        $events = Event::all();

        // Restituisci gli eventi in formato JSON
        return response()->json($events);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view("admin.events.create", compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati (se necessario)

        // Salvataggio dell'evento nel database
        $event = new Event();
        $event->name = $request->input('name');
        $event->date = $request->input('date');
        $event->location = $request->input('location');
        $event->description = $request->input('description');
        $event->save();

        // Associali utilizzando il metodo attach()
        $tag = Tag::find($request->input('tag_id')); // Correzione qui
        $event->tags()->attach($tag);

        // Altre operazioni o reindirizzamenti dopo l'associazione del tag all'evento

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $tags = Tag::all(); // Recupera tutte le tag disponibili
        return view('admin.events.edit', compact('event', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'description' => 'required',
            'tags' => 'array',
        ]);

        // Aggiorna i campi dell'evento con i nuovi valori
        $event->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ]);

        // Sincronizza le tag dell'evento con quelle fornite dall'utente
        $event->tags()->sync($request->input('tags'));

        return redirect()->route('admin.events.index')->with('success', 'Evento modificato con successo.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Evento eliminato con successo.');
    }
}
