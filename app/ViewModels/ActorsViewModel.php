<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ActorsViewModel extends ViewModel
{
    public function __construct(public array $actors, public int $page)
    {
        //
    }

    public function actors()
    {
        return collect($this->actors)->map(function ($actor) {
            $knownFor = collect($actor['known_for']);

            return collect($actor)->merge([
                'profile_path' => $actor['profile_path']
                ? 'https://image.tmdb.org/t/p/w500' . $actor['profile_path']
                : 'https:ui-avatars.com/api?size=500$background=5555&color=ff$name=' . $actor['profile_path'],
                'url'          => route('actors.show', $actor['id']),
                'known_for'    => $knownFor
                    ->where('media_type', 'movie')
                    ->pluck('title')
                    ->union(
                        $knownFor->where('media_type', 'tv')->pluck('name')
                    )
                    ->implode(', '),
            ])->only('profile_path', 'url', 'name', 'id', 'known_for');
        });
    }

    public function prev()
    {
        return $this->page > 1 ? $this->page - 1 : null;
    }

    public function next()
    {
        return $this->page < 500 ? $this->page + 1 : null;
    }
}
