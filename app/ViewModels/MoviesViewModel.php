<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public function __construct(public $popularMovies, public $nowPlayingMovies, public $genres)
    {

    }

    public function popularMovies()
    {
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies()
    {
        return $this->formatMovies($this->nowPlayingMovies);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(fn($genre) => [$genre['id'] => $genre['name']]);
    }

    private function formatMovies($movies)
    {
        return collect($movies)->map(function ($movie) {
            $formattedGenres = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path'  => 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10,
                'genres'       => $formattedGenres,
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
            ]);
        });
    }
}
