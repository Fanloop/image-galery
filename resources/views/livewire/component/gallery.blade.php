<div id="accordion-collapse" data-accordion="collapse">
  @forelse ($gallery as $item)
    <div wire:key="{{ $item->id }}">
      <h2 id="accordion-collapse-heading-{{ $item->id }}">
        <button type="button"
          class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
          data-accordion-target="#accordion-collapse-body-{{ $item->id }}" aria-expanded="false"
          aria-controls="accordion-collapse-body-{{ $item->id }}">
          <div class="flex gap-3 items-center">
            <i class="bi bi-folder text-lg"></i>
            <span>{{ $item->nama }}</span>
          </div>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5 5 1 1 5" />
          </svg>
        </button>
      </h2>
      <div id="accordion-collapse-body-{{ $item->id }}" class="hidden"
        aria-labelledby="accordion-collapse-heading-{{ $item->id }}">
        <div
          class="flex flex-col @if (!empty($item->foto) && count($item->foto) > 0) gap-2 p-5 @endif border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
          @forelse ($item->foto as $foto)
            <a href="#{{ $foto->id }}"
              class="w-full p-3 rounded-md text-left text-gray-500 dark:text-gray-400 hover:text-gray-900 hover:bg-gray-200 transition-all">
              <i class="bi bi-image text-lg me-2"></i>
              <span>{{ $foto->judul }}</span>
            </a>
          @empty
            <div></div>
          @endforelse
        </div>
      </div>
    </div>
  @empty
    <div></div>
  @endforelse
</div>

@script
  <script>
    initFlowbite();
  </script>
@endscript
