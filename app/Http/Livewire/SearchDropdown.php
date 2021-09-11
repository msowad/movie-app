<?php

namespace App\Http\Livewire;

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
            $this->results = Http::withToken(config('services.tmdb.token'))
                ->get(config('services.tmdb.base_url') . '/search/movie?query=' . $this->search)
                ->json()['results'];
        } else {
            $this->results = [];
        }
    }
}
