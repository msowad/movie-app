<x-app-layout :header="$movie['title']">
  <div class="border-b border-primary-700">
    <div class="container mx-auto py-10">
      <div class="grid gap-10 grid-cols-1 md:grid-cols-3">
        <img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
        <div class="col-span-1 md:col-span-2">
          <h2 class="mb-3 text-2xl font-semibold">{{ $movie['title'] }}</h2>

          <x-media.specification :genres="$movie['genres']" :vote-average="$movie['vote_average']"
                                 :release-date="$movie['release_date']" />

          <p class="mt-6 text-sm tracking-wide text-primary-300">
            {{ $movie['overview'] }}
          </p>

          @if (count($movie['crew']) > 0)
            <div class="mt-8">
              <h2 class="font-semibold mb-4">Featured Crew</h2>
              <div class="flex">
                @foreach ($movie['crew'] as $crew)
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

          <div class="flex space-x-4">
            @if (isset($movie['video_key']))
              <x-media.trailer :key="$movie['video_key']" />
            @endif

            @if (isset($movie['homepage']))
              <a href="{{ $movie['homepage'] }}" target="_blank"
                 class="inline-flex mt-12 px-3 py-4 bg-primary-500 rounded items-center gap-2 shadow-lg hover:bg-primary-600 focus:outline-none focus:ring-4 transition ease-in-out focus:ring-primary-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="-rotate-45 transform h-5 w-5"
                     viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                Open Homepage
              </a>
            @endif
          </div>

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
        @if ($movie['extra_casts'] > 0)
          <p class="text-secondary-500">{{ $movie['extra_casts'] }} more</p>
        @endif
      </div>

      <div
           class="pt-10 grid gap-6 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
        @foreach ($movie['casts'] as $cast)
          <x-media.cast :id="$cast['id']" :image="$cast['profile_path']" :name="$cast['name']"
                        :character="$cast['character']" />
        @endforeach
      </div>
    </div>
  </div>

  <x-media.images :images="$movie['images']" />
</x-app-layout>
