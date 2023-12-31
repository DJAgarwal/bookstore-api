<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,BookController};

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
Route::post('/login', [AuthController::class, 'login']);
Route::prefix('books')->middleware('auth:sanctum')->group(function () {
    Route::get('/index', [BookController::class, 'index']);
    Route::post('/', [BookController::class, 'store']);
    Route::get('/{id}', [BookController::class, 'details']);
    Route::delete('/{id}', [BookController::class, 'destroy']);
});
Route::get('/send-book-email', [BookController::class, 'sendBookEmail'])->middleware('auth:sanctum');
Route::get('/search', [BookController::class, 'search'])->middleware('auth:sanctum');