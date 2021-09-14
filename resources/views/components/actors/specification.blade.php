@props(['birthday', 'age', 'deathday' => null, 'placeOfBirth'])

<div class="flex flex-wrap items-center text-primary-400">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mb-1 mr-1 text-yellow-600" fill="none"
       viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
  </svg>
  <span class="ml-1">{{ $birthday }}@if (!$deathday) ({{ $age }} years old)@endif</span>
  @if ($deathday)
    <span class="ml-3">|</span>
    <span class="ml-3">{{ $deathday }} ({{ $age }} years old)</span>
  @endif
  <span class="mx-3">|</span>
  <span>{{ $placeOfBirth }}</span>
</div>
