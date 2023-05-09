<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Store Page
Route::get('/', function () {
    return view('/layout/index', [
        'books' => Book::all()
    ]);
});



// Single Listing
Route::get('/book/{id}', function ($id) {
    return view('layout.book', [
        'book' => Book::find($id)
    ]);
});
