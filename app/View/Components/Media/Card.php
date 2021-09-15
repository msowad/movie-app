<?php

namespace App\View\Components\Media;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $releaseDate;
    public $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Collection $media,
        public bool $showSpecification = true,
        public bool $showGenres = true
    ) {
        $this->title       = isset($media['title']) ? $media['title'] : $media['name'];
        $this->releaseDate = isset($media['release_date']) ? $media['release_date']
        : (isset($media['first_air_date']) ? $media['first_air_date'] : null);
        $routeName = isset($media['title']) ? 'movies' : 'tv';
        $this->url = route($routeName . '.show', $media['id']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.media.card');
    }
}
