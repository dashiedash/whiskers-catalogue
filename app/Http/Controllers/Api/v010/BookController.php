<?php

namespace App\Http\Controllers\Api\v010;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Database\Factories\BookFactory;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    // Show all books
    public function index()
    {
        return Book::all();
    }

    // Show a single book
    public function show($id)
    {
    }

    // Show create book form
    public function create()
    {
    }

    // Store book
    public function store(Request $request)
    {
    }

    // Show edit book form
    public function edit($id)
    {
    }

    // Update Book
    public function update(Request $request, $id)
    {
    }

    // Delete Book
    public function destroy(Book $book)
    {
    }
}
