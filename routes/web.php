<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MovieController::class, "index"]);

Route::get('/movie', [MovieController::class, "see"]);

Route::get('/movie/add', [MovieController::class, "add"]);
Route::post('/movie/add', [MovieController::class, "store"]);

Route::get('/movie/edit/{id}', [MovieController::class, "edit"]);
Route::put('/movie/edit/{id}', [MovieController::class, "update"]);

Route::delete('/movie/{id}', [MovieController::class, "drop"]);

// Api
Route::get('/api', [MovieController::class, "seeApi"]);
Route::get('/api/{id}', [MovieController::class, "seeApiId"]);
Route::post('/api', [MovieController::class, "addApi"]);
Route::delete('/api/{id}', [MovieController::class, "dropApiId"]);
Route::put('/api/{id}', [MovieController::class, "editApi"]);



