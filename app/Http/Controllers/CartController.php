<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show page
    public function show($name)
    {
        return view('layout.cart');
    }
}
