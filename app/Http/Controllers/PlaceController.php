<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function home(Place $place)
    {
        return view('places.home')->with(['posts' => $place->getByPlace()]);
    }
    
    public function index(Place $place)
    {
        return view('places.index')->with(['posts' => $place->getByPlace()]);
    }
}
