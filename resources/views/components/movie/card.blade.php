@props(['image'])

<div>
  <a href="#">
    <img class="hover:opacity-90 transition ease-in-out duration-150" src="{{ $image }}"
         alt="Movie">
  </a>
  <div class="mt-4">
    <a href="#" class="text-lg text-primary-200 hover:text-primary-300">Frozen 2</a>
    <div class="flex items-center gap-3 text-primary-400">
      <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-500 th-5 w-5" viewBox="0 0 20 20"
           fill="currentColor">
        <path
              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
      </svg>
      <span>84%</span>
      <span>|</span>
      <span>Fab 20, 2019</span>
    </div>
  </div>
  <div class="mt-1 text-primary-300">
    Action, Thriller, Comedy
  </div>
</div>
