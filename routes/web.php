<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

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
Route::get('/', [BookController::class, 'index'])->name('layout.index');

// Login Page
Route::get('/login', [UserController::class, 'login'])->name('login');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

// Logout User
Route::post('/logout', [UserController::class, 'logout']);

// Registration Page
Route::get('/register', [UserController::class, 'create'])->name('register');

// Create New User
Route::post('/users', [UserController::class, 'store'])->name('register');

// Show Book Creation Form
Route::get('/book/create', [BookController::class, 'create'])->name('book-create');

// Store books
Route::post('/book', [BookController::class, 'store']);

// Add book to cart
Route::post('/cart', [CartController::class, 'store']);

// Show Edit Form
Route::get('/book/{id}/edit', [BookController::class, 'edit']);

// Edit Books
Route::put('/book/{id}', [BookController::class, 'update'])->name('books.update');




// Show cart
Route::get('/{name}/cart', [CartController::class, 'show']);



// Single Listing
Route::get('/book/{id}', [BookController::class, 'show'])->name('books.show');
