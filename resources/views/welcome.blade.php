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
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="fixed p-0 inset-0 w-screen  min-h-screen bg-cover bg-center">
  <div class="w-full flex flex-wrap flex-col bg-green-800 md:flex-row m-0 bg-opacity-50 h-screen">
    <div class="md:flex w-full md:w-1/2 bg-center hidden" style="background-image: url('/img/uniabj.jpg')">

    </div>
    {{-- another one --}}
    <div class="flex flex-col my-auto justify-around w-full md:w-1/2 bg-green-50 h-full">
      
      <form method="POST" action="{{ route('login') }}" class="my-auto mx-4 rounded p-4 shadow-sm bg-white w-full md:w-1/2 md:mx-auto">
        @csrf
        <h1 class="font-bold text-2xl my-8 text-center">Login</h1>
        <!-- Email Address -->
        <div>
          <x-label for="email" :value="__('Email')" />

          <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
          <x-label for="password" :value="__('Password')" />

          <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
          <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
          </label>
        </div>

        <div class="flex items-center justify-end mt-4">
          {{-- @if (Route::has('password.request'))
          <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
          </a>
          @endif --}}

          <x-button class="text-center mx-auto bg-green-600">
            {{ __('Log in') }}
          </x-button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
