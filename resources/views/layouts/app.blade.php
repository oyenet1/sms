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

  @livewireStyles
</head>
<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100 relative">
    @include('layouts.navigation')

    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center space-x-2 bg-green-50">
        {{ $header ?? '' }}
      </div>
    </header>
    @if (session('error'))
    <div class="fixed top-8 md:top-16 right-8  rounded-md shadow overflow-hidden bg-white max-w-max flex items-center p-0 " x-data="{show: true}" x-show="show">
      <p class="m-0 px-6 py-3 bg-red-500 text-white">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
        </svg>
      </p>
      <p class="p-3 text-black font-semibold m-0 flex items-center space-x-2">
        <span class="">{{ session('error') }}</span>
        <span class="cursor-pointer text-gray-300 rounded transform transition duration-300 hover:bg-gray-900" @click="show = false">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
          </svg>
        </span>
      </p>
    </div>
    @endif
    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>
  </div>

  @livewireScripts
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('scripts')

  <script>
    // success message
    window.addEventListener('swal:success', function(e) {
      Swal.fire(e.detail);
    });

    window.addEventListener('swal:confirm', event => {
      Swal.fire({
        title: 'Are you sure?'
        , text: "You wont be able to revert this!"
        , icon: 'warning'
        , showCancelButton: true
        , cancelButtonColor: '#f11'
        , confirmButtonText: 'Yes delete it'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('deleteConfirm');
          // Swal.fire(
          //   'Deleted!'
          //   , 'Your file has been deleted'
          //   , 'success'
          // )
        }
      });
    });
    window.addEventListener('swal:approve', event => {
      Swal.fire({
        title: 'Do you really want to approve this request?'
        , text: "You won\'t be able to revert this action!"
        , icon: 'warning'
        , showCancelButton: true
        , cancelButtonColor: '#f11'
        , confirmButtonText: 'Yes approve it'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('approve');
          // Swal.fire(
          //   'Deleted!'
          //   , 'Your file has been deleted'
          //   , 'success'
          // )
        }
      });
    });
    window.addEventListener('swal:deny', event => {
      Swal.fire({
        title: 'Did you really want to deny this request?'
        , text: "You won\'t be able to undo this!"
        , icon: 'warning'
        , showCancelButton: true
        , cancelButtonColor: '#f11'
        , confirmButtonText: 'Yes deny it'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('deny');
          // Swal.fire(
          //   'Deleted!'
          //   , 'Your file has been deleted'
          //   , 'success'
          // )
        }
      });
    });

  </script>
</body>
</html>
