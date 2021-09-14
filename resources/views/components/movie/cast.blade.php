@props(['id', 'image', 'name', 'character'])

<a href="{{ route('actors.show', $id) }}">
  <img class="hover:opacity-80 transition ease-in-out duration-150"
       src="{{ 'https://image.tmdb.org/t/p/w185' . $image }}" alt="{{ $name }}">
  <div class="mt-4">
    <h6 class="text-primary-200">{{ $name }}</h6>
    <p class="text-sm text-primary-200">{{ $character }}</p>
  </div>
</a>
