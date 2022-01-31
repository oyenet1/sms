<div>
  <div class="my-6 mx-auto max-w-7xl">
    <div class="flex justify-between my-4">
      <input type="text" wire:model="search" class="py-1 border-none focus:outline-none ring-0 focus:ring-2 focus:ring-green-800 bg-white rounded-3xl w-48 text-gray-500">
      <div class="w-full max-w-md text-medium">{{ $events->links() }}</div>
    </div>
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-8 lg:gap-12">
      @foreach ($events as $item)
      <div class="rounded bg-white overflow-hidden relative transform transition duration-500 hover:scale-110">
        <img src="/img/event2.jpg" alt="" class="w-full">
        <div class="m-0 py-3 px-4 ">
          <p class="text-xl capitalize flex justify-between items-center">
            <span class="">{{ $item->name }}</span>
            <span class="font-semibold text-pink-600">&#8358;{{ moneyFormat($item->amount) }}</span>
          </p>
          <p class="absolute top-0 right-0 m-3 p-1 px-3 font-medium font-mono rounded-3xl text-xs bg-yellow-500 text-white">{{ returnDateTime($item->date) }}</p>
          <button wire:click="attend({{ $item->id }})" class="text-center border-2 capitalize rounded-3xl transform transition duration-500 my-3 w-full py-2 font-semibold hover:text-white border-pink-600 hover:bg-pink-600 text-pink-600">Click to attend</button>
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
