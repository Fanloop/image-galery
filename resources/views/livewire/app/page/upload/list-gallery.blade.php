<section class="h-full flex flex-col gap-3 lg:gap-5 p-5 lg:px-20 lg:p-5">
  {{-- title start --}}
  <div class="flex flex-col md:flex-row gap-3 md:justify-between lg:items-center">
    <div class="flex gap-5 items-center">
      <button wire:click="$parent.setComponent('index')"
        class="grid lg:hover:bg-gray-300 active:bg-gray-300 w-12 aspect-square text-3xl rounded-full place-content-center transition-all">
        <i class="bi bi-arrow-left"></i>
      </button>
      <div class="font-bold text-xl lg:text-2xl mb-1">List gallery</div>
    </div>
    <button type="button" wire:loading.attr='disabled' wire:click='$parent.setComponent("create-gallery")'
      class="grid place-content-center font-semibold text-center transition-all text-base md:text-lg h-12 md:h-full px-6 rounded-md bg-red-700 text-gray-100 active:bg-transparent disabled:bg-transparent disabled:text-red-700 disabled:border disabled:border-red-700 hover:bg-transparent hover:text-red-700 hover:border hover:border-red-700"
      type="button">
      Add Gallery
    </button>
  </div>
  {{-- title end --}}
  {{-- content start --}}
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
  {{-- content end --}}
</section>

@script
  <script>
    let navbarHeight = document.querySelector('header').offsetHeight;
    let contentHeight = document.querySelector('#main');

    contentHeight.style.height = `calc(100vh - ${navbarHeight}px)`;
  </script>
@endscript
