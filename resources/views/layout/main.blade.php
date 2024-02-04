@extends('base')

@push('script')
  <script>
    let navbarHeight = document.querySelector('header').offsetHeight;
    let contentHeight = document.querySelector('nav');

    contentHeight.style.height = `calc(100vh - ${navbarHeight}px)`;
  </script>
@endpush

@section('content')
  <main class="h-screen bg-gray-100 overflow-hidden">
    <header class="border-b border-gray-400 flex justify-between px-10 lg:pr-20 py-3 w-screen">
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
            <input type="text" placeholder="search"
              class="peer h-full w-full rounded-[7px] tracking-wider !border  !border-gray-300 border-t-transparent bg-transparent bg-white px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700  shadow-lg shadow-gray-900/5 outline outline-0 ring ring-transparent transition-all placeholder:text-gray-500 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2  focus:!border-gray-900 focus:border-t-transparent focus:!border-t-gray-900 focus:outline-0 focus:ring-gray-900/10 disabled:border-0 disabled:bg-blue-gray-50" />
          </div>
        </div>
      </div>
      {{-- search end --}}
    </header>
    <section class="flex h-full w-full">
      <nav class="hidden lg:flex flex-col gap-16 w-2/12 py-5 px-10">
        <ul class="flex flex-col gap-4">
          <li class="">
            <a href="" class="capitalize font-medium text-xl tracking-wide">
              home
            </a>
          </li>
          <li>
            <a href="" class="capitalize font-medium text-xl tracking-wide">
              search
            </a>
          </li>
          <li>
            <a href="" class="capitalize font-medium text-xl tracking-wide">
              upload
            </a>
          </li>
          <li>
            <a href="" class="capitalize font-medium text-xl tracking-wide">
              profile
            </a>
          </li>
        </ul>
        @auth
          <a href="{{ route('logout') }}"
            class="select-none rounded border border-red-600 py-3 px-6 text-center align-middle font-sans text-xl font-bold capitalize text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            type="button">
            Log Out
          </a>
        @else
          <a href="{{ route('login') }}"
            class="select-none rounded border border-red-600 py-3 px-6 text-center align-middle font-sans text-xl font-bold capitalize text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            type="button">
            Log In
          </a>
        @endauth
      </nav>
    </section>
  </main>
@endsection
