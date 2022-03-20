<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:100',
            'year' => 'required',
            'director' => 'required',
            'genre_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $movie = Movie::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'year' => $request->year,
            'director' => $request->director,
            'genre_id' => $request->genre_id,
            'user_id' => Auth::user()->id
        ]);

        return response()->json(['Movie is created successfully.', new MovieResource($movie)]);
    }

    public function update(Request $request, Movie $movie)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:100',
            'year' => 'required',
            'director' => 'required',
            'genre_id' => 'required'

        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $movie->title = $request->title;
        $movie->slug = $request->slug;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->genre_id = $request->genre_id;


        $movie->save();

        return response()->json(['Movie is updated!', new MovieResource($movie)]);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return response()->json('Movie is deleted.');
    }
}
