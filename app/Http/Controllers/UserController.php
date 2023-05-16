<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login()
    {
        return view('layout.login-form');
    }

    public function create()
    {
        return view('layout.register-form');
    }

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required | confirmed | min:7',
        ]);

        // Hashing
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Loguin
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }
}
