<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class MultiSearchTest extends TestCase
{

    /** @test */
    public function theSearchIsShowingCorrectInfo()
    {
        Http::fake([
            'https://api.themoviedb.org/3/search/multi?query=fake' => $this->fakeSearchResults(),
        ]);

        Livewire::test('search-dropdown')
            ->assertDontSee('fake')
            ->set('search', 'fake')
            ->assertSee('1 day ago')
            ->assertSee('Fake TV Show')
            ->assertSee('20%')
            ->assertSee('Fake Search Movie')
            ->assertSee('41%')
            ->assertSee('Fake Search Actor')
            ->assertSee('20.26');
    }

    private function fakeSearchResults()
    {
        return Http::response([
            "page"          => 1,
            "results"       => [
                [
                    "backdrop_path"     => "/qMFJgJrrSArM69NXLAPiWx7JCa1.jpg",
                    "first_air_date"    => Carbon::yesterday(),
                    "id"                => 14944,
                    "media_type"        => "tv",
                    "name"              => "Fake TV Show",
                    "original_language" => "en",
                    "original_name"     => "Fake TV Show",
                    "overview"          => "Fake TV Show is an American dramatic television series which was produced by NBC from January 30, 1950 until June 24, 1957. The live show had seve ▶",
                    "popularity"        => 29.122,
                    "poster_path"       => "/jZLS9pS4JGltYIB43c2UvXhqZqW.jpg",
                    "vote_average"      => 2,
                    "vote_count"        => 1,
                ],
                [
                    "adult"             => false,
                    "backdrop_path"     => "/5K2FuQN3nfMTfRlraWnXWZdmqJb.jpg",
                    "id"                => 586097,
                    "media_type"        => "movie",
                    "original_language" => "en",
                    "original_title"    => "Fake Search Movie",
                    "overview"          => "In 1951 USSR, as the Cold War intensifies, infamous dictator Joseph Stalin is suffering with illness and his death is imminent. Meanwhile, KGB agent Stoichkov d ▶",
                    "popularity"        => 30.282,
                    "poster_path"       => "/f8V2qB4ehyGCEMBsLPXDNiTvcx7.jpg",
                    "release_date"      => "2019-06-04",
                    "title"             => "Fake Search Movie",
                    "video"             => false,
                    "vote_average"      => 4.1,
                    "vote_count"        => 16,
                ],
                [
                    "adult"                => false,
                    "gender"               => 2,
                    "id"                   => 3223,
                    "known_for_department" => "Acting",
                    "media_type"           => "person",
                    "name"                 => "Fake Search Actor",
                    "popularity"           => 20.26,
                    "profile_path"         => "/5qHNjhtjMD4YWH3UP0rm4tKwxCL.jpg",
                ],
            ],
            "total_pages"   => 500,
            "total_results" => 10000,
        ]);
    }
}
