<main class="h-screen bg-gray-100 overflow-hidden">
  <header class="border-b border-gray-400 flex justify-between px-5 lg:px-10 lg:pr-20 py-3 w-screen">
    {{-- logo start --}}
    <div class="flex items-center gap-1">
      <img src="{{ asset('assets/img/logo.jpeg') }}" alt="logo kalouki"
        class="relative inline-block h-10 lg:h-11 aspect-square mix-blend-multiply !rounded-none object-cover object-center" />
      <h1 class="flex items-baseline text-2xl font-semibold">Kalou</span>
        <span class="text-red-800 font-bold mr-1">Ki</span><span
          class="inline-block h-2 aspect-square rounded-full border-2 border-gray-200 outline outline-2 outline-gray-900  bg-red-800">
      </h1>
    </div>
    {{-- logo end --}}
    {{-- profile start --}}
    <div class="relative hidden lg:flex flex-col group/dropdown">
      @if ($user->avatar)
        <img alt="photo {{ $user->nama }}" src="{{ $user->avatar }}"
          class="inline-block object-cover object-center w-11 h-11 rounded-full cursor-pointer" />
      @else
        <div
          class="relative grid place-content-center bg-gray-300 h-11 w-11 text-lg font-medium !rounded-full ring-1 ring-gray-400 object-cover object-center">
          {{ substr($user->nama, 0, 1) }}
        </div>
      @endif
      <div class="hidden group-hover/dropdown:block">
        <ul
          class="absolute translate-x-1/2 right-1/2 z-10 flex min-w-[180px] flex-col gap-2 overflow-auto rounded-md border border-blue-gray-50 bg-white p-3 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">
          <a wire:navigate href="{{ route('profile.user') }}"
            class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 group">
            <i class="bi bi-person-circle text-xl"></i>
            <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
              My Profile
            </p>
          </a>
          <button
            class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 group">
            <i class="bi bi-person-vcard text-xl"></i>
            <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
              Edit Profile
            </p>
          </button>
          <hr class="border-blue-gray-50" />
          <a href="{{ route('logout') }}"
            class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 group">
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
          <a href="javascript:void(0)" class="flex gap-3 items-center capitalize font-bold text-xl tracking-normal">
            <i class="bi bi-search text-2xl"></i>
            <span class="hidden lg:block">search</span>
          </a>
        </li>
        <li>
          <a href="{{ route('upload') }}"
            class="flex gap-3 items-center capitalize font-medium hover:font-semibold text-xl tracking-wide"
            wire:navigate>
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
      <livewire:app.page.search.index />
    </div>
    <div class="hidden lg:block border-l border-gray-400 w-5/12">
      @yield('sidebar')
    </div>
  </section>
</main>

@script
  <script>
    let navbarHeight = document.querySelector('header').offsetHeight;
    let contentHeight = document.querySelector('#main');

    contentHeight.style.height = `calc(100vh - ${navbarHeight}px)`;
  </script>
@endscript
