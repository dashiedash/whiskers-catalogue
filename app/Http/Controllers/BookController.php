<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show all books
    public function index()
    {
        return view('layout.index', [
            'books' => Book::latest()->paginate(10)
        ]);
    }

    // Show a single book
    public function show($id)
    {
        $book = Book::find($id);
        return view('layout.book', [
            'book' => $book
        ]);
    }
}
