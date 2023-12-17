<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        // Validate request

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'role' => request('role'), // Make sure to validate the role to prevent unauthorized roles
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }
}
