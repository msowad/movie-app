<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  <style>
    body,
    a {
      color: white;
    }

  </style>

</head>

<body class="font-sans bg-primary-800 text-white">

  <nav class="border-b border-primary-700">
    <div class="container mx-auto flex items-center justify-between py-5">
      <ul class="flex items-center">
        <li>
          <a href="#">
            <x-app.logo />
          </a>
        </li>
        <li class="ml-16">
          <a href="#" class="hover:text-primary-300 transition">Movies</a>
        </li>
        <li class="ml-8">
          <a href="#" class="hover:text-primary-300 transition">TV Show</a>
        </li>
        <li class="ml-8">
          <a href="#" class="hover:text-primary-300 transition">Actors</a>
        </li>
      </ul>

      <div class="flex items-center">
        <div class="relative">
          <input type="search" placeholder="Search"
                 class="w-64 py-2 pl-8 pr-5 rounded-full bg-gray-700 text-sm text-gray-200 focus:outline-none focus:shadow-md focus:ring-2 transition ease-in-out focus:ring-primary-600">
          <div class="absolute" style="top: 10px; left: 10px;">
            <svg class="fill-current w-4 text-gray-500" viewBox="0 0 24 24">
              <path class="heroicon-ui"
                    d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
            </svg>
          </div>
        </div>
        <div class="ml-3">
          <a href="#">
            <img src="/img/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
          </a>
        </div>
      </div>
    </div>
  </nav>

  <main>
    {{ $slot }}
  </main>

  <footer>

  </footer>

</body>

</html>
