<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
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

// Route::resource('products', ProductController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/all-movie', [MovieController::class, 'index']);
Route::get('/movielist', [MovieController::class, 'indexAPI']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/add-movie', [MovieController::class, 'store']);
    Route::put('/movie/{id}', [MovieController::class, 'update']);
    Route::delete('/movie/{id}', [MovieController::class, 'destroy']);
    Route::post('/m/logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
