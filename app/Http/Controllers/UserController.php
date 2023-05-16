<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
