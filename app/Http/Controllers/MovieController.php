<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
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

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.base_url') . '/genre/movie/list')
            ->json()['genres'];

        return view('index', new MoviesViewModel($popularMovies, $nowPlayingMovies, $genres));
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

        return view('show', new MovieViewModel($movie));
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
