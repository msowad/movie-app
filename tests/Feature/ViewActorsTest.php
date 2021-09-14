<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewActorsTest extends TestCase
{
    /** @test */
    public function theIndexPageShowsCorrectInfo()
    {
        Http::fake([
            'https://api.themoviedb.org/3/person/popular?page=1' => $this->fakePopularActors(),
        ]);

        $response = $this->get('/actors');

        $response->assertSuccessful();
        $response->assertSee('Popular Actors');
        $response->assertSee('Fake Actor');
        $response->assertSee('Fake Actor act on this movie');
    }

    /** @test */
    public function theIndexPageTwoShowsCorrectInfo()
    {
        Http::fake([
            'https://api.themoviedb.org/3/person/popular?page=2' => $this->fakePopularActorsOfPageTwo(),
        ]);

        $response = $this->get('/actors/page/2');

        $response->assertSuccessful();
        $response->assertSee('Popular Actors');
        $response->assertSee('Fake Actor Of Page Two');
        $response->assertSee('Fake Actor Of Page Two act on this movie');
    }

    /** @test */
    public function theShowPageShowsCorrectInfo()
    {
        Http::fake([
            'https://api.themoviedb.org/3/person/976'                  => $this->fakeActor(),
            'https://api.themoviedb.org/3/person/976/external_ids'     => $this->fakeSocialIds(),
            'https://api.themoviedb.org/3/person/976/combined_credits' => $this->fakeCredits(),
        ]);

        $response = $this->get('/actors/976');

        $response->assertSuccessful();
        $response->assertSee('Fake Actor');
        $response->assertSee(Carbon::yesterday()->format('M d, Y'));
        $response->assertSee('Nowhere');
        // $response->assertSee('https://twitter.com/FakeTwitter');
        // $response->assertSee('https://www.facebook.com/FakeFB');
        // $response->assertSee('https://www.instagram.com/FakeInsta');
        $response->assertSee('2000');
        $response->assertSee('Fake Movie');
    }

    private function fakePopularActors()
    {
        return Http::response([
            "page"          => 1,
            "results"       => [
                0 => [
                    "adult"                => false,
                    "gender"               => 2,
                    "id"                   => 12835,
                    "known_for"            => [
                        0 => [
                            "adult"             => false,
                            "backdrop_path"     => "/ko4N6wWp0UYlMmsVyfIfLyRAZtP.jpg",
                            "genre_ids"         => [
                                0 => 28,
                                1 => 878,
                                2 => 12,
                            ],
                            "id"                => 118340,
                            "media_type"        => "movie",
                            "original_language" => "en",
                            "original_title"    => "Fake Actor act on this movie",
                            "overview"          => "Light years from Earth, 26 years after being abducted, Peter Quill finds himself the prime target of a manhunt after discovering an orb wanted by Ronan the Accuser.",
                            "poster_path"       => "/r7vmZjiyZw9rpJMQJdXpjgiCOk9.jpg",
                            "release_date"      => "2014-07-30",
                            "title"             => "Fake Actor act on this movie",
                            "video"             => false,
                            "vote_average"      => 7.9,
                            "vote_count"        => 23071,
                        ],
                    ],
                    "known_for_department" => "Acting",
                    "name"                 => "Fake Popular Actor",
                    "popularity"           => 33.643,
                    "profile_path"         => "/tEoUF0RJqHnskmBOJiDEQhyN7Ok.jpg",
                ],
            ],
            "total_pages"   => 500,
            "total_results" => 10000,
        ]);
    }

    private function fakePopularActorsOfPageTwo()
    {
        return Http::response([
            "page"          => 2,
            "results"       => [
                0 => [
                    "adult"                => false,
                    "gender"               => 2,
                    "id"                   => 12835,
                    "known_for"            => [
                        0 => [
                            "adult"             => false,
                            "backdrop_path"     => "/ko4N6wWp0UYlMmsVyfIfLyRAZtP.jpg",
                            "genre_ids"         => [
                                0 => 28,
                                1 => 878,
                                2 => 12,
                            ],
                            "id"                => 118340,
                            "media_type"        => "movie",
                            "original_language" => "en",
                            "original_title"    => "Fake Actor Of Page Two act on this movie",
                            "overview"          => "Light years from Earth, 26 years after being abducted, Peter Quill finds himself the prime target of a manhunt after discovering an orb wanted by Ronan the Accuser.",
                            "poster_path"       => "/r7vmZjiyZw9rpJMQJdXpjgiCOk9.jpg",
                            "release_date"      => "2014-07-30",
                            "title"             => "Fake Actor Of Page Two act on this movie",
                            "video"             => false,
                            "vote_average"      => 7.9,
                            "vote_count"        => 23071,
                        ],
                    ],
                    "known_for_department" => "Acting",
                    "name"                 => "Fake Popular Actor Of Page Two",
                    "popularity"           => 33.643,
                    "profile_path"         => "/tEoUF0RJqHnskmBOJiDEQhyN7Ok.jpg",
                ],
            ],
            "total_pages"   => 500,
            "total_results" => 10000,
        ]);
    }

    private function fakeActor()
    {
        return Http::response([
            "adult"                => false,
            "also_known_as"        => [
                0 => "Джейсон Стейтем",
                1 => "Джейсон Стэйтем",
            ],
            "biography"            => "Jason Statham is an English actor and martial artist, known for his roles in the Guy Ritchie crime films Lock, Stock and Two Smoking Barrels; Revolver; and Snatch. Statham appeared in supporting roles in several American films, such as The Italian Job, as well as playing the lead role in The Transporter, Crank, The Bank Job, War (opposite martial arts star Jet Li), and Death Race. Statham solidified his status as an action hero by appearing alongside established action film actors Sylvester Stallone, Arnold Schwarzenegger, Bruce Willis, Jet Li and Dolph Lundgren in The Expendables. He normally performs his own fight scenes and stunts.",
            "birthday"             => Carbon::yesterday()->format('Y-m-d'),
            "deathday"             => null,
            "gender"               => 2,
            "homepage"             => null,
            "id"                   => 0,
            "imdb_id"              => "nm0005458",
            "known_for_department" => "Acting",
            "name"                 => "Fake Actor",
            "place_of_birth"       => "Nowhere",
            "popularity"           => 78.364,
            "profile_path"         => "/lldeQ91GwIVff43JBrpdbAAeYWj.jpg",
        ]);
    }

    private function fakeSocialIds()
    {
        Http::response([
            "id"           => 0,
            "freebase_mid" => "/m/034hyc",
            "freebase_id"  => "/en/fake",
            "imdb_id"      => "nm0005458",
            "tvrage_id"    => 74770,
            "facebook_id"  => "fakeFB",
            "instagram_id" => "fakeInsta",
            "twitter_id"   => 'FakeTwitter',
        ]);
    }

    private function fakeCredits()
    {
        return Http::response([
            "cast" => [
                [
                    "overview"          => "Unscrupulous boxing promoters, violent bookmakers, a Russian gangster, incompetent amateur robbers and supposedly Jewish jewelers fight to track down a priceless stolen diamond.",
                    "release_date"      => "2000-09-01",
                    "adult"             => false,
                    "backdrop_path"     => "/32V4uHVRU2fbDsQl1dsYsZm3uba.jpg",
                    "id"                => 107,
                    "original_language" => "en",
                    "original_title"    => "Fake Movie",
                    "poster_path"       => "/56mOJth6DJ6JhgoE2jtpilVqJO.jpg",
                    "vote_count"        => 6831,
                    "video"             => false,
                    "vote_average"      => 7.8,
                    "title"             => "Fake Movie",
                    "popularity"        => 19.522,
                    "character"         => "Faker",
                    "credit_id"         => "52fe4218c3a36847f8003be1",
                    "order"             => 0,
                    "media_type"        => "movie",
                ],
            ],
            "crew" => [],
            "id"   => 0,
        ]);
    }
}
