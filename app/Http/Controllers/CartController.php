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
        $quantity = $request->input('quantity', 1);

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
        $cart->quantity = $quantity;

        $cart->save();

        return redirect()
            ->back()
            ->with('success', 'Book added to cart.');
    }

    // Remove book from Cart
    public function destroy($id)
    {
        $user = auth()->user();

        // Find the cart item belonging to the user
        $cartItem = Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        // If the cart item exists, delete it
        if ($cartItem) {
            $bookTitle = $cartItem->book->title; // Get the title of the book
            $cartItem->delete();

            return redirect()
                ->back()
                ->with('success', "$bookTitle removed from cart.");
        }

        // If the cart item doesn't exist, show an error message or handle the situation as needed
        return redirect()
            ->back()
            ->with('error', 'Book not found in cart.');
    }
}
