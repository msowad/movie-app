@props(['images'])

<div class="pt-10" x-data="{
    isOpen: false,
     image: '',
     index: 0,
    }">
  <div x-data="{
        next() {index++;image = document.querySelector(`#imageButton${index} img`).getAttribute('large-src')},
        prev() {index--;image = document.querySelector(`#imageButton${index} img`).getAttribute('large-src')}
      }">
    <div class="container mx-auto">
      <h2 class="text-lg tracking-wider font-semibold">
        Images
      </h2>

      @if ($images->count() > 0)
        <div class="pt-10 grid gap-6 grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
          @foreach ($images as $image)
            <button @click="
            isOpen = true
            image = '{{ 'https://image.tmdb.org/t/p/original' . $image['file_path'] }}'
            index= '{{ $loop->index }}'
        " id="imageButton{{ $loop->index }}"
                    class="focus:ring-4 ring-primary-500 focus:outline-none">
              <img class="hover:opacity-80 transition ease-in-out duration-150"
                   src="{{ 'https://image.tmdb.org/t/p/w500' . $image['file_path'] }}"
                   large-src="{{ 'https://image.tmdb.org/t/p/original' . $image['file_path'] }}"
                   alt="Backdrops">
            </button>
          @endforeach
        </div>

        <div style="display: none" x-show="isOpen" x-transition class="fixed inset-0 overflow-auto"
             style="background-color: rgba(0, 0, 0, 0.6)">
          <div style="background-color: rgba(0, 0, 0, .5);"
               class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
              <div class="bg-gray-900 rounded">
                <div class="flex justify-between pr-4 pt-2">
                  <div class="flex ml-4">
                    <button id="prevImageButton" :disabled="index == 0" @click="prev()"
                            class="text-3xl p-2 rounded-full transition leading-none hover:bg-secondary-900 focus:outline-none focus:ring-2 focus:ring-secondary-900">
                      <svg xmlns=" http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                           viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7" />
                      </svg>
                    </button>
                    <button id="nextImageButton" :disabled="index == {{ count($images) - 1 }}"
                            @click="next()"
                            class="text-3xl p-2 rounded-full transition leading-none hover:bg-secondary-900 focus:outline-none focus:ring-2 focus:ring-secondary-900">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                           viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5l7 7-7 7" />
                      </svg>
                    </button>
                  </div>

                  <button @click="isOpen = false" @keydown.escape.window="isOpen = false"
                          class="text-3xl p-2 rounded-full transition leading-none hover:bg-secondary-900 focus:outline-none focus:ring-2 focus:ring-secondary-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
                <div class="modal-body p-2 md:p-4 lg:p-8">
                  <div>
                    <img :src="image" alt="poster" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @else
        <div class="w-full flex justify-center mt-10">
          <div class="text-center border border-dashed rounded py-4 px-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-1h-40" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <p>No Image</p>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
