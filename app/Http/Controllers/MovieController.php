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

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create() {

    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request): RedirectResponse {
        $movie = $request->input('');
        return redirect('/movie');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Movie $movie) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Movie $movie) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Movie $movie) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Movie $movie) {
        //
    }
}
