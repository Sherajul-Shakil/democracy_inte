<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        // dd($teams);
        return inertia('Teams/Index', ['teams' => $teams]);
    }

    public function create()
    {
        return inertia('Teams/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Team::create($validated);

        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }


}