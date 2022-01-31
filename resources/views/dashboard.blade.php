<x-app-layout>
  <x-slot name="header">
    <h2 class="font-bold text-xl text-green-800 leading-tight">
      Uniabuja Student Management System
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
     @livewire('student')
    </div>
  </div>
</x-app-layout>
