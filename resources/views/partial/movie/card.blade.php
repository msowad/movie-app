<div>
  <a href="{{ route('movies.show', $movie['id']) }}">
    <img class="hover:opacity-80 transition ease-in-out duration-150"
         src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] }}"
         alt="{{ $movie['title'] }}">
  </a>
  <div class="mt-4">
    <a href="{{ route('movies.show', $movie['id']) }}"
       class="text-lg text-primary-200 hover:text-primary-300">
      {{ $movie['title'] }}
    </a>

    <x-movie.specification :vote-average="$movie['vote_average']"
                           :release-date="$movie['release_date']" />
  </div>
  <div class="mt-1 text-primary-300">
    @foreach ($movie['genre_ids'] as $genre)
      {{ $genres->get($genre) }}@if (!$loop->last),&nbsp;@endif
    @endforeach
  </div>
</div>
