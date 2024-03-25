<div class="grid grid-cols-2 md:grid-cols-3 gap-1 md:gap-2">
  @foreach ($likes as $like)
    <a href="{{ route('gallery.photo.detail', ['id' => $like->foto_id]) }}" class="hover:cursor-pointer" wire:navigate
      wire:key="{{ $like->id }}">
      <img class="w-full max-w-full object-cover object-center rounded-sm aspect-square"
        src="{{ asset("storage/{$like->foto->path}") }}" alt="{{ $like->foto->judul }}">
    </a>
  @endforeach
</div>
