<div class="h-full flex flex-col gap-1">
  @forelse ($gallery as $item)
    {{-- item start --}}
    <a href="{{ route('gallery', ['idGallery' => $item->id]) }}" wire:key="{{ $item->id }}" wire:navigate
      :idAlbum="{{ $item->id }}"
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
    <div class="h-full w-full grid place-content-center text-md md:text-lg font-medium opacity-60">
      You don't have any gallery
    </div>
  @endforelse
</div>
@script
  <script>
    initFlowbite();
  </script>
@endscript
