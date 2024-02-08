@extends('base')

@push('script')
  <script>
    let navbarHeight = document.querySelector('header').offsetHeight;
    let contentHeight = document.querySelector('#main');

    contentHeight.style.height = `calc(100vh - ${navbarHeight}px)`;
  </script>
@endpush

@section('content')
  <main class="h-screen bg-gray-100 overflow-hidden">
    <header class="border-b border-gray-400 flex justify-between px-5 lg:px-10 lg:pr-20 py-3 w-screen">
      {{-- logo start --}}
      <div class="flex items-center gap-1">
        <img src="{{ asset('assets/img/logo.jpeg') }}" alt="avatar"
          class="relative inline-block h-10 lg:h-11 aspect-square mix-blend-multiply !rounded-none object-cover object-center" />
        <h1 class="text-2xl font-medium tracking-wide">Kalouki</h1>
      </div>
      {{-- logo end --}}
      {{-- search start --}}
      <div class="hidden lg:block">
        <div class="w-72">
          <div class="relative h-10 w-full ">
            <input type="text" placeholder="Search"
              class="peer h-full w-full rounded-[7px] tracking-wider !border  !border-gray-400 border-t-transparent bg-transparent bg-white px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700  shadow-lg shadow-gray-900/5 outline outline-0 ring ring-transparent transition-all placeholder:text-gray-700 focus:placeholder:text-gray-500 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2  focus:!border-red-500 focus:border-t-transparent focus:!border-t-red-500 focus:outline-0 focus:ring-gray-900/10 disabled:border-0 disabled:bg-blue-gray-50" />
          </div>
        </div>
      </div>
      {{-- search end --}}
      {{-- profile start --}}
      <div class="relative hidden lg:flex flex-col group/dropdown">
        <img alt="photo {{ $user->nama }}" src="{{ $user->avatar }}"
          class="inline-block object-cover object-center w-11 h-11 rounded-full cursor-pointer" />
        <div class="hidden group-hover/dropdown:block">
          <ul
            class="absolute translate-x-1/2 right-1/2 z-10 flex min-w-[180px] flex-col gap-2 overflow-auto rounded-md border border-blue-gray-50 bg-white p-3 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">
            <button
              class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 group">
              <box-icon type='solid' name='user-circle'
                class="opacity-45 group-hover:opacity-75 transition-all"></box-icon>
              <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
                My Profile
              </p>
            </button>
            <button
              class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 group">
              <box-icon name='credit-card-front' type='solid'
                class="opacity-45 group-hover:opacity-75 transition-all"></box-icon>
              <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
                Edit Profile
              </p>
            </button>
            <hr class="border-blue-gray-50" />
            <a href="{{ route('logout') }}"
              class="flex w-full cursor-pointer select-none items-center gap-2 rounded-md px-3 pt-[9px] pb-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 group">
              <box-icon name='log-out' class="opacity-45 group-hover:opacity-75 transition-all"></box-icon>
              <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
                Sign Out
              </p>
            </a>
          </ul>
        </div>
      </div>
      {{-- profile end --}}
    </header>
    <section id="main" class="flex flex-col-reverse lg:flex-row h-full w-full">
      <nav
        class="flex items-center lg:flex-col gap-16 w-full lg:w-3/12 py-4 lg:py-5 lg:px-10 border-t lg:border-t-0 lg:border-r border-gray-400 sticky lg:static bottom-0">
        <ul class="flex flex-row lg:flex-col lg:gap-4 justify-evenly w-full">
          <li class="">
          @section('home')
            <a href=""
              class="flex gap-3 items-center capitalize font-medium hover:font-semibold text-xl tracking-wide">
              <box-icon name='home' class="block"></box-icon>
              <span class="hidden lg:block">home</span>
            </a>
          @show
        </li>
        <li>
          @section('search')
            <a href=""
              class="flex gap-3 items-center capitalize font-medium hover:font-semibold text-xl tracking-wide">
              <box-icon name='search' class="block"></box-icon>
              <span class="hidden lg:block">search</span>
            </a>
          @show
        </li>
        <li>
          @section('upload')
            <a href=""
              class="flex gap-3 items-center capitalize font-medium hover:font-semibold text-xl tracking-wide">
              <box-icon name='message-square-add' class="block"></box-icon>
              <span class="hidden lg:block">upload</span>
            </a>
          @show
        </li>
        <li>
          @section('profile')
            <a href="{{ route('profile') }}"
              class="flex gap-3 items-center capitalize font-medium hover:font-semibold text-xl tracking-wide">
              <box-icon name='user' class="block"></box-icon>
              <span class="hidden lg:block">profile</span>
            </a>
          @show
        </li>
      </ul>
      @auth
        <a href="{{ route('logout') }}"
          class="hidden lg:block select-none rounded border w-full border-red-600 py-3 px-6 text-center align-middle font-sans text-xl font-bold capitalize text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button">
          Log Out
        </a>
      @else
        <a href="{{ route('login') }}"
          class="hidden lg:block select-none rounded border w-full border-red-600 py-3 px-6 text-center align-middle font-sans text-xl font-bold capitalize text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button">
          Log In
        </a>
      @endauth
    </nav>
    <div class="w-full h-full overflow-x-hidden overflow-y-scroll border-2 no-scrollbar">
      @yield('main')
    </div>
    <div class="hidden lg:block border-l border-gray-400 w-5/12">
      @yield('sidebar')
    </div>
  </section>
</main>
@endsection
