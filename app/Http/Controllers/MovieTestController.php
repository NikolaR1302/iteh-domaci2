<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieTestController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return $movies;
    }

    public function show(Movie $movie)
    {
        //$movie = Movie::find($id);
        return new MovieResource($movie);
    }
}
