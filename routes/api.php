<?php

use App\Http\Controllers\Api\v010\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [
        'prefix' => 'v010',
        'namespace' => 'App\Http\Controllers\Api\v010',
        'middleware' => 'auth:sanctum'
    ],
    function () {
        Route::apiResource('books', BookController::class);
    },
);
