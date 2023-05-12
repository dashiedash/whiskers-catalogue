<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show all books
    public function index()
    {
        $genre = request('tag');

        $books = Book::latest()->when($genre, function ($query) use ($genre) {
            return $query->where('genre', $genre);
        })->paginate(10);

        return view('layout.index', compact('books'));
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
