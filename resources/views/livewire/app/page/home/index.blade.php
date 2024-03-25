<div class="flex flex-col gap-5 p-5">
  {{-- content start --}}
  @forelse ($image as $foto)
    <div class="flex flex-col items-start gap-5" wire:key='{{ $foto->id }}'>
      {{-- profile start --}}
      <a href="{{ route('profile.user', ['id' => $foto->user->id]) }}" wire:navigate
        class="flex items-center w-full transition-all rounded-lg outline-none text-start hover:bg-red-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
        <div class="grid mr-4 place-items-center">
          @if ($foto->user->avatar)
            <img alt="candice" src="{{ asset("storage/{$foto->user->avatar}") }}" draggable="false"
              class="relative inline-block h-12 w-12 !rounded-full ring-1 ring-gray-400 object-cover object-center" />
          @else
            <div
              class="relative grid place-content-center bg-gray-300 h-12 w-12 text-lg font-medium !rounded-full ring-1 ring-gray-400 object-cover object-center">
              {{ substr($foto->user->nama, 0, 1) }}
            </div>
          @endif
        </div>
        <div>
          <h6 class="block text-base antialiased font-semibold leading-relaxed tracking-normal text-blue-gray-900">
            {{ $foto->user->username }}
          </h6>
          <p class="block text-sm antialiased font-normal leading-normal text-gray-700">
            {{ $foto->user->nama }}
          </p>
        </div>
      </a>
      {{-- profile end --}}
      {{-- descripsi start --}}
      @if (!empty($foto->deskripsi))
        <p class="font-medium">{{ $foto->deskripsi }}</p>
      @endif
      {{-- descripsi end --}}
      {{-- photo start --}}
      <div>
        <a href="{{ route('gallery.photo.detail', ['id' => $foto->id]) }}" wire:navigate>
          <img src="{{ asset("storage/{$foto->path}") }}" alt="{{ $foto->judul }}" draggable="false"
            class="md:h-96 w-auto md:min-w-96 object-contain block">
        </a>
        <div class="flex justify-between items-center p-3 text-base">
          <div>
            <button type="button" wire:click='like("{{ $foto->id }}")'
              class="flex gap-1 items-center font-semibold">
              @if ($this->checkLike($foto->id))
                <i class="bi bi-heart-fill text-red-600 text-xl"></i>
              @else
                <i class="bi bi-heart text-xl"></i>
              @endif
              {{ $foto->like->count() }}
            </button>
          </div>
          <div class="flex gap-5">
            <a href="{{ route('gallery.photo.detail', ['id' => $foto->id]) }}" wire:navigate>
              <i class="bi bi-chat-dots text-xl"></i>
            </a>
            <button type="button" wire:click='download("{{ $foto->path }}")' wire:loading.attr='disabled'>
              <i class="bi bi-download text-xl"></i>
            </button>
          </div>
        </div>
      </div>
      {{-- photo end --}}
    </div>
    <hr>
  @empty
    <div></div>
  @endforelse
  {{-- content end --}}
</div>
