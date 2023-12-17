<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    // Show the form for creating a new destination
    public function create()
    {
        // You can pass any necessary data to the view if needed
        return view('destinations.create');
    }

    // Store a newly created destination in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        Destination::create($request->all());

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully');
    }

    // Show the form for editing the specified destination
    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    // Update the specified destination in the database
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            
        ]);

        $destination->update($request->all());

        return redirect()->route('destinations.index')
            ->with('success', 'Destination updated successfully');
    }

    // Remove the specified destination from the database
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()->route('destinations.index')
            ->with('success', 'Destination deleted successfully');
    }
}
