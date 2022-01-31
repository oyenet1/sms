<div>
  <x-slot name="header">
    <h2 class="font-bold text-xl text-green-800 leading-tight">
      Uniabuja Integrated Portal
    </h2>
  </x-slot>
  <div class="py-12 mx-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="w-full my-2">
           <h1 class="text-2xl font-bold">Student List</h1>
        </div>
        <div class="w-full my-4 flex justify-between">
            <p class="">{{ $students->links() }}</p>
            <input type="text" wire:model="search" class="border-0 focus:ring-opacity-0 shadow rounded-full w-48 bg-gray-50">
        </div>
      <table class="table shadow-md w-full">
        <thead class="w-full rounded-md shadow">
          <tr class="">
            <th class="p-2 text-left uppercase">no</th>
            <th class="p-2 text-left uppercase">Name</th>
            <th class="p-2 text-left uppercase">Matric</th>
            <th class="p-2 text-left uppercase">Phone</th>
            <th class="p-2 text-left uppercase">Email Address</th>
            <th class="p-2 text-left uppercase">Level</th>
            <th class="p-2 text-left uppercase">Department</th>
            <th class="p-2 text-left uppercase">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @forelse ($students as $student)
          <tr class="odd:bg-gray-50 even:bg-gray-500 border-b">
            <td class="p-2">{{ $loop->iteration }}</td>
            <td class="p-2">
              <a href="{{ route('profile', $student->id) }}" class="text-blue-500 font-semibold">{{ $student->name }}</a>
            </td>
            <td class="p-2 uppercase text-green-500 font-semibold">{{ $student->reg_no }}</td>
            <td class="p-2">{{ $student->phone }}</td>
            <td class="p-2">{{ $student->email }}</td>
            <td class="p-2">{{ $student->level }}</td>
            <td class="p-2">{{ $student->department }}</td>
            <td class="p-2">
              <button class="px-2 py-1 bg-red-500 text-white text-sm rounded-sm" wire:click="confirmDelete({{ $student->id }})">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
              </button>
            </td>
          </tr>
          @empty
        </tbody>
        <h2 class="">No students Yet, kindly add students</h2>
        @endforelse
      </table>
    </div>
  </div>
</div>
