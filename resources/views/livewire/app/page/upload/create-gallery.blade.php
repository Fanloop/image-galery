<section class="h-full flex flex-col gap-3 lg:gap-5 p-5 lg:px-20 lg:p-5">
  {{-- title start --}}
  <div class="flex flex-col md:flex-row gap-3 md:justify-between lg:items-center">
    <div class="flex gap-5 items-center">
      <button wire:click="$parent.setComponent('index')"
        class="grid lg:hover:bg-gray-300 active:bg-gray-300 w-12 aspect-square text-3xl rounded-full place-content-center transition-all">
        <i class="bi bi-arrow-left"></i>
      </button>
      <div class="font-bold text-xl lg:text-2xl mb-1">Add gallery</div>
    </div>
  </div>
  {{-- title end --}}
  {{-- content start --}}
  <form wire:submit='create' class="w-full" autocomplete="off" spellcheck="false">
    {{-- field alamat start --}}
    <div class="w-full min-w-[200px] mb-5">
      <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gallery name</label>
      <input wire:model.blur='nama' type="text" id="nama"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-900 focus:border-gray-900 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-900 dark:focus:border-gray-900 focus:ring-0"
        required placeholder="ex: kalouki file" />
      @error('nama')
        <p class="flex items-center gap-1 text-sm antialiased font-normal leading-normal text-red-500 mb-2">
          <i class="bi bi-info-circle-fill w-4 h-4 text-red-500"></i>
          {{ $message }}
        </p>
      @enderror
    </div>
    {{-- field alamat end --}}
    {{-- field bio start --}}
    <div class="w-full min-w-[200px] mb-5">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
      <textarea wire:model.blur='deskripsi' id="description" rows="4"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:border-gray-900 focus:border-graring-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-900 dark:focus:border-graring-gray-900 resize-none focus:ring-0"
        placeholder="optional"></textarea>
      @error('deskripsi')
        <p class="flex items-center gap-1 text-sm antialiased font-normal leading-normal text-red-500 mb-2">
          <i class="bi bi-info-circle-fill w-4 h-4 text-red-500"></i>
          {{ $message }}
        </p>
      @enderror
    </div>
    {{-- field bio end --}}
    {{-- button start --}}
    <button type="submit" wire:loading.attr='disabled' wire:target='create'
      class="block select-none rounded border w-fit border-red-600 py-3 px-6 text-center align-middle text-base lg:text-lg font-bold capitalize tracking-wider text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:bg-red-700 focus:text-gray-100 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
      type="button">
      <span wire:loading.remove wire:target='create'>Create</span>
      {{-- loader start --}}
      <svg wire:loading wire:target='create' aria-hidden="true"
        class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-red-600 m-auto" viewBox="0 0 100 101"
        fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
          fill="currentColor" />
        <path
          d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
          fill="currentFill" />
      </svg>
      {{-- loader start --}}
    </button>
    {{-- button end --}}
  </form>
  {{-- content end --}}
</section>

@script
  <script>
    let navbarHeight = document.querySelector('header').offsetHeight;
    let contentHeight = document.querySelector('#main');

    contentHeight.style.height = `calc(100vh - ${navbarHeight}px)`;
  </script>
@endscript
