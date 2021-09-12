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

          @if (count($movie['credits']['crew']) > 0)
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
          @endif


          @if (array_key_exists('results', $movie['videos']) && count($movie['videos']['results']) > 0)
            <x-movie.trailer :key="$movie['videos']['results'][0]['key']" />
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
        @if (count($movie['credits']['cast']) > 6)
          <p class="text-secondary-500">{{ count($movie['credits']['cast']) - 6 }} more</p>
        @endif
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

  <x-movie.images :images="collect($movie['images']['backdrops'])->take(12)" />
</x-app-layout>
