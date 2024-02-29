<div class="h-full w-full">
  @forelse ($gallery as $item)
    {{-- item start --}}
    <a wire:key="{{ $item->id }}" href="{{ route('profile.user', ['id' => $item->id]) }}"
      class="flex items-center w-full p-3 transition-all rounded-lg outline-none text-start hover:bg-gray-200 hover:text-900 focus:bg-gray-50 focus:bg-opacity-80 focus:text-gray-900/75 active:bg-gray-50 active:bg-opacity-80 active:text-gray-900/75">
      <div class="grid mr-4 place-items-center">
        <i class="bi bi-journal-richtext text-3xl opacity-80"></i>
      </div>
      <div>
        <h6 class="block text-base antialiased font-semibold leading-relaxed tracking-normal text-gray-900/75">
          {{ $item->nama }}
        </h6>
      </div>
    </a>
    {{-- item end --}}
  @empty
    <button
      class="h-full w-full flex justify-center items-center flex-col gap-5 text-md md:text-lg font-medium opacity-60">
      <i class="bi bi-plus-circle text-5xl"></i>
      Add new gallery
    </button>
  @endforelse
</div>
