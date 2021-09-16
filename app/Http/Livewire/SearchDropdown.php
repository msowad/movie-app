<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search  = '';
    public $results = [];

    public function render()
    {
        return view('livewire.search-dropdown');
    }

    public function resetSearch()
    {
        $this->search = '';
    }

    public function updatedSearch()
    {
        if (strlen($this->search) > 1) {
            $results = Http::withToken(config('services.tmdb.token'))
                ->get(config('services.tmdb.base_url') . '/search/multi?query=' . $this->search)
                ->json()['results'];

            $this->results = collect($results)->map(function ($result) {
                $image = isset($result['poster_path']) ? $result['poster_path']
                : (isset($result['profile_path']) ? $result['profile_path'] : null);

                $releaseDate = isset($result['release_date']) ? $result['release_date']
                : (isset($result['first_air_date']) ? $result['first_air_date'] : null);

                $routeName = $result['media_type'] == 'tv' ? 'tv'
                : ($result['media_type'] == 'person' ? 'actors' : 'movies');

                return collect($result)->merge([
                    'title'        => isset($result['title']) ? $result['title']
                    : (isset($result['name']) ? $result['name'] : 'Untitled'),
                    'vote_average' => isset($result['vote_average']) ? $result['vote_average'] * 10 : null,
                    'release_date' => $releaseDate ? Carbon::parse($releaseDate)->diffForHumans() : null,
                    'image'        => $image ? "https://image.tmdb.org/t/p/w45/$image" : null,
                    'popularity'   => isset($result['popularity']) ? $result['popularity'] : null,
                    'url'          => route($routeName . '.show', $result['id']),
                ]);
            });
        } else {
            $this->results = [];
        }
    }
}
