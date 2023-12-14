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
/*        Genre::create(['name' => 'Competition Reality TV']);
        Genre::create(['name' => 'Documentaries']);
        Genre::create(['name' => 'Dramas']);
        Genre::create(['name' => 'Family Features']);
        Genre::create(['name' => 'Family Watch Together TV']);
        Genre::create(['name' => 'Fantasy TV Shows']);
        Genre::create(['name' => 'Horror TV Serials']);
        Genre::create(['name' => 'Movies Based on Books']);
        Genre::create(['name' => 'Movies Based on Real Life']);
        Genre::create(['name' => 'Music & Musicals']);
        Genre::create(['name' => 'Period Pieces']);
        Genre::create(['name' => 'Political Documentaries']);
        Genre::create(['name' => 'Romantic Movies']);
        Genre::create(['name' => 'Romantic TV Comedies']);
        Genre::create(['name' => 'Sci-Fi & Fantasy Anime']);
        Genre::create(['name' => 'Sci-Fi Movies']);
        Genre::create(['name' => 'Sitcoms']);
        Genre::create(['name' => 'Social Issue Dramas']);
        Genre::create(['name' => 'Stand-Up Comedy']);
        Genre::create(['name' => 'Teen Movies']);
        Genre::create(['name' => 'True Crime Documentaries']);
        Genre::create(['name' => 'TV Action & Adventure']);
        Genre::create(['name' => 'TV Cartoons']);
        Genre::create(['name' => 'TV Comedies']);
        Genre::create(['name' => 'TV Dramas']);
        Genre::create(['name' => 'TV Mysteries']);
        Genre::create(['name' => 'TV Shows Based on Books']);
        Genre::create(['name' => 'TV Shows Based on Manga']);
        Genre::create(['name' => 'TV Thrillers']);
        Genre::create(['name' => 'US Movies']);
        Genre::create(['name' => 'Wedding & Romance Reality TV']);
        Genre::create(['name' => 'Westerns']);*/

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
            'genre_id' => (int)$request->genre_id,
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
            'genre_id' => 'required|exists:genres,id',
            'poster' => 'required|string|max:255',
            'releaseddate' => 'required',
        ];
        $request->validate($rules);
        $movie = Movie::find($id);
        $movie->update($request->all()
        /*[
            'url' => $request->url,
            'name' => $request->name,
            'contenttype' => $request->contenttype,
            'description' => $request->description,
            'contentrating' => $request->contentrating,
            'genre_id' => $request->genre_id,
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
        ]*/
        );
        return redirect(route('currentMovie', $movie->id))->with('success', 'Movie updated');
    }

    public function destroy(string $id) {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect(route('moviesList'))->with('success', 'Movie deleted');
    }

}
