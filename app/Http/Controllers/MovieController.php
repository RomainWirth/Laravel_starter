<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function showMoviesList(): view {
        $dataJson = Movie::all();
        $movies = json_decode($dataJson);
        return view('movies-list', ['movies' => $movies]);
    }

    public function showCurrentMovie(string $id): view {
        $movie = Movie::find($id);
        /*dd($movie);*/
        return view('movie-details', ['movie' => $movie]);
    }

    public function store(Request $request): RedirectResponse {
        $movie = $request->input('');
        return redirect('/movie');
    }
}
