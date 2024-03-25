<div class="flex flex-col p-3 gap-3">
  <div class="text-xl font-bold">Other people</div>
  @forelse ($allUser as $user)
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
    <div class="px-3">No user here</div>
  @endforelse
</div>
