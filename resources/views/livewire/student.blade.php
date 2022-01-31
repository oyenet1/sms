<div class="space-y-4" x-data="{ open: @entangle('show') }">
  <button class="py-2 my-3 px-8 rounded font-semibold border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white" @click="open = true">Add Students</button>
  <div class="flex justify-between w-full">
    <input type="text" class="px-3 py-1 border-2 transition duration-500 border-green-600 rounded-md placeholder-gray-400 text-sm" wire:model="search">
    <form action="">
      <select wire:model="perPage" id="" class="px-4 py-1 border-2 transition duration-500 border-green-600 rounded-md placeholder-gray-400 text-sm">
        <option>5</option>
        <option>10</option>
        <option>20</option>
        <option>50</option>
        <option>100</option>
      </select>
    </form>
  </div>
  <div class="max-w-7xl my-4">
    <table class="table w-full border-collapse">
      <thead class="">
        <tr class="font-normal border p-2">
          <th class="font-semibold text-left text-sm py-2 pl-2 text-gray-600">S/N</th>
          <th class="font-semibold text-left text-sm py-2 pl-2 text-gray-600">Name</th>
          <th class="font-semibold text-left text-sm py-2 pl-2 text-gray-600">Reg No</th>
          <th class="font-semibold text-left text-sm py-2 pl-2 text-gray-600">Email</th>
          <th class="font-semibold text-left text-sm py-2 pl-2 text-gray-600">Phone</th>
          <th class="font-semibold text-left text-sm py-2 pl-2 text-gray-600">Faculty</th>
          <th class="font-semibold text-left text-sm py-2 pl-2 text-gray-600">Department</th>
          <th class="font-semibold text-left text-sm py-2 pl-2 text-gray-600">Level</th>
          <th class="font-semibold text-left text-sm py-2 pl-2 text-gray-600">Action</th>
      </thead>
      <tbody class="bg-white">
        @foreach($students as $student)
        <tr class="border">
          <td class="p-2 font-normal">{{ $loop->iteration }} </td>
          <td class="p-2 font-normal">{{ $student->name }}</td>
          <td class="p-2 font-normal">{{ $student->reg_no }}</td>
          <td class="p-2 font-normal">{{ $student->email }}</td>
          <td class="p-2 font-normal">{{ $student->phone }}</td>
          <td class="p-2 font-normal">{{ $student->faculty }}</td>
          <td class="p-2 font-normal">{{ $student->department }}</td>
          <td class="p-2 font-normal">{{ $student->level }}</td>
          <td class="p-2 flex items-center font-normal space-x-2 ">
            <a class="text-xs text-white p-1 rounded cursor-pointer bg-green-500" wire:click.prevent="edit({{ $student->id }})" data-toggle="tooltip" title="Edit student details" data-placement="top">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
              </svg>
            </a>
            <a class="text-xs text-white p-1 rounded cursor-pointer bg-red-500" wire:click.prevent="confirmDelete({{ $student->id }})" student staff" data-placement="top">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
              </svg>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @if ($students->count() > 0)
    <p class="my-4">{{ $students->links() }}</p>
    @endif
  </div>

  <div class="modal fixed top-0 left-0 fade w-screen h-screen bg-black bg-opacity-80 " id="form" wire:ignore.self x-show="open">
    <div class="modal-dialog w-full h-full bg-opacity-10 flex justify-around">
      <div class="modal-content p-4 w-full m-4 rounded bg-white sm:w-11/12 md:w-1/3 lg:w-1/4 mx-auto" @click.away="open = false">
        <!-- Modal Header -->
        <div class="modal-header flex items-center justify-between">
          <h4 class="modal-title font-semibold text-2xl">
            @if ($update)
            Edit Student details
            @else
            Add new Student
            @endif
          </h4>
          <button type="button" @click="open = false">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form wire:submit.prevent=@if($update) 'update' @else 'save' @endif class="w-ful row">
            <div class="p-3 w-full text-gray-500  font-bold items-center align-middle">
              <div class="mb-3">
                <select wire:model.defer="faculty" class="px-2 py-2 text-sm rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-semibold">
                  <option value="select">Select Faculty</option>
                  @foreach ($faculties as $faculty)
                  <option value="{{ $faculty }}" class="capitalize">{{ $faculty }}</option>
                  @endforeach
                </select>
                @error('faculty')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <select wire:model.defer="department" class="px-2 py-2 text-sm rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-semibold">
                  <option value="select">Select Department</option>
                  @foreach ($departments as $department)
                  <option value="{{ $department }}" class="capitalize">{{ $department }}</option>
                  @endforeach
                </select>
                @error('department')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <select wire:model.defer="level" class="px-2 py-2 text-sm rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-semibold">
                  <option value="select">Select Level</option>
                  @foreach ([100, 200, 300, 400, 500] as $level)
                  <option value="{{ $level }}" class="capitalize">{{ $level }}</option>
                  @endforeach
                </select>
                @error('level')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3"> 
                <label for="" class="font-normal mb-1">Name</label>
                <input type="text" wire:model.defer="name" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="student name">
                @error('name')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3"> 
                <label for="" class="font-normal mb-1">Email</label>
                <input type="text" wire:model.defer="email" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="student email">
                @error('email')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3"> 
                <label for="" class="font-normal mb-1">Matric</label>
                <input type="text" wire:model.defer="reg_no" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="student Matric">
                @error('reg_no')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="" class="font-normal mb-1">Phone</label>
                <input type="number" wire:model.defer="phone" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="phone number">
                @error('phone')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3 my-auto align-middle text-right">
                @if($update)
                <button type="submit" class="rounded align-middle border-2 border-green-500 bg-green-600 hover:opacity-80 text-white py-2 text-center px-3 text-sm  font-medium">Update</button>
                @else
                <button type="submit" class="rounded align-middle border-2 border-green-500 bg-green-600 hover:opacity-80 text-white py-2 text-center px-3 text-sm  font-medium">Save</button>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
