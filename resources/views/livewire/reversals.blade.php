<div>
  <x-slot name="header">
    <h2 class="font-bold text-xl text-green-800 leading-tight">
      Uniabuja Integrated Portal
    </h2>
  </x-slot>
  <div class="py-12 mx-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="w-full my-2">
        <h1 class="text-2xl font-bold">Reversal List</h1>
      </div>
      <div class="w-full my-4 flex justify-between">
        <p class="">{{ $reversals->links() }}</p>
        <input type="text" wire:model="search" class="border-0 focus:ring-opacity-0 shadow rounded-full w-48 bg-white">
      </div>
      <table class="table shadow-md w-full">
        <thead class="w-full rounded-md shadow">
          <tr class="">
            <th class="p-2 text-left uppercase">no</th>
            {{-- <th class="p-2 text-left uppercase">Student Name</th> --}}
            <th class="p-2 text-left uppercase">Purpose</th>
            <th class="p-2 text-left uppercase">Amount</th>
            <th class="p-2 text-left uppercase">Reference</th>
            <th class="p-2 text-left uppercase">Status</th>
            <th class="p-2 text-left uppercase">Requested Date</th>
            <th class="p-2 text-left uppercase">Student Name</th>
            <th class="p-2 text-left uppercase">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @forelse ($reversals as $reversal)
          <tr class="odd:bg-gray-50 even:bg-gray-500 border-b">
            <td class="p-2">{{ $loop->iteration }}</td>
            <td class="p-2 uppercase">{{ $reversal->payment->purpose }}</td>
            <td class="p-2">
              <span class="text-sm px-2 py-1 bg-green-500 text-white rounded"> &#8358;{{ moneyFormat($reversal->payment->amount) }}</span>
            </td>
            <td class="p-2 uppercase">{{ $reversal->payment->reference }}</td>
            <td class="p-2 uppercase">{{ $reversal->status }}</td>
            <td class="p-2">{{ returnDate($reversal->created_at) }}</td>
            <td class="p-2">
              <a href="{{ route('profile', $reversal->payment->user->id) }}" class="text-blue-500 font-semibold">{{ $reversal->payment->user->name }}</a>
            </td>
            <td class="p-2 flex items-center space-x-2">
              @if ($reversal->status == 'processing')
              <button class="px-2 py-1 bg-green-500 text-white text-sm rounded-sm" wire:click="confirmApprove({{ $reversal->id }})">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
              </button>
              <button class="px-2 py-1 bg-red-500 text-white text-sm rounded-sm" wire:click="confirmDeny({{ $reversal->id }})">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
              </button>
              @else
              <span class="cursor-not-allowed  px-2 py-1 bg-yellow-500 text-white text-sm rounded-sm">
                Settled
              </span>
              @endif
            </td>
          </tr>
          @empty
        </tbody>
        <h2 class="">No reversals Yet, kindly add reversals</h2>
        @endforelse
      </table>
    </div>
  </div>
</div>
