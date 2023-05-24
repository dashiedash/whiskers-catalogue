<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show page
    public function show($name)
    {
        $user = User::where('name', $name)->first();
        $cartItems = $user
            ->cartItems()
            ->with('book')
            ->get();
        return view('layout.cart', compact('cartItems'));
    }

    // Add book to Cart
    public function store(Request $request)
    {
        $user = auth()->user();
        $bookId = $request->input('book_id');

        // Check if the book already exists in the cart
        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('book_id', $bookId)
            ->first();

        // If the book already exists, show a message or handle the situation as needed
        if ($existingCartItem) {
            return redirect()
                ->back()
                ->with('error', 'Book is already in the cart.');
        }

        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->book_id = $bookId;

        $cart->save();

        return redirect()
            ->back()
            ->with('success', 'Book added to cart.');
    }
}
