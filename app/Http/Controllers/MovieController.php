<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function showMoviesList(): view {
        return view('movies-list');
    }

    public function showCurrentMovie(string $id): view {
        return view('movie-details', [
            'id' => $id
        ]);
    }
}
