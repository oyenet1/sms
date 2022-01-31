<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  @livewireStyles
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->

  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-200">
  <div class="w-full py-2 bg-black">
    <div class="flex  w-full justify-between items-center my-4 max-w-7xl mx-auto">
      <a href="/" class="text-smtext-2xl lg:text-3xl text-white dark:text-gray-500  font-semibold">Uniabuja Eventer Center</a>
      <div class="space-x-4">
        <a href="/verify" class="hover:bg-pink-800 text-pink-600 transition duration-1000 hover:text-white text-sm  dark:text-gray-500 font-semibold px-12 py-2 border-2 border-pink-600 rounded-full">Verify Ticket</a>
        <a href="{{ route('login') }}" class="hover:bg-white hover:text-green-800 transition duration-1000  text-sm  dark:text-gray-500 font-semibold px-12 bg-pink-600 border-pink-600 text-white py-2 border-2 rounded-full">Log in</a>
      </div>
    </div>
  </div>
  <div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
  </div>

  @livewireScripts
</body>
</html>
