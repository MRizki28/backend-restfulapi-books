<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function () {
    Route::get('/books' ,[BookController::class, "index"]);
    Route::post('/books' ,[BookController::class, "store"]);
    Route::put('/books/{book}' ,[BookController::class, "show"]);
    Route::post('/books/{book}' ,[BookController::class, "update"]);
    Route::delete('/books/{book}' ,[BookController::class, "destroy"]);
    Route::get('/books/search', [BookController::class, "search"]);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
Route::get('/profile', function (Request $request) {
return auth()->user();
});
Route::post('/logout', [AuthController::class, 'logout']);
});