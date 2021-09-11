<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.base_url') . '/movie/popular')
            ->json()['results'];

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.base_url') . '/movie/now_playing')
            ->json()['results'];

        $genresArr = Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.base_url') . '/genre/movie/list')
            ->json()['genres'];

        $genres = collect($genresArr)->mapWithKeys(fn($genre) => [$genre['id'] => $genre['name']]);
        return view('index', compact('popularMovies', 'genres', 'nowPlayingMovies'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.base_url') . "/movie/$id?append_to_response=credits,images,videos")
            ->json();

        return view('show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
