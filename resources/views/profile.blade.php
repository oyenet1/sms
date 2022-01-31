<x-app-layout>
  <x-slot name="header" class="flex items-center flex-row bg-gray-200">
    <img src="/img/uniabuja.png" alt="" class="w-24 h-auto">
    <h2 class=" text-green-800 leading-tight text-4xl font-black">
      Undergraduate <br> Portal
    </h2>
  </x-slot>

  <div class="py-12 grid grid-cols-1 lg:grid-cols-2 gap-8 mx-auto max-w-7xl p-4 lg:px-0">
    <div class="rounded shadow-sm bg-white divide-y overflow-hidden">
      <div class="div flex p-2 justify-between">
        <h1 class="flex space-x-3 items-center">
          <span class="text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </span>
          <span class="font-bold text-xl">Basic Profile</span>
        </h1>
        <button class="text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <div class="div flex space-x-2 p-4 bg-white">
        <table class="w-2/3 shadow px-2 rounded">
          <tr>
            <td class="font-bold">Reg NO:</td>
            <td>{{ $user->reg_no ?? 'Admin' }}</td>
          </tr>
          <tr>
            <td class="font-bold">Name:</td>
            <td>{{ $user->name }}</td>
          </tr>
          <tr>
            <td class="font-bold">Faculty:</td>
            <td>Science</td>
          </tr>
          <tr>
            <td class="font-bold">Department:</td>
            <td>{{ $user->department ?? 'Admin' }}</td>
          </tr>
          <tr>
            <td class="font-bold">Current Level:</td>
            <td>{{ $user->level ?? 'Admin Level' }}</td>
          </tr>
        </table>
        <div class="w-1/3 shadow rounded">
          <img src="/img/avatar.png" alt="" class="w-full object-cover object-center h-auto">
        </div>
      </div>
    </div>
    <div class="rounded shadow-sm bg-white divide-y flex flex-col space-y-4 overflow-hidden w-full box-border p-4 lg:p-0">
      <div class="div flex p-2 justify-between border-b">
        <h1 class="flex space-x-3 items-center">
          <span class="text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M12 14l9-5-9-5-9 5 9 5z" />
              <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
          </span>
          <span class="font-bold text-xl">School Charges And Current Registration Status</span>
        </h1>
        <button class="text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <table class="w-4/5 mx-auto shadow p-4 m-3 rounded  box-border bg-gray-50 border-collapse">
        <tr class="p-2 border border-collapse">
          <td class="font-bold p-2 border-r ">Current Session :</td>
          <td class=" p-2 border-collapse">{{ (date('Y') - 1).'/'. date('Y') }}</td>
        </tr>
        <tr class="p-2 border">
          <td class="font-bold p-2 border-r">School Charges :</td>
          <td class=" p-2 border-collapse">34,000.00</td>
        </tr>
      </table>
    </div>
    <div class="rounded shadow-sm bg-white divide-y flex flex-col space-y-4 overflow-hidden w-full box-border px-0 pb-4 ">
      <div class="div flex p-2 justify-between border-b bg-white">
        <h1 class="flex space-x-3 items-center">
          <span class="text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
          </span>
          <span class="font-bold text-xl">Password Management</span>
        </h1>
        <button class="text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <form class="w-11/12 mx-auto shadow-sm p-4 mb-4 rounded  box-border flex flex-col space-y-3">
        <div class="div flex items-start justify-between space-x-8">
          <label for="" class="font-bold w-1/3">Old Passowrd</label>
          <input type="text" class="p-2 bg-white shadow-sm w-2/3 border rounded border-gray-300">
        </div>
        <div class="div flex items-start justify-between space-x-8">
          <label for="" class="font-bold w-1/3">New Password</label>
          <input type="text" class="p-2 bg-white shadow-sm w-2/3 border rounded border-gray-300">
        </div>
        <div class="div flex items-start justify-between space-x-8">
          <label for="" class="font-bold w-1/3">Confirm Password</label>
          <input type="text" class="p-2 bg-white shadow-sm w-2/3 border rounded border-gray-300">
        </div>
        <div class="div flex items-end justify-end space-x-8">
          <button class="bg-green-500 text-sm rounded py-2 px-4 text-white">Change Password</button>
        </div>

      </form>
    </div>
    <div class="rounded shadow-sm bg-white divide-y flex flex-col space-y-4 overflow-hidden w-full box-border px-0 pb-4 ">
      <div class="div flex p-2 justify-between border-b bg-white">
        <h1 class="flex space-x-3 items-center">
          <span class="text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
          </span>
          <span class="font-bold text-xl">Print Result and Course Registration</span>
        </h1>
        <button class="text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <form class="w-11/12 mx-auto shadow-sm p-4 mb-4 rounded  box-border flex flex-col space-y-3">
        <div class="div flex items-start justify-between space-x-8">
          <label for="" class="font-bold w-1/3">Select Course Session</label>
          <select type="text" class="p-2 bg-white shadow-sm w-2/3 border rounded border-gray-300">
            @for($i = 1, $j = date('Y'), $k = (date('Y') - 1); $i <= 4; $i++, $j--, $k--) <option value="{{ $k . '/' . $j }}">{{ $k . '/' . $j }}</option>
              @endfor
          </select>
        </div>
        <div class="div flex items-end justify-end space-x-8">
          <button class="bg-green-500 text-sm rounded py-2 px-4 text-white">Print</button>
        </div>

      </form>
      <form class="w-11/12 mx-auto shadow-sm p-4 mb-4 rounded  box-border flex flex-col space-y-3">
        <div class="div flex items-start justify-between space-x-8">
          <label for="" class="font-bold w-1/3">Select Result</label>
          <select type="text" class="p-2 bg-white shadow-sm w-2/3 border rounded border-gray-300">
            @for($i = 1, $j = date('Y'), $k = (date('Y') - 1); $i <= 4; $i++, $j--, $k--) <option value="{{ $k . '/' . $j }}">{{ $k . '/' . $j }}</option>
              @endfor
          </select>
        </div>
        <div class="div flex items-end justify-end space-x-8">
          <button class="bg-green-500 text-sm rounded py-2 px-4 text-white">Print</button>
        </div>
      </form>
    </div>
    @livewire('query')
  </div>
</x-app-layout>
