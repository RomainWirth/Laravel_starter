<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function showMoviesList(): string {
        return 'Liste de films';
    }

    public function showCurrentMovie(string $id): string {
        return 'Fiche du film '.$id;
    }
}
