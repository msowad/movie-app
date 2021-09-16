<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TVsViewModel extends ViewModel
{
    public function __construct(private array $popular, private array $topRated, private array $genres)
    {
        //
    }

    public function popular()
    {
        return $this->formatShows($this->popular);
    }

    public function topRated()
    {
        return $this->formatShows($this->topRated);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(fn($genre) => [$genre['id'] => $genre['name']]);
    }

    private function formatShows($shows)
    {
        return collect($shows)->map(function ($show) {
            $formattedGenres = collect($show['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($show)->merge([
                'poster_path'    => 'https://image.tmdb.org/t/p/w500' . $show['poster_path'],
                'vote_average'   => $show['vote_average'] * 10,
                'genres'         => $formattedGenres,
                'first_air_date' => Carbon::parse($show['first_air_date'])->format('M d, Y'),
            ]);
        });
    }
}
