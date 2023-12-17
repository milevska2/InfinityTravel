<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccommidationController extends Controller
{
    public function getAllAccommodationsByDestination($destination)
    {

        $accommodations = Accommodation::where('destination', $destination)->get();

        return response()->json($accommodations);


    }
    public function getAllAccommodationsByType($type)
    {

        $accommodations = Accommodation::where('type', $type)->get();

        return response()->json($accommodations);
    }

    public function getAccommodationDetails($id)
    {
        // Retrieve accommodation details by ID
        $accommodation = Accommodation::find($id);

        if (!$accommodation) {
            // If accommodation is not found, return an error response
            return response()->json(['error' => 'Accommodation not found'], 404);
        }

        return response()->json($accommodation);
    }

    public function getPriceList($id)
    {
        // Retrieve accommodation details by ID
        $accommodation = Accommodation::find($id);

        if (!$accommodation) {
            // If accommodation is not found, return an error response
            return response()->json(['error' => 'Accommodation not found'], 404);
        }

        // Retrieve price information from related offers
        $priceList = $accommodation->offers;

        return response()->json(['price_list' => $priceList]);
    }

}
