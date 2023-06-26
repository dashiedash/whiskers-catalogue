<?php

namespace App\Http\Controllers\Api\v010;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Filters\v010\BookFilters;
use Database\Factories\BookFactory;
use App\Http\Controllers\Controller;
use App\Http\Resources\v010\BookResource;
use App\Http\Resources\v010\BookCollection;
use App\Http\Requests\V010\StoreBookRequest;

class BookController extends Controller
{
    // Show all books
    public function index(Request $request)
    {
        $filter = new BookFilters();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new BookCollection(Book::paginate());
        } else {
            $books = Book::where($queryItems)->paginate();
            return new BookCollection($books->append($request->query()));
        }
    }

    // Store book
    public function store(StoreBookRequest $request)
    {
        return new BookResource(Book::create($request->all()));
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
