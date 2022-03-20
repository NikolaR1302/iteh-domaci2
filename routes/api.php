<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieTestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMovieController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('movies/{id}', [MovieTestController::class, 'show']);
// Route::get('movies', [MovieTestController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

// Route::resource('movies', MovieController::class);

// Route::get('/users/{id}/movies', [UserMovieController::class, 'index'])->name('users.movies.index');

Route::resource('users.movies', UserMovieController::class)->only(['index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('movies', MovieController::class)->only(['update', 'store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('movies', MovieController::class)->only(['index']);
