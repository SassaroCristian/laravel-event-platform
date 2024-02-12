<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventApiController extends Controller
{
    public function jsonEvents()
    {
        $events = Event::with('tags')->get();

        return response()->json($events);
    }
}
