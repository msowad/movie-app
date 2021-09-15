<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TVViewModel extends ViewModel
{
    public function __construct(public array $tv)
    {
        //
    }

    public function tv()
    {
        return collect($this->tv)->merge([
            'poster_path'    => $this->tv['poster_path']
            ? 'https://image.tmdb.org/t/p/w500' . $this->tv['poster_path']
            : 'https:ui-avatars.com/api?size=500$background=5555&color=fff$name=' . $this->tv['poster_path'],
            'vote_average'   => $this->tv['vote_average'] * 10,
            'first_air_date' => Carbon::parse($this->tv['first_air_date'])->format('M d, Y'),
            'genres'         => collect($this->tv['genres'])->pluck('name')->implode(', '),
            'crew'           => collect($this->tv['credits']['crew'])
                ->where('profile_path', '!=', null)
                ->take(2),
            'creators'       => collect($this->tv['created_by'])
                ->map(function ($creator) {
                    return collect($creator)->merge([
                        'name'         => $creator['name'],
                        'profile_path' => $creator['profile_path']
                        ? 'https://image.tmdb.org/t/p/w45' . $creator['profile_path']
                        : 'https:ui-avatars.com/api?size=45$background=5555&color=fff$name=' . $creator['profile_path'],
                    ]);
                }),
            'video_key'      => array_key_exists('results', $this->tv['videos']) && count($this->tv['videos']['results']) > 0 ? $this->tv['videos']['results'][0]['key'] : null,
            'casts'          => collect($this->tv['credits']['cast'])->where('profile_path', '!=', null)->take(6),
            'extra_casts'    => count($this->tv['credits']['cast']) - 6,
            'images'         => collect($this->tv['images']['backdrops'])->take(12),
        ]);
    }
}
