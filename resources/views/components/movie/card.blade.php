@props(['movie', 'showSpecification' => true, 'showGenres' => true])

<div>
  <a href="{{ route('movies.show', $movie['id']) }}">
    <img class="hover:opacity-80 transition ease-in-out duration-150"
         src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
  </a>

  <div class="mt-4">
    <a href="{{ route('movies.show', $movie['id']) }}"
       class="text-lg text-primary-200 hover:text-primary-300">
      {{ $movie['title'] }}
    </a>

    @if ($showSpecification)
      <x-movie.specification :vote-average="$movie['vote_average']"
                             :release-date="$movie['release_date']" />
    @endif
  </div>
  @if ($showGenres)
    <div class="mt-1 text-primary-300">
      {{ $movie['genres'] }}
    </div>
  @endif
</div>
