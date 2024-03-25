<div>
  {{-- form komen start --}}
  <form wire:submit='sendCommend' autocomplete="off" spellcheck="false"
    class="flex flex-col md:flex-row gap-2 items-center w-full h-fit">
    <input wire:model='komentar' type="text" required id="simple-search"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg ring-0 focus:ring-0 focus:border-gray-900 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-whiborder-white dark:focus:border-white"
      placeholder="Add comment" />
    <button type="submit" wire:loading.attr='disabled' wire:target='sendCommend'
      class="flex items-center gap-3 min-w-full md:min-w-fit py-2.5 px-3 text-sm md:text-md font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
      send
    </button>
  </form>
  <h2 class="my-3 opacity-60">{{ $listKomen->count() }} comment</h2>
  {{-- form komen end --}}
  <div>
    @foreach ($listKomen as $komen)
      <div wire:key='{{ $komen->id }}'>
        <a href="{{ route('profile.user', ['id' => $komen->user->id]) }}" wire:navigate
          class="flex items-start w-full p-3 transition-all rounded-lg outline-none text-start hover:bg-red-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
          <div class="grid mr-4 place-items-center min-w-max">
            @if ($komen->user->avatar)
              <img alt="candice" src="{{ asset("storage/{$komen->user->avatar}") }}"
                class="inline-block h-10 w-10 !rounded-full ring-1 ring-gray-400 object-cover object-center" />
            @else
              <div
                class="grid place-content-center bg-gray-300 h-10 w-10 text-lg font-medium !rounded-full ring-1 ring-gray-400 object-cover object-center">
                {{ substr($komen->user->nama, 0, 1) }}
              </div>
            @endif
          </div>
          <div class="flex flex-col">
            <h6 class="block text-base antialiased font-semibold leading-relaxed tracking-normal text-blue-gray-900">
              {{ $komen->user->username }}
            </h6>
            <p>
              {{ $komen->komentar }}
            </p>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</div>
