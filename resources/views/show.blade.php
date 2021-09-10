<x-app-layout header="Movie Show">
  <div class="border-b border-primary-700">
    <div class="container mx-auto py-10">
      <div class="grid gap-10 grid-cols-1 md:grid-cols-3">
        <img src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] }}"
             alt="{{ $movie['title'] }}">
        <div class="col-span-1 md:col-span-2">
          <h2 class="mb-3 text-2xl font-semibold">{{ $movie['title'] }}</h2>

          <x-movie.specification :genres="$movie['genres']" :vote-average="$movie['vote_average']"
                                 :release-date="$movie['release_date']" />

          <p class="mt-6 text-sm tracking-wide text-primary-300">
            {{ $movie['overview'] }}
          </p>

          <div class="mt-8">
            <h2 class="font-semibold mb-4">Featured Crew</h2>
            <div class="flex">
              @foreach (collect($movie['credits']['crew'])->where('profile_path', '!=', null)->take(2)
    as $crew)
                <div class="mr-8 flex items-center">
                  <img class="mr-2 rounded"
                       src="{{ 'https://image.tmdb.org/t/p/w45' . $crew['profile_path'] }}"
                       alt="{{ $crew['name'] }}">
                  <div>
                    <h6 class="text-primary-300">{{ $crew['name'] }}</h6>
                    <p class="text-sm text-primary-400">{{ $crew['job'] }}</p>
                  </div>
                </div>
              @endforeach
            </div>
          </div>


          @if ($movie['videos']['results'][0])
            <a target="_blank"
               href="https://www.youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"
               class="inline-flex mt-12 px-3 py-4 bg-secondary-500 rounded items-center gap-2 shadow-lg hover:bg-secondary-600 focus:outline-none focus:ring-4 transition ease-in-out focus:ring-secondary-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Play Trailer
            </a>
          @endif

        </div>
      </div>
    </div>
  </div>

  {{-- Casts --}}
  <div class="border-b border-primary-700 py-10">
    <div class="container mx-auto">
      <div class="flex justify-between">
        <h2 class="text-lg tracking-wider font-semibold">
          Casts
        </h2>
        <p class="text-secondary-500">{{ count($movie['credits']['cast']) - 6 }} more</p>
      </div>

      <div
           class="pt-10 grid gap-6 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
        @foreach (collect($movie['credits']['cast'])->where('profile_path', '!=', null)->take(6)
    as $cast)
          <x-movie.cast :image="$cast['profile_path']" :name="$cast['name']"
                        :character="$cast['character']" />
        @endforeach
      </div>
    </div>
  </div>

  {{-- Images --}}
  <div class="pt-10">
    <div class="container mx-auto">
      <h2 class="text-lg tracking-wider font-semibold">
        Images
      </h2>

      <div class="pt-10 grid gap-6 grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach (collect($movie['images']['backdrops'])->take(12) as $image)
          <div>
            <img class="hover:opacity-80 transition ease-in-out duration-150"
                 src="{{ 'https://image.tmdb.org/t/p/w500' . $image['file_path'] }}"
                 alt="Backdrops">
          </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
