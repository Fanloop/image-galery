<main class="h-screen bg-gray-100 overflow-hidden">
  <header class="border-b border-gray-400 flex justify-between px-5 lg:px-10 lg:pr-20 py-3 w-screen">
    {{-- logo start --}}
    <div class="flex items-center gap-1">
      <img src="{{ asset('assets/img/logo.jpeg') }}" alt="logo kalouki"
        class="relative inline-block h-10 lg:h-11 aspect-square mix-blend-multiply !rounded-none object-cover object-center" />
      <h1 class="flex items-baseline text-2xl font-semibold">Kalou</span>
        <span class="text-red-600 font-bold mr-1">Ki</span><span
          class="inline-block h-2 aspect-square rounded-full border-2 border-gray-200 outline outline-2 outline-gray-900  bg-red-600">
      </h1>
    </div>
    {{-- logo end --}}
    {{-- profile start --}}
    <div class="relative hidden lg:flex flex-col group/dropdown">
      @if ($user->avatar)
        <img alt="photo {{ $user->nama }}" src="{{ asset("storage/{$user->avatar}") }}"
          class="inline-block object-cover object-center w-11 h-11 rounded-full cursor-pointer" />
      @else
        <div
          class="relative grid place-content-center bg-gray-300/70 h-11 w-11 text-lg font-medium !rounded-full ring-1 ring-gray-400 object-cover object-center capitalize">
          {{ substr($user->nama, 0, 1) }}
        </div>
      @endif
      <div class="hidden group-hover/dropdown:block">
        <ul
          class="absolute translate-x-1/2 right-1/2 z-10 flex min-w-[180px] flex-col gap-2 overflow-auto rounded-md border border-gray-50 bg-white p-3 font-sans text-sm font-normal text-gray-500 shadow-lg shadow-gray-500/10 focus:outline-none">
          <a wire:navigate href="{{ route('profile.user') }}"
            class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-gray-50 hover:bg-opacity-80 hover:text-gray-900 focus:bg-gray-50 focus:bg-opacity-80 focus:text-gray-900 active:bg-gray-50 active:bg-opacity-80 active:text-gray-900 group">
            <i class="bi bi-person-circle text-xl"></i>
            <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
              My Profile
            </p>
          </a>
          <button
            class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-gray-50 hover:bg-opacity-80 hover:text-gray-900 focus:bg-gray-50 focus:bg-opacity-80 focus:text-gray-900 active:bg-gray-50 active:bg-opacity-80 active:text-gray-900 group">
            <i class="bi bi-person-vcard text-xl"></i>
            <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
              Edit Profile
            </p>
          </button>
          <hr class="border-gray-300" />
          <a href="{{ route('logout') }}"
            class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-gray-50 hover:bg-opacity-80 hover:text-gray-900 focus:bg-gray-50 focus:bg-opacity-80 focus:text-gray-900 active:bg-gray-50 active:bg-opacity-80 active:text-gray-900 group">
            <i class="bi bi-door-open text-xl"></i>
            <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
              Log Out
            </p>
          </a>
        </ul>
      </div>
    </div>
    {{-- profile end --}}
  </header>
  <section id="main" class="flex flex-col-reverse lg:flex-row h-full w-full">
    {{-- navbar start --}}
    <nav
      class="flex items-center lg:flex-col gap-16 bg-gray-100 w-full lg:w-3/12 py-4 lg:py-5 lg:px-10 border-t lg:border-t-0 lg:border-r border-gray-400 sticky lg:static bottom-0 z-50">
      <ul class="flex flex-row lg:flex-col lg:gap-4 justify-evenly w-full">
        <li class="">
          <a href="{{ route('home') }}"
            class="flex gap-3 items-center capitalize font-medium hover:font-semibold text-xl tracking-wide"
            wire:navigate>
            <i class="bi bi-house-door text-2xl"></i>
            <span class="hidden lg:block">home</span>
          </a>
        </li>
        <li>
          <a href="{{ route('search') }}"
            class="flex gap-3 items-center capitalize font-medium hover:font-semibold text-xl tracking-wide"
            wire:navigate>
            <i class="bi bi-search text-2xl"></i>
            <span class="hidden lg:block">search</span>
          </a>
        </li>
        <li>
          <a href="{{ route('upload') }}" class="flex gap-3 items-center capitalize font-bold text-xl tracking-normal">
            <i class="bi bi-plus-square text-2xl"></i>
            <span class="hidden lg:block">upload</span>
          </a>
        </li>
        <li>
          <a href="{{ route('profile.user') }}"
            class="flex gap-3 items-center capitalize font-medium hover:font-semibold text-xl tracking-wide"
            wire:navigate>
            <i class="bi bi-person text-2xl"></i>
            <span class="hidden lg:block">profile</span>
          </a>
        </li>
      </ul>
      @auth
        <a href="{{ route('logout') }}"
          class="hidden lg:block select-none rounded border w-full border-red-600 py-3 px-6 text-center align-middle text-xl font-bold capitalize text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button">
          Log Out
        </a>
      @else
        <a href="{{ route('login') }}"
          class="hidden lg:block select-none rounded border w-full border-red-600 py-3 px-6 text-center align-middle text-xl font-bold capitalize text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button">
          Log In
        </a>
      @endauth
    </nav>
    {{-- navbar end --}}
    <div class="w-full h-full overflow-x-hidden overflow-y-scroll border-2 no-scrollbar">
      <section class="h-full flex flex-col gap-3 lg:gap-5 p-5 lg:px-20 lg:p-5">
        {{-- title start --}}
        <div class="flex flex-col md:flex-row gap-3 md:justify-between lg:items-center">
          <div class="flex gap-5 items-center">
            <a href="{{ route('gallery', ['idGallery' => $gallery->id]) }}" wire:navigate
              class="grid lg:hover:bg-gray-300 active:bg-gray-300 w-12 aspect-square text-3xl rounded-full place-content-center transition-all">
              <i class="bi bi-arrow-left"></i>
            </a>
            <div class="font-bold text-xl lg:text-2xl mb-1">{{ $gallery->nama }}</div>
          </div>
        </div>
        {{-- title end --}}
        {{-- content start --}}
        <form wire:submit='update' class="w-full" autocomplete="off" spellcheck="false">
          {{-- field alamat start --}}
          <div class="w-full min-w-[200px] mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gallery
              name</label>
            <input wire:model="nama" type="text" id="nama"
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
            <label for="description"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea wire:model='deskripsi' id="description" rows="4"
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
          <div class="flex justify-between">
            <button type="submit" wire:loading.attr='disabled' wire:target='update'
              class="block select-none rounded border w-fit border-red-600 py-3 px-6 text-center align-middle text-base lg:text-lg font-bold capitalize tracking-wider text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:bg-red-700 focus:text-gray-100 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button">
              <span wire:loading.remove wire:target='update'>Update</span>
              {{-- loader start --}}
              <svg wire:loading wire:target='update' aria-hidden="true"
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

            {{-- tombol hapus start --}}
            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
              class="block select-none rounded border w-fit bg-red-700 border-red-600 py-3 px-6 text-center align-middle text-base lg:text-lg font-bold capitalize tracking-wider text-gray-100 transition-all hover:bg-transparent hover:text-red-600 focus:bg-red-700 focus:text-gray-100 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button">
              Delete album
            </button>

            <div id="popup-modal" tabindex="-1"
              class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                  <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                      delete this album?</h3>
                    <button data-modal-hide="popup-modal" type="button" wire:click='delete'
                      class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                      Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal" type="button"
                      class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                      cancel</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- tombol hapus end --}}
          </div>
          {{-- button end --}}
        </form>
        {{-- content end --}}
      </section>
    </div>
    <div class="hidden lg:block border-l border-gray-400 w-5/12">
      <livewire:component.recomend />
    </div>
  </section>
</main>

@script
  <script>
    let navbarHeight = document.querySelector('header').offsetHeight;
    let contentHeight = document.querySelector('#main');

    contentHeight.style.height = `calc(100vh - ${navbarHeight}px)`;
  </script>
  <script src="{{ asset('assets/js/core/moreText.js') }}"></script>
  <script src="{{ asset('assets/js/core/menu.js') }}"></script>
  <script src="{{ asset('assets/js/core/dropdown.js') }}"></script>
@endscript
