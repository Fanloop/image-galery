<div class="h-full w-full">
  @forelse ($gallery as $item)
    {{-- item start --}}
    <button type="button" wire:key="{{ $item->id }}" wire:click='$parent.$parent.setComponent("upload")'
      class="flex items-center w-full p-3 transition-all rounded-lg outline-none text-start hover:bg-gray-200 hover:text-900 focus:bg-gray-50 focus:bg-opacity-80 focus:text-gray-900/75 active:bg-gray-50 active:bg-opacity-80 active:text-gray-900/75">
      <div class="grid mr-4 place-items-center">
        <i class="bi bi-journal-richtext text-3xl opacity-80"></i>
      </div>
      <div>
        <h6 class="block text-base antialiased font-semibold leading-relaxed tracking-normal text-gray-900/75">
          {{ $item->nama }}
        </h6>
      </div>
    </button>
    {{-- item end --}}
  @empty
    <button type="button" wire:loading.attr='disabled' wire:click='$parent.$parent.setComponent("create-gallery")'
      class="h-full w-full flex justify-center items-center flex-col gap-5 text-md md:text-lg font-medium opacity-60">
      <i class="bi bi-plus-circle text-5xl"></i>
      Add new gallery
    </button>
  @endforelse
</div>

@script
  <script>
    initFlowbite();
  </script>
@endscript
