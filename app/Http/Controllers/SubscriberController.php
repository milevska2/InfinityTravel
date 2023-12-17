<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Create a new subscriber
        $subscriber = Subscriber::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return response()->json(['message' => 'Subscription successful', 'subscriber' => $subscriber], 201);
    }
}
