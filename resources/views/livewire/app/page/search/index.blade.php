<div class="">
  {{-- search start --}}
  <div class="block w-full bg-gray-100 p-5 border-b border-gray-400 sticky top-0 z-50" :lazy="false">
    <div class="w-full">
      <div class="relative h-10 w-full">
        <input wire:model.live="searchUser" type="text" placeholder="Search"
          class="peer h-full w-full rounded-[7px] tracking-wider !border  !border-gray-400 border-t-transparent bg-transparent bg-white px-3 py-3 font-sans text-sm font-normal text-blue-gray-700  shadow-lg shadow-gray-900/5 outline outline-0 ring ring-transparent transition-all placeholder:text-gray-700 focus:placeholder:text-gray-500 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2  focus:!border-red-500 focus:border-t-transparent focus:!border-t-red-500 focus:outline-0 focus:ring-gray-900/10 disabled:border-0 disabled:bg-blue-gray-50" />
      </div>
    </div>
  </div>
  {{-- search end --}}
  {{-- list item start --}}
  <div class="flex min-w-[240px] flex-col gap-0 lg:gap-1 px-3 lg:px-5 py-5 text-base font-normal text-blue-gray-700">
    @forelse ($listUser as $user)
      {{-- item start --}}
      <a wire:key="{{ $user->id }}" href="{{ route('profile.user', ['id' => $user->id]) }}" wire:navigate
        class="flex items-center w-full p-3 transition-all rounded-lg outline-none text-start hover:bg-red-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
        <div class="grid mr-4 place-items-center">
          @if ($user->avatar)
            <img alt="candice" src="{{ asset("storage/{$user->avatar}") }}"
              class="relative inline-block h-12 w-12 !rounded-full ring-1 ring-gray-400 object-cover object-center" />
          @else
            <div
              class="relative grid place-content-center bg-gray-300 h-12 w-12 text-lg font-medium !rounded-full ring-1 ring-gray-400 object-cover object-center">
              {{ substr($user->nama, 0, 1) }}
            </div>
          @endif
        </div>
        <div>
          <h6 class="block text-base antialiased font-semibold leading-relaxed tracking-normal text-blue-gray-900">
            {{ $user->username }}
          </h6>
          <p class="block text-sm antialiased font-normal leading-normal text-gray-700">
            {{ $user->nama }}
          </p>
        </div>
      </a>
      {{-- item end --}}
    @empty
      <div></div>
    @endforelse
  </div>
  {{-- list item end --}}
</div>
