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
            <a href="{{ route('profile.user', ['id' => $gallery->user_id]) }}" wire:navigate
              class="grid lg:hover:bg-gray-300 active:bg-gray-300 w-12 aspect-square text-3xl rounded-full place-content-center transition-all">
              <i class="bi bi-arrow-left"></i>
            </a>
            <div class="font-bold text-xl lg:text-2xl mb-1">{{ $gallery->nama }}</div>
          </div>
          @if ($gallery->user_id == $user->id)
            <a href="{{ route('gallery.edit', ['idGallery' => $gallery->id]) }}" wire:navigate
              class="grid place-content-center font-semibold text-center transition-all text-base md:text-lg h-12 md:h-full px-6 rounded-md bg-red-700 text-gray-100 active:bg-transparent disabled:bg-transparent disabled:text-red-700 disabled:border disabled:border-red-700 hover:bg-transparent hover:text-red-700 hover:border hover:border-red-700"
              type="button">
              Edit Gallery
            </a>
          @endif
        </div>
        {{-- title end --}}
        <p>{{ $gallery->deskripsi }}</p>
        <p class="lg:text-right opacity-60 text-xs"><b>create at</b> {{ $gallery->created_at }}</p>
        {{-- content start --}}
        <div class="h-full flex flex-col gap-1">
          <div class="grid grid-cols-2 md:grid-cols-3 gap-1 md:gap-2">
            @if ($gallery->user_id == $user->id)
              <a href="{{ route('gallery.photo', ['idGallery' => $gallery->id]) }}" wire:navigate
                class="w-full max-w-full rounded-sm aspect-square bg-gray-300 flex flex-col justify-center items-center font-medium opacity-60">
                <i class="bi bi-plus-lg text-2xl"></i>
                <h3 class="text-xl">Add photo</h3>
              </a>
            @endif
            @forelse ($gallery->foto as $item)
              <a href="{{ route('gallery.photo.detail', ['id' => $item->id]) }}" class="hover:cursor-pointer"
                wire:navigate wire:key="{{ $item->id }}">
                <img class="w-full max-w-full object-cover object-center rounded-sm aspect-square"
                  src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->judul }}">
              </a>
            @empty
              <div class="col-span-2 md:col-span-3 text-center mt-52 opacity-50 font-medium md:text-lg">No Picture here
              </div>
            @endforelse
          </div>
        </div>
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
