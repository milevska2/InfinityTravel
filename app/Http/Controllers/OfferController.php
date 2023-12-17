<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    // Display a listing of the offers
    public function index()
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    // Show the form for creating a new offer
    public function create()
    {
        // You can pass any necessary data to the view if needed
        return view('offers.create');
    }

    // Store a newly created offer in the database
    public function store(Request $request)
    {
        $request->validate([

                'accommodation_id' => 'required|exists:accommodations,id',
                'selected_by_admin'=>'required|',
               'dates' => 'required|date',
                'price' => 'required|integer',

        ]);

        Offer::create($request->all());

        $subscribers = Subscriber::all();
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new OfferAdded($offer));
        }

        return redirect()->route('offers.index')
            ->with('success', 'Offer created successfully');
    }

    // Display the specified offer
    public function show(Offer $offer)
    {
        return view('offers.show', compact('offer'));
    }

    // Show the form for editing the specified offer
    public function edit(Offer $offer)
    {
        return view('offers.edit', compact('offer'));
    }

    // Update the specified offer in the database
    public function update(Request $request, Offer $offer)
    {
            $request->validate([
                'accommodation_id' => 'required|exists:accommodations,id',
                'dates' => 'required|date',
                'price' => 'required|integer',

        ]);

        $offer->update($request->all());

        return redirect()->route('offers.index')
            ->with('success', 'Offer updated successfully');
    }

    // Remove the specified offer from the database
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('offers.index')
            ->with('success', 'Offer deleted successfully');
    }

    
}
