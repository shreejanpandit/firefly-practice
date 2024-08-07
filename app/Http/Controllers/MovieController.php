<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        // dd($movie->first()->name);
        return view('home', ["movies" => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        // dd($request['name']);
        Movie::create([
            'name' => $request['name']
        ]);
        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): string
    {
        // dd($id);
        return "movie with id " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie): View
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $movie->update($validatedData);
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}
