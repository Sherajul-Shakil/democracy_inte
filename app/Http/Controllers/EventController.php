<?php

// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Team;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('team')->get();
        return inertia('Events/Index', ['events' => $events]);
    }

    public function create()
    {
        $teams = Team::all();
        return inertia('Events/Create', ['teams' => $teams]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:155',
            'event_date' => 'required|date',
            'team_id' => 'required|exists:teams,id',
        ]);

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }
}