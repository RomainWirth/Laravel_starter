<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/new-movie', [MovieController::class, 'create'])->middleware(['auth', 'verified'])->name('newMovie');
Route::post('/movies', [MovieController::class, 'store'])->middleware(['auth', 'verified'])->name('saveMovie');

Route::get('/movies/{id}/edit',[MovieController::class, 'edit'])->middleware(['auth', 'verified'])->name('editMovie');
Route::put('/movies/{id}', [MovieController::class, 'update'])->middleware(['auth', 'verified'])->name('updateMovie');

Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->middleware(['auth', 'verified'])->name('deleteMovie');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
