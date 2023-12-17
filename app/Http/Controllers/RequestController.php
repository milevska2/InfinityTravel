<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::all();
        return view('requests.index', compact('requests'));
    }

    public function edit(Request $request)
    {
        return view('requests.edit', compact('request'));
    }

    public function update(HttpRequest $httpRequest, Request $request)
    {
        // Validate and update the request
        $request->update([
            'status' => $httpRequest->input('status'),
            // Add more fields as needed
        ]);

        return redirect()->route('requests.index')
            ->with('success', 'Request updated successfully');
    }

}
