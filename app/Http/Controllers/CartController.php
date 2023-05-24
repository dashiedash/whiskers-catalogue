<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show page
    public function show($name)
    {
        return view('layout.cart');
    }

    // Add book to Cart
    public function store(Request $request)
    {
        $user = auth()->user();
        $bookId = $request->input('book_id');

        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->book_id = $bookId;

        $cart->save();

        return redirect()
            ->back()
            ->with('success', 'Book added to cart.');
    }
}
