<?php

namespace App\Http\Controllers\Api\v010;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\v010\BookQuery;
use Database\Factories\BookFactory;
use App\Http\Controllers\Controller;
use App\Http\Resources\v010\BookResource;
use App\Http\Resources\v010\BookCollection;

class BookController extends Controller
{
    // Show all books
    public function index(Request $request)
    {
        $filter = new BookQuery();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new BookCollection(Book::paginate());
        } else {
            return new BookCollection(Book::where($queryItems)->paginate());
        }
    }

    // Show a single book
    public function show(Book $book)
    {
        return new BookResource($book);
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