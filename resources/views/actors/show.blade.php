<x-app-layout header="Movie Show">
  <div class="border-b border-primary-700">
    <div class="container mx-auto py-10">
      <div class="grid gap-10 grid-cols-1 md:grid-cols-3">
        <img src="{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}">
        <div class="col-span-1 md:col-span-2">
          <h2 class="mb-3 text-2xl font-semibold">{{ $actor['name'] }}</h2>

          <x-actors.specification :birthday="$actor['birthday']" :age="$actor['age']"
                                  :deathday="$actor['deathday']"
                                  :place-of-birth="$actor['place_of_birth']" />

          <p class="mt-6 text-sm tracking-wide text-primary-300">
            {{ $actor['biography'] }}
          </p>

          <div class="flex space-x-4 mt-12">
            @if (isset($actor['homepage']))
              <a href="{{ $actor['homepage'] }}" target="_blank"
                 class="text-primary-400 hover:text-primary-500 focus:outline-none focus:ring-4 transition ease-in-out focus:ring-primary-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
              </a>
            @endif
            @if (isset($social['facebook']))
              <a href="{{ $social['facebook'] }}" target="_blank"
                 class="text-primary-400 hover:text-primary-500 focus:outline-none focus:ring-4 transition ease-in-out focus:ring-primary-800">
                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg class="hover:opacity-75 w-6 h-6" version="1.1" id="Capa_1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     x="0px" y="0px" viewBox="0 0 512 512"
                     style="enable-background:new 0 0 512 512;" xml:space="preserve">
                  <path style="fill:#1976D2;" d="M448,0H64C28.704,0,0,28.704,0,64v384c0,35.296,28.704,64,64,64h384c35.296,0,64-28.704,64-64V64
 C512,28.704,483.296,0,448,0z" />
                  <path style="fill:#FAFAFA;" d="M432,256h-80v-64c0-17.664,14.336-16,32-16h32V96h-64l0,0c-53.024,0-96,42.976-96,96v64h-64v80h64
 v176h96V336h48L432,256z" />
              </a>
            @endif
            @if (isset($social['instagram']))
              <a href="{{ $social['instagram'] }}" target="_blank"
                 class="text-primary-400 hover:text-primary-500 focus:outline-none focus:ring-4 transition ease-in-out focus:ring-primary-800">
                <svg class="hover:opacity-75 w-6 h-6" enable-background="new 0 0 24 24" height="512"
                     viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                  <linearGradient id="SVGID_1_"
                                  gradientTransform="matrix(0 -1.982 -1.844 0 -132.522 -51.077)"
                                  gradientUnits="userSpaceOnUse" x1="-37.106" x2="-26.555"
                                  y1="-72.705" y2="-84.047">
                    <stop offset="0" stop-color="#fd5" />
                    <stop offset=".5" stop-color="#ff543e" />
                    <stop offset="1" stop-color="#c837ab" />
                  </linearGradient>
                  <path d="m1.5 1.633c-1.886 1.959-1.5 4.04-1.5 10.362 0 5.25-.916 10.513 3.878 11.752 1.497.385 14.761.385 16.256-.002 1.996-.515 3.62-2.134 3.842-4.957.031-.394.031-13.185-.001-13.587-.236-3.007-2.087-4.74-4.526-5.091-.559-.081-.671-.105-3.539-.11-10.173.005-12.403-.448-14.41 1.633z"
                        fill="url(#SVGID_1_)" />
                  <path d="m11.998 3.139c-3.631 0-7.079-.323-8.396 3.057-.544 1.396-.465 3.209-.465 5.805 0 2.278-.073 4.419.465 5.804 1.314 3.382 4.79 3.058 8.394 3.058 3.477 0 7.062.362 8.395-3.058.545-1.41.465-3.196.465-5.804 0-3.462.191-5.697-1.488-7.375-1.7-1.7-3.999-1.487-7.374-1.487zm-.794 1.597c7.574-.012 8.538-.854 8.006 10.843-.189 4.137-3.339 3.683-7.211 3.683-7.06 0-7.263-.202-7.263-7.265 0-7.145.56-7.257 6.468-7.263zm5.524 1.471c-.587 0-1.063.476-1.063 1.063s.476 1.063 1.063 1.063 1.063-.476 1.063-1.063-.476-1.063-1.063-1.063zm-4.73 1.243c-2.513 0-4.55 2.038-4.55 4.551s2.037 4.55 4.55 4.55 4.549-2.037 4.549-4.55-2.036-4.551-4.549-4.551zm0 1.597c3.905 0 3.91 5.908 0 5.908-3.904 0-3.91-5.908 0-5.908z"
                        fill="#fff" />
                </svg>
              </a>
            @endif
            @if (isset($social['twitter']))
              <a href="{{ $social['twitter'] }}" target="_blank"
                 class="text-primary-400 hover:text-primary-500 focus:outline-none focus:ring-4 transition ease-in-out focus:ring-primary-800">
                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg class="hover:opacity-75 w-6 h-6" version="1.1" id="Capa_1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     x="0px" y="0px" viewBox="0 0 512 512"
                     style="enable-background:new 0 0 512 512;" xml:space="preserve">
                  <path style="fill:#03A9F4;" d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                  c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                  c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                  c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                  c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                  c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                  C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                  C480.224,136.96,497.728,118.496,512,97.248z" />
              </a>
            @endif
          </div>

        </div>
      </div>
    </div>
  </div>

  @if ($knownFor->count() > 0)
    <div class="border-b border-primary-700 py-10">
      <div class="container mx-auto">
        <div class="flex justify-between">
          <h2 class="text-lg tracking-wider font-semibold">
            Known For
          </h2>
        </div>
        <div
             class="pt-10 grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
          @foreach ($knownFor as $media)
            <x-media.card :media="$media" :show-specification="false" :show-genres="false" />
          @endforeach
        </div>
      </div>
    </div>
  @endif

  @if ($credits->count() > 0)
    <div class="border-b border-primary-700 py-10">
      <div class="container mx-auto">
        <div class="flex justify-between">
          <h2 class="text-lg tracking-wider font-semibold">
            Acting
          </h2>
        </div>
        <div class="mt-8 overflow-x-auto bg-primary-700 rounded-lg shadow overflow-y-auto relative"
             style="height: 800px;">
          <table
                 class="border-collapse table-auto w-full whitespace-no-wrap table-striped relative">
            <tbody>
              @foreach ($credits as $credit)
                <tr class="hover:bg-primary-600">
                  <td @class([ 'border-t'=> !$loop->first,
                    'border-dashed border-gray-200',
                    ])>
                    <a href="{{ $credit['url'] }}"
                       class="px-6 py-3 flex items-center">{{ $credit['release_year'] }}</a>
                  </td>
                  <td @class([ 'border-t'=> !$loop->first,
                    'border-dashed border-gray-200',
                    ])>
                    <a href="{{ $credit['url'] }}"
                       class="px-6 py-3 flex items-center">{{ $credit['title'] }}</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endif

</x-app-layout>
