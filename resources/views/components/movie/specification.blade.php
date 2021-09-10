@props(['genres' => [], 'voteAverage', 'releaseDate'])

<div class="flex flex-wrap items-center text-primary-400">
  <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-500 th-5 w-5" viewBox="0 0 20 20"
       fill="currentColor">
    <path
          d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
  </svg>
  <span class="ml-1 mr-3">{{ $voteAverage * 10 }}%</span>
  <span>|</span>
  <span class="ml-3">{{ \Carbon\Carbon::parse($releaseDate)->format('M d, Y') }}</span>

  @if ($genres)
    <span class="mx-3">|</span>
    <span>
      @foreach ($genres as $genre)
        {{ $genre['name'] }}@if (!$loop->last),&nbsp;@endif
      @endforeach
    </span>
  @endif
</div>
