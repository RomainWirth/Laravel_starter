<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/movies', [MovieController::class, 'showMoviesList'])->name('moviesList');

Route::get('/movies/{id}', [MovieController::class, 'showCurrentMovie'])->name('currentMovie');

Route::get('/new-movie', [MovieController::class, 'create'])->name('newMovie');

Route::post('/movies', [MovieController::class, 'store'])->name('saveMovie');

Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('deleteMovie');
