@props(['key'])

<div x-data="{ isOpen: false }">
  <button @click="isOpen = true"
          class="inline-flex mt-12 px-3 py-4 bg-secondary-500 rounded items-center gap-2 shadow-lg hover:bg-secondary-600 focus:outline-none focus:ring-4 transition ease-in-out focus:ring-secondary-800">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
         stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    Play Trailer
  </button>

  <div style="display: none" x-show="isOpen" x-transition class="fixed inset-0 overflow-auto"
       style="background-color: rgba(0, 0, 0, 0.6)">
    <div style="background-color: rgba(0, 0, 0, .5);"
         class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
      <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
        <div class="bg-gray-900 rounded">
          <div class="flex justify-end pr-4 pt-2">
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
            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
              <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" width="560"
                      height="349" src="https://www.youtube.com/embed/{{ $key }}"
                      style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
