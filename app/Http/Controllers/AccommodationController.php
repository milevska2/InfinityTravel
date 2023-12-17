<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all();
        return view('accommodations.index', compact('accommodations'));
    }

    public function create()
    {
        return view('accommodations.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string',
            'region' => 'required|string',
            'cover_photo' => 'required|url', // Assuming cover_photo is a URL
            'is_last_minute' => 'required|boolean',
            'type' => 'required|string',
            // Add more fields as needed
        ]);

        // Create the accommodation
        Accommodation::create($request->all());

        return redirect()->route('accommodations.index')
            ->with('success', 'Accommodation created successfully');
    }

    public function edit(Accommodation $accommodation)
    {
        return view('accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request, Accommodation $accommodation)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string',
            'region' => 'required|string',
            'cover_photo' => 'required|url',
            'is_last_minute' => 'required|boolean',
            'type' => 'required|string',

        ]);

        // Update the accommodation
        $accommodation->update($request->all());

        return redirect()->route('accommodations.index')
            ->with('success', 'Accommodation updated successfully');
    }

    public function destroy(Accommodation $accommodation)
    {
        $accommodation->delete();

        return redirect()->route('accommodations.index')
            ->with('success', 'Accommodation deleted successfully');
    }

    public function __construct()
{
    $this->middleware('auth'); // Requires authentication for all methods
    $this->middleware('admin,editor')->except('index', 'show'); // Requires admin role for create, store, edit, update, and destroy methods
}
}
