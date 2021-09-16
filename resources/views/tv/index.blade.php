<x-app-layout header="TV Shows">
  <div class="container mx-auto pt-16">

    <div>
      <h2 class="uppercase text-lg tracking-wider text-secondary-500 font-semibold">
        Popular Shows
      </h2>

      <div
           class="pt-10 grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

        @foreach ($popular as $show)
          <x-media.card :media="$show" />
        @endforeach

      </div>
    </div>

    <div class="pt-16">
      <h2 class="uppercase text-lg tracking-wider text-secondary-500 font-semibold">
        Top Rated Shows
      </h2>

      <div
           class="pt-10 grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

        @foreach ($topRated as $show)
          <x-media.card :media="$show" />
        @endforeach

      </div>
    </div>

  </div>
</x-app-layout>
