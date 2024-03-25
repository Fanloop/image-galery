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
        <img alt="photo {{ $user->nama }}" src="{{ asset("storage/{$user->avatar}") }}" draggable="false"
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
    <div class="w-full h-full overflow-x-hidden overflow-y-scroll no-scrollbar border-2 pb-20">
      <section class="h-full flex flex-col gap-3 lg:gap-3 p-5 lg:px-20 lg:p-5">
        {{-- title start --}}
        <div class="flex gap-3 justify-between items-center">
          <div class="flex gap-5 items-center">
            <a href="{{ $previousUrl }}" wire:navigate
              class="grid lg:hover:bg-gray-300 active:bg-gray-300 w-12 aspect-square text-3xl rounded-full place-content-center transition-all">
              <i class="bi bi-arrow-left"></i>
            </a>
            <div class="font-bold text-xl lg:text-2xl mb-1">Back</div>
          </div>
        </div>
        {{-- title end --}}
        {{-- content start --}}
        <div class="h-full flex flex-col items-start gap-5">
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
            <img src="{{ asset("storage/{$foto->path}") }}" alt="{{ $foto->judul }}" draggable="false"
              class="md:h-96 w-auto md:min-w-96 object-contain block">
            <div class="flex justify-between items-center p-3 text-base">
              <div>
                <button type="button" wire:click='like' class="flex gap-1 items-center font-semibold">
                  @if ($this->checkLike($foto->id))
                    <i class="bi bi-heart-fill text-red-600 text-xl"></i>
                  @else
                    <i class="bi bi-heart text-xl"></i>
                  @endif
                  {{ $foto->like->count() }}
                </button>
              </div>
              <button type="button" wire:click='download' wire:loading.attr='disabled'>
                <i class="bi bi-download"></i>
              </button>
            </div>
          </div>
          {{-- photo end --}}
        </div>
        {{-- content end --}}
        <div class="py-10">
          <livewire:component.list-komentar :id="$foto->id" />
        </div>
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
@endscript
