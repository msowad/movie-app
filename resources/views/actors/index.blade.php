<x-app-layout header="Actors">
    <div class="container mx-auto pt-16">
        <div>
            <h2 class="uppercase text-lg tracking-wider text-secondary-500 font-semibold">
                Popular Actors
            </h2>

            <div
                class="pt-10 actors-list grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

                @foreach ($actors as $actor)
                <div class="actor">
                    <a href="{{ $actor['url'] }}">
                        <img class="hover:opacity-80 transition ease-in-out duration-150"
                            src="{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}">
                    </a>

                    <div class="mt-4">
                        <a href="{{ $actor['url'] }}" class="text-lg text-primary-200 hover:text-primary-300">
                            {{ $actor['name'] }}
                        </a>
                        <p class="text-sm text-primary-400 truncate">{{ $actor['known_for'] }}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="pt-4">
            <div class="page-load-status my-8 flex justify-center">
                <div class="infinite-scroll-request text-center my-8 text-2xl">
                    loading...
                </div>
                <p class="infinite-scroll-last text-center">End of content</p>
                <p class="infinite-scroll-error text-center">Error</p>
            </div>
        </div>
    </div>

    @push('script')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>

    <script>
        var elem = document.querySelector('.actors-list');
        var infScroll = new InfiniteScroll( elem, {
          path: '/actors/page/@{{#}}',
          append: '.actor',
          status: '.page-load-status',
        });
    </script>
    @endpush
</x-app-layout>
