<?php

namespace Tests\Feature;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    /** @test */
    public function theMainPageShowsCorrectInfo()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular'     => $this->fakePopularMovies(),
            'https://api.themoviedb.org/3/movie/now_playing' => $this->fakeNowPlayingMovies(),
            'https://api.themoviedb.org/3/genre/movie/list'  => $this->fakeGenres(),
        ]);

        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
        $response->assertSee('Fake Movie');
        $response->assertSee('Adventure');
        $response->assertSee('Animation');
        $response->assertSee('Comedy');
        $response->assertSee('Action');
        $response->assertSee('Now Playing');
        $response->assertSee('Now Playing Fake Movie');
    }

    /** @test */
    public function theMoviePageShowsCorrectInfo()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/*' => $this->fakeSingleMovie(),
        ]);

        $response = $this->get(route('movies.show', 12345));

        $response->assertSuccessful();
        $response->assertSee('Fake Title');
        $response->assertSee('77%');
        $response->assertSee('Aug 12, 2021');
        $response->assertSee('Thriller');
        $response->assertSee('Horror');
        $response->assertSee('Fake Crew');
        $response->assertSee('Fake Actor');
        $response->assertSee('Fake');
    }

    /** @test */
    public function theSearchIsShowingCorrectInfo()
    {
        Http::fake([
            'https://api.themoviedb.org/3/search/movie?query=fake' => $this->fakeSearchMovie(),
        ]);

        Livewire::test('search-dropdown')
            ->assertDontSee('fake')
            ->set('search', 'fake')
            ->assertSee('1 day ago')
            ->assertSee('Fake Searched Movie');
    }

    private function fakeSearchMovie()
    {
        return Http::response([
            "page"          => 1,
            "results"       => [
                [
                    "adult"             => false,
                    "backdrop_path"     => "/pUc51UUQb1lMLVVkDCaZVsCo37U.jpg",
                    "id"                => 482373,
                    "original_language" => "en",
                    "original_title"    => "Fake Searched Movie",
                    "overview"          => "The Blind Man has been hiding out for several years in an isolated cabin and has taken in and raised a young girl orphaned from a devastating house fire. Their  ▶",
                    "popularity"        => 2935.743,
                    "poster_path"       => "/hRMfgGFRAZIlvwVWy8DYJdLTpvN.jpg",
                    "release_date"      => Carbon::yesterday(),
                    "title"             => "Fake Searched Movie",
                    "video"             => false,
                    "vote_average"      => 7.6,
                    "vote_count"        => 433,
                ],
            ],
            "total_pages"   => 68,
            "total_results" => 1352,
        ], 200);
    }

    private function fakeSingleMovie()
    {
        return Http::response([
            "adult"             => false,
            "backdrop_path"     => "/pUc51UUQb1lMLVVkDCaZVsCo37U.jpg",
            "budget"            => 10000000,
            "genres"            => [
                [
                    "id"   => 53,
                    "name" => "Thriller",
                ],
                [
                    "id"   => 27,
                    "name" => "Horror",
                ],
            ],
            "homepage"          => "https://www.fakemovie.com",
            "id"                => 12345,
            "imdb_id"           => "tt6246322",
            "original_language" => "en",
            "original_title"    => "Fake Title",
            "overview"          => "The Blind Man has been hiding out for several years",
            "popularity"        => 3347,
            "poster_path"       => "/hRMfgGFRAZIlvwVWy8DYJdLTpvN.jpg",
            "release_date"      => "2021-08-12",
            "revenue"           => 37000009,
            "runtime"           => 98,
            "status"            => "Released",
            "tagline"           => "Bad things happen to bad people.",
            "title"             => "Fake Title",
            "video"             => false,
            "vote_average"      => 7.7,
            "vote_count"        => 413,
            "credits"           => [
                "cast" => [
                    [
                        "name"          => "Fake Actor",
                        "original_name" => "Original Name",
                        "profile_path"  => "/h7ZoTwpELoz1IlIgx0ujoA2p9Sp.jpg",
                        "character"     => "The Fake Man",
                    ],
                ],
                "crew" => [
                    [
                        "name"         => "Fake Crew",
                        "profile_path" => "/8gssvwiPrFRuFRlr5ruKx68k1Jl.jpg",
                        "job"          => "Producer",
                    ],
                ],
            ],
            "videos"            => [
                "results" => [
                    [
                        "id"         => "5d1a1a9b30aa3163c6c5fe57",
                        "iso_639_1"  => "en",
                        "iso_3166_1" => "US",
                        "key"        => "rBxcF-r9Ibs",
                        "name"       => "JUMANJI: THE NEXT LEVEL - Official Trailer (HD)",
                        "site"       => "YouTube",
                        "size"       => 1080,
                        "type"       => "Trailer",
                    ],
                ],
            ],
            "images"            => [
                "backdrops" => [
                    [
                        "aspect_ratio" => 1.7777777777778,
                        "file_path"    => "/hreiLoPysWG79TsyQgMzFKaOTF5.jpg",
                        "height"       => 2160,
                        "iso_639_1"    => null,
                        "vote_average" => 5.388,
                        "vote_count"   => 4,
                        "width"        => 3840,
                    ],
                ],
            ],
        ], 200);
    }

    private function fakePopularMovies()
    {
        return Http::response([
            'results' => [
                [
                    "popularity"        => 406.677,
                    "vote_count"        => 2607,
                    "video"             => false,
                    "poster_path"       => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
                    "id"                => 419704,
                    "adult"             => false,
                    "backdrop_path"     => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
                    "original_language" => "en",
                    "original_title"    => "Fake Movie",
                    "genre_ids"         => [
                        1, 2, 3, 4,
                    ],
                    "title"             => "Fake Movie",
                    "vote_average"      => 6,
                    "overview"          => "Fake movie description. The near future, a time when both hope and hardships drive humanity to look to the stars and beyond. While a mysterious phenomenon menaces to destroy life on planet earth.",
                    "release_date"      => "2019-09-17",
                ],
            ],
        ], 200);
    }

    private function fakeNowPlayingMovies()
    {
        return Http::response([
            'results' => [
                [
                    "popularity"        => 406.677,
                    "vote_count"        => 2607,
                    "video"             => false,
                    "poster_path"       => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
                    "id"                => 419704,
                    "adult"             => false,
                    "backdrop_path"     => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
                    "original_language" => "en",
                    "original_title"    => "Now Playing Fake Movie",
                    "genre_ids"         => [
                        12,
                        18,
                        9648,
                        878,
                        53,
                    ],
                    "title"             => "Now Playing Fake Movie",
                    "vote_average"      => 6,
                    "overview"          => "Now playing fake movie description. The near future, a time when both hope and hardships drive humanity to look to the stars and beyond. While a mysterious phenomenon menaces to destroy life on planet earth.",
                    "release_date"      => "2019-09-17",
                ],
            ],
        ], 200);
    }

    public function fakeGenres()
    {
        return Http::response([
            'genres' => [
                [
                    "id"   => 1,
                    "name" => "Action",
                ],
                [
                    "id"   => 2,
                    "name" => "Adventure",
                ],
                [
                    "id"   => 3,
                    "name" => "Animation",
                ],
                [
                    "id"   => 4,
                    "name" => "Comedy",
                ],
                [
                    "id"   => 80,
                    "name" => "Crime",
                ],
                [
                    "id"   => 99,
                    "name" => "Documentary",
                ],
                [
                    "id"   => 18,
                    "name" => "Drama",
                ],
                [
                    "id"   => 10751,
                    "name" => "Family",
                ],
                [
                    "id"   => 14,
                    "name" => "Fantasy",
                ],
                [
                    "id"   => 36,
                    "name" => "History",
                ],
                [
                    "id"   => 27,
                    "name" => "Horror",
                ],
                [
                    "id"   => 10402,
                    "name" => "Music",
                ],
                [
                    "id"   => 9648,
                    "name" => "Mystery",
                ],
                [
                    "id"   => 10749,
                    "name" => "Romance",
                ],
                [
                    "id"   => 878,
                    "name" => "Science Fiction",
                ],
                [
                    "id"   => 10770,
                    "name" => "TV Movie",
                ],
                [
                    "id"   => 53,
                    "name" => "Thriller",
                ],
                [
                    "id"   => 10752,
                    "name" => "War",
                ],
                [
                    "id"   => 37,
                    "name" => "Western",
                ],
            ],
        ], 200);
    }
}
