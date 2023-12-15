<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function showMoviesList(): View {
        /*$dataJson = Movie::all();*/
        $dataJson = Movie::with('genre')->get();
        $movies = json_decode($dataJson);
        /*dd($movies);*/
        return view('movies.movies-list', ['movies' => $movies]);
    }

    public function showCurrentMovie(string $id): View {
        try {
            $movie = Movie::with('genre')->findOrFail($id);
            return view('movies.movie-details', ['movie' => $movie]);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
    }

    public function create(): View {
        $genres = Genre::pluck('name', 'id'); // Récupère tous les genres de la base de données
        return view("movies.edit-movie", compact('genres'));
    }

    public function store(Request $request): RedirectResponse {
        $rules = [
            'name' => 'required|string|max:255',
            'contenttype' => 'required',
            'description' => 'required',
            'contentrating' => 'required',
            'genre' => 'required|exists:genres,id',
            'poster' => 'required|string|max:255',
            'releaseddate' => 'required',
        ];
        $request->validate($rules);
        $movie = Movie::create([
            'url' => $request->url,
            'name' => $request->name,
            'contenttype' => $request->contenttype,
            'description' => $request->description,
            'contentrating' => $request->contentrating,
            'genre_id' => (int)$request->genre,
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
        $genres = Genre::pluck('name', 'id');
        return view('movies.edit-movie', ['movie' => $movie, 'genres' => $genres]);
    }

    public function update(Request $request, string $id) {
        $rules = [
            'name' => 'required|string|max:255',
            'contenttype' => 'required',
            'description' => 'required',
            'contentrating' => 'required',
            'genre' => 'required|exists:genres,id',
            'poster' => 'required|string|max:255',
            'releaseddate' => 'required',
        ];
        $request->validate($rules);
        $movie = Movie::find($id);
        $movie->update([
            'url' => $request->url,
            'name' => $request->name,
            'contenttype' => $request->contenttype,
            'description' => $request->description,
            'contentrating' => $request->contentrating,
            'genre_id' => $request->genre,
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
        return redirect(route('currentMovie', $movie->id))->with('success', 'Movie updated');
    }

    public function destroy(string $id) {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect(route('moviesList'))->with('success', 'Movie deleted');
    }

}
