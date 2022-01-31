@if ($payments->count() > 0)
<div class="rounded shadow-sm bg-white divide-y flex flex-col space-y-4 overflow-hidden w-full box-border px-0 pb-4 ">
  <div class="div flex p-2 justify-between border-b bg-white">
    <h1 class="flex space-x-3 items-center">
      <span class="text-green-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
      </span>
      <span class="font-bold text-xl">List of Payment</span>
    </h1>
    <button class="text-gray-500">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>
  <table class="w-11/12 mx-auto shadow-sm mb-4 rounded  box-border border-collapse">
    <thead class="p-2 text-left">
      <tr class="text-left">
        <th class="p-2">NO</th>
        <th class="p-2">Academic Session</th>
        <th class="p-2">Payment Description</th>
        <th class="p-2">Level</th>
        <th class="p-2">Action</th>
      </tr>
    </thead>
    <tbody class="">
      @foreach ($payments as $payment)
      <tr class="border odd:bg-gray-50 text-left">
        <td class="p-2">{{$loop->iteration }}</td>
        <td class="p-2">{{ dateSession($payment->date_payed) }}</td>
        <td class="p-2 capitalize">{{ $payment->purpose }}</td>
        <td class="p-2 capitalize">{{ $payment->user->level }}</td>
        <td class="p-2">
          <a href="javascript:void(0)" class="py-1 px-2 bg-yellow-500 text-white rounded text-sm" wire:click="query({{ $payment->id }})">Query</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@if ($user->reversals->count() > 0)
<div class="rounded shadow-sm bg-white divide-y flex flex-col space-y-4 overflow-hidden w-full box-border px-0 pb-4 ">
  <div class="div flex p-2 justify-between border-b bg-white">
    <h1 class="flex space-x-3 items-center">
      <span class="text-green-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
      </span>
      <span class="font-bold text-xl">Payment Reversals</span>
    </h1>
    <button class="text-gray-500">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>
  <table class="w-11/12 mx-auto shadow-sm mb-4 rounded  box-border border-collapse">
    <thead class="p-2 text-left">
      <tr class="text-left">
        <th class="p-2">NO</th>
        <th class="p-2">Payment Amount</th>
        <th class="p-2">Purpose</th>
        <th class="p-2">Status</th>
        {{-- <th class="p-2">Date</th> --}}
      </tr>
    </thead>
    <tbody class="">
      @foreach ($user->reversals as $reversal)
      <tr class="border odd:bg-gray-50 text-left">
        <td class="p-2">{{$loop->iteration }}</td>
        <td class="p-2 capitalize">
          <span class="text-white px-2 py-1 rounded bg-green-500 text-sm">&#8358;{{ moneyFormat($reversal->payment->amount) }}</span>
        </td>
        <td class="p-2 capitalize">{{ $reversal->payment->purpose }}</td>
        <td class="p-2 capitalize">{{ $reversal->status }}</td>
        {{-- <td class="p-2">{{ date('Y-m-d') }}</td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<h1 class="text-2xl text-gray-400 text-center my-auto">No Reversal request yet, kindly click on query if made double payment, or got debited if the transaction is unsuccessful and you get debited</h1>
@endif
@else
<h1 class="text-2xl">No payment yet</h1>
@endif
