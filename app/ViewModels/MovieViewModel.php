<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public function __construct(public array $movie)
    {
        //
    }

    public function movie()
    {
        return collect($this->movie)->merge([
            'poster_path'  => 'https://image.tmdb.org/t/p/w500' . $this->movie['poster_path'],
            'vote_average' => $this->movie['vote_average'] * 10,
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres'       => collect($this->movie['genres'])->pluck('name')->implode(', '),
            'crew'         => collect($this->movie['credits']['crew'])
                ->where('profile_path', '!=', null)
                ->take(2),
            'video_key'    => array_key_exists('results', $this->movie['videos']) && count($this->movie['videos']['results']) > 0 ? $this->movie['videos']['results'][0]['key'] : null,
            'casts'        => collect($this->movie['credits']['cast'])->where('profile_path', '!=', null)->take(6),
            'extra_casts'  => count($this->movie['credits']['cast']) - 6,
            'images'       => collect($this->movie['images']['backdrops'])->take(12),
        ])
            ->only(
                'genres', 'homepage', 'id',
                'overview', 'poster_path', 'release_date',
                'title', 'vote_average', 'images',
                'crew', 'images', 'video_key',
                'casts', 'extra_casts'
            );
    }
}
