<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Movie;

class MovieController extends Controller
{
    public function showMoviesList(): view {
        $movies = Movie::all();
        echo $movies;
        return view('movies-list');
    }

    public function showCurrentMovie(string $id): view {
        return view('movie-details', [
            'id' => $id
        ]);
    }
}
