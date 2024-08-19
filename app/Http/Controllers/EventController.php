<?php

// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        return inertia('Events/CreateOrUpdate', ['teams' => $teams]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:155',
            'event_date' => 'required|date||before_or_equal:today',
            'team_id' => 'required|exists:teams,id',
        ]);

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        $teams = Team::all();
        return inertia('Events/CreateOrUpdate', [
            'event' => $event,
            'teams' => $teams
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|max:155',
            'event_date' => 'required|date|before_or_equal:today',
            'team_id' => 'required|exists:teams,id',
        ]);

        $event->update($validated);
        return Redirect::route('events.index');
    }
}