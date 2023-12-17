<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function getCurrentOffers()
    {

        $selectedOffers = Offer::where('selected_by_admin', true)->get();

        return response()->json($selectedOffers);
    }

    public function getOfferDetails($id)
    {
        // Retrieve the offer by ID
        $offer = Offer::find($id);

        if (!$offer) {
            // Handle the case where the offer is not found
            return response()->json(['error' => 'Offer not found'], 404);
        }

        return response()->json($offer);
    }
}
