<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): view {
        return view('homepage', ['name' => 'Accueil']);
    }
}
