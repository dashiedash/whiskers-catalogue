<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

// Login/Register Page
Route::get('/login', [UserController::class, 'login'])->name('login');

// Single Listing
Route::get('/book/{id}', [BookController::class, 'show']);
