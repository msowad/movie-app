<div>
  <a href="{{ $url }}">
    <img class="hover:opacity-80 transition ease-in-out duration-150"
         src="{{ $media['poster_path'] }}" alt="{{ $title }}">
  </a>

  <div class="mt-4">
    <a href="{{ route('movies.show', $media['id']) }}"
       class="text-lg text-primary-200 hover:text-primary-300">
      {{ $title }}
    </a>

    @if ($showSpecification)
      <x-media.specification :vote-average="$media['vote_average']" :release-date="$releaseDate" />
    @endif
  </div>
  @if ($showGenres)
    <div class="mt-1 text-primary-300">
      {{ $media['genres'] }}
    </div>
  @endif
</div>
