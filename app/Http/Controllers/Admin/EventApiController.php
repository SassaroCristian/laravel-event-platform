<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventApiController extends Controller
{
    public function jsonEvents()
    {
        // Ottieni tutti gli eventi dal database
        $events = Event::all();

        // Restituisci gli eventi in formato JSON
        return response()->json($events);
    }
}
