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
        $searchQuery = request('search');

        $books = Book::latest()
            ->when($genre, function ($query) use ($genre) {
                return $query->where('genre', $genre);
            })
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where(function ($query) use ($searchQuery) {
                    $query
                        ->where('title', 'like', '%' . $searchQuery . '%')
                        ->orWhere('author_first_name', 'like', '%' . $searchQuery . '%')
                        ->orWhere('author_last_name', 'like', '%' . $searchQuery . '%');
                });
            })
            ->paginate(10);

        return view('layout.index', compact('books', 'searchQuery'));
    }

    // Show a single book
    public function show($id)
    {
        $book = Book::find($id);
        return view('layout.book', [
            'book' => $book,
        ]);
    }
}
