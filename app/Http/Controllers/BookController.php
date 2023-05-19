<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Database\Factories\BookFactory;

class BookController extends Controller
{
    // Show all books
    public function index()
    {
        $genre = request('tag');
        $searchQuery = request('search');

        if ($searchQuery) {
            $searchQuery = urldecode($searchQuery);
            $searchQuery = str_replace('+', ' ', $searchQuery);
        }

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
        return view('books.book', [
            'book' => $book,
        ]);
    }

    // Show create book form
    public function create()
    {
        $genres = BookFactory::GENRES;

        return view('books.create', compact('genres'));
    }

    // Store book
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'author_last_name' => 'required',
            'author_first_name' => 'required',
            'publish_year' => 'required',
            'title' => 'required',
            'genre' => 'required',
            'publisher' => 'required',
            'publish_city' => 'required',
            'publish_state' => 'required',
            'publish_country' => 'required',
            'description' => 'required',
            'isbn' => ['required', Rule::unique('books', 'isbn')],
            'stock' => 'required',
            'price' => 'required'
        ]);

        return redirect('/');
    }
}
