<?php

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

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
Route::get('/', [BookController::class, 'index'])->name('home');

// Setup Admin User
Route::get('/setup', function () {
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'SuperSecurePassword1983'
    ];

    if (!Auth::attempt($credentials)) {
        $user = new \App\Models\User();

        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            $updateToken = $user->createToken('update-token', ['create', 'update']);
            $basicToken = $user->createToken('basic-token', ['none']);

            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'basic' => $basicToken->plainTextToken,
            ];
        }
    }
});

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
Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Edit Books
Route::put('/book/{id}', [BookController::class, 'update'])->name('books.update');

// Delete books
Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('books.destroy');

// Delete Cart Item
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.remove');

// Submit Payment Form
Route::post('pay', [PaymentController::class, 'pay'])->name('paypal.payment');

// Successful Payment
Route::get('/success', [PaymentController::class, 'success'])->name('paypal.success');

// Erroneous Payment
Route::get('error', [PaymentController::class, 'error'])->name('paypal.error');



// Show cart
Route::get('/{name}/cart', [CartController::class, 'show']);



// Single Listing
Route::get('/book/{id}', [BookController::class, 'show'])->name('books.show');
