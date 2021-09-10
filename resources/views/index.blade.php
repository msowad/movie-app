<x-app-layout header="Movies">
  <div class="container mx-auto pt-16">

    {{-- Popular Movies --}}
    <div>
      <h2 class="uppercase text-lg tracking-wider text-secondary-500 font-semibold">
        Popular Movies
      </h2>

      <div
           class="pt-10 grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

        @foreach ($popularMovies as $movie)
          @include('partial.movie.card', ['movie' => $movie])
        @endforeach

      </div>
    </div>

    {{-- Now Playing --}}
    <div class="pt-16">
      <h2 class="uppercase text-lg tracking-wider text-secondary-500 font-semibold">
        Now Playing
      </h2>

      <div
           class="pt-10 grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

        @foreach ($nowPlayingMovies as $movie)
          @include('partial.movie.card', ['movie' => $movie])
        @endforeach

      </div>
    </div>

  </div>
</x-app-layout>
