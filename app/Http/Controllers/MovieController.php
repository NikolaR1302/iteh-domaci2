<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        // return MovieResource::collection($movies);
        return new MovieCollection($movies);
    }

    public function show(Movie $movie)
    {
        //$movie = Movie::find($id);
        return new MovieResource($movie);
    }
}
