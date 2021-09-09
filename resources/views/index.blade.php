<x-app-layout>
  <div class="container mx-auto pt-16">
    <div>
      <h2 class="uppercase text-lg tracking-wider text-secondary-500 font-semibold">
        Popular Movies
      </h2>

      <div class="pt-6 grid gap-6 grid-cols-5">
        <x-movie.card image="{{ asset('img/frozen2.jpg') }}" />
        <x-movie.card image="{{ asset('img/parasite.jpg') }}" />
        <x-movie.card image="{{ asset('img/sonic.jpg') }}" />
        <x-movie.card image="{{ asset('img/joker.jpg') }}" />
        <x-movie.card image="{{ asset('img/frozen2.jpg') }}" />
        <x-movie.card image="{{ asset('img/sonic.jpg') }}" />
        <x-movie.card image="{{ asset('img/parasite.jpg') }}" />
        <x-movie.card image="{{ asset('img/joker.jpg') }}" />
        <x-movie.card image="{{ asset('img/parasite.jpg') }}" />
        <x-movie.card image="{{ asset('img/frozen2.jpg') }}" />
      </div>
    </div>
  </div>
</x-app-layout>
