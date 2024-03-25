<div class="flex flex-col gap-5 lg:gap-10 w-full p-3 md:p-5 h-full">
  {{-- search start --}}
  <form class="flex flex-col md:flex-row gap-2 items-center w-full h-fit">
    <div class="relative w-full">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <i class="bi bi-journals"></i>
      </div>
      <input wire:model.live='search' type="text" id="simple-search" autocomplete="off" spellcheck="false"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg ring-0 focus:ring-0 focus:border-gray-900 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-whiborder-white dark:focus:border-white"
        placeholder="Search gallery name..." />
    </div>
    <button type="button" wire:click='$parent.setComponent("list-gallery")' wire:loading.attr='disabled'
      class="flex items-center gap-3 min-w-full md:min-w-fit py-1.5 px-3 text-sm md:text-md font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
      <i class="bi bi-list-ul text-lg"></i>
      <span class="leading-none">List gallery</span>
    </button>
  </form>
  {{-- search end --}}
  {{-- content start --}}
  <livewire:component.list-gallery wire:model='search' :id="$id" lazy />
  {{-- content end --}}
</div>
