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
        $rules = [
            'name' => 'required|string|max:255',
            'contenttype' => 'required',
            'description' => 'required',
            'contentrating' => 'required',
            'genre' => 'required',
            'poster' => 'required|string|max:255',
            'releaseddate' => 'required',
        ];

        $this->validate($request, $rules);

        $movie = Movie::create([
            'url' => $request->url,
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
            'subtitle' => $request->subtitle,
            'numberofseasons' => $request->numberofseasons,
            'seasonstartdate' => $request->seasonstartdate,
        ]);

        return redirect(route('currentMovie', $movie->id ));
    }

    public function show(Movie $movie) {
        return view('movies.movie-details', ['movie' => $movie]);
    }

    public function edit(String $id): view {
        $movie = Movie::find($id);
        return view('movies.edit-movie', ['movie' => $movie]);
    }

    public function update(Request $request, Movie $movie) {
        $rules = [
            'name' => 'required|string|max:255',
            'contenttype' => 'required',
            'description' => 'required',
            'contentrating' => 'required',
            'genre' => 'required',
            'poster' => 'required|string|max:255',
            'releaseddate' => 'required',
        ];
        $this->validate($request, $rules);
        $movie->update([
            'url' => $request->url,
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
            'subtitle' => $request->subtitle,
            'numberofseasons' => $request->numberofseasons,
            'seasonstartdate' => $request->seasonstartdate,
        ]);
    }

    public function destroy(string $id) {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect(route('moviesList'))->with('success', 'Movie deleted');
    }

}
