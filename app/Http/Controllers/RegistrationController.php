<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        // This is the registration form view
        return view('auth.register');
    }

    public function __construct()
{
    $this->middleware('auth'); // Requires authentication for all methods
    $this->middleware('admin')->only('create', 'store'); // Requires admin role for create and store methods
}

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        // Create the user with 'editor' role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'editor',
        ]);

        // Redirect or do something else after registration
        return redirect()->route('login')->with('success', 'Registration successful!');



    }
}
