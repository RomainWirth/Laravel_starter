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
        return view('movies.movies-list', ['movies' => $movies]);
    }

    public function showCurrentMovie(string $id): view {
        $movie = Movie::find($id);
        /*dd($movie);*/
        return view('movies.movie-details', ['movie' => $movie]);
    }

    public function create() {
        return view("movies.edit-movie");
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'contenttype' => 'required',
            'description' => 'required',
            'contentrating' => 'required',
            'genre' => 'required',
            'poster' => 'required|string|max:255',
            'releaseddate' => 'required',

        ]);

        $movie = Movie::create([
            'url' => '',
            'name' => $request->name,
            'contenttype' => $request->contenttype,
            'description' => $request->description,
            'contentrating' => $request->contentrating,
            'genre' => $request->genre,
            'poster' => $request->poster,
            'formattedduration' => $request->formattedduration,
            'releaseddate' => $request->releaseddate,
            'actors' => $request->actors,
            'director' => $request->director,
            'creator' => $request->creator,
            'audio' => $request->audio,
            'subtitle' => '',
            'numberofseasons' => '',
            'seasonstartdate' => ''
        ]);

        return redirect(route('movies.movie-details', $movie->id ));
    }

    public function show(Movie $movie) { }

    public function edit(Movie $movie) { }

    public function update(Request $request, Movie $movie) { }

    public function destroy(Movie $movie) { }

}
