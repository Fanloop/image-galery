<section class="relative flex flex-col gap-5 p-5 lg:p-20">
  {{-- header start --}}
  <div class="flex flex-col lg:flex-row items-center gap-3 lg:gap-5 h-fit">
    @if ($user->avatar)
      <img src="{{ $user->avatar }}" alt="{{ $user->nama }}" draggable="false"
        class="inline-block h-24 lg:h-32 aspect-square !rounded-full object-cover object-center" />
    @else
      <div
        class="relative grid place-content-center bg-gray-300 h-24 lg:h-32 aspect-square text-4xl lg:text-6xl font-medium !rounded-full ring-1 ring-gray-400 object-cover object-center">
        {{ substr($user->nama, 0, 1) }}
      </div>
    @endif
    <div class="flex flex-col items-center lg:items-start gap-1 justify-center h-full">
      <h2 class="font-semibold text-lg lg:text-3xl lg:tracking-wide">
        {{ $user->username }}
      </h2>
      <h3 class="font-medium text-base lg:text-xl opacity-70">{{ $user->nama }}</h3>
    </div>
  </div>
  @if (!empty($user->alamat))
    <h3 class="flex items-center font-medium -mt-3 text-base opacity-70 italic break-words w-full">
      <i class="bi bi-geo-alt text-lg font-medium mr-1"></i>
      <p>{{ $user->alamat }}</p>
    </h3>
  @endif
  {{-- header end --}}
  {{-- body start --}}
  <div>
    <div class="flex justify-center lg:justify-start gap-5 font-bold opacity-100 tracking-wide text-base lg:text-lg">
      <p>0 <span class="opacity-60 font-medium">Following</span>
      </p>
      <p>0 <span class="opacity-60 font-medium">Followers</span></p>
    </div>
  </div>
  {{-- bio start --}}
  <div>
    @if (!empty($user->alamat))
      <h3 class="flex items-center lg:hidden font-medium text-base opacity-70 italic break-words w-fit">
        <i class="bi bi-geo-alt text-lg font-medium mr-1"></i>
        <p>{{ $user->alamat }}</p>
      </h3>
    @endif
    @if (!empty($user->bio))
      <div class="h-12 overflow-hidden">
        <p id="bio" class="break-words w-full">
          {{ $user->bio }}
        </p>
      </div>
    @endif
    <button id="more-hide" role="button"
      class="hidden bottom-0 right-0 bg-gray-200 opacity-95 font-bold italic cursor-pointer">more...</button>
  </div>
  {{-- bio end --}}
  <div class="flex justify-center gap-3">
    @if ($user)
      <button type="button" wire:loading.attr='disabled' wire:click='$parent.setComponent("detail")'
        class="block font-semibold text-center transition-all text-base py-2 md:py-3 px-6 w-full md:w-fit rounded-md bg-gray-300 text-gray-900 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
        type="button" data-ripple-dark="true">
        Edit profile</button>
    @else
      <a href=""
        class="block font-semibold text-center transition-all text-base py-2 md:py-3 px-6 w-full md:w-fit rounded-md bg-red-500 text-gray-900 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
        type="button" data-ripple-dark="true">
        Edit profile</a>
    @endif

    {{-- share start --}}
    <button
      class="block font-semibold text-center transition-all text-base py-2 md:py-3 px-6 w-full md:w-fit rounded-md bg-gray-300 text-gray-900 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
      data-ripple-light="true" data-dialog-target="animated-dialog">
      Share Profile
    </button>
    <div data-dialog-backdrop="animated-dialog" data-dialog-backdrop-close="true"
      class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
      <div data-dialog="animated-dialog" data-dialog-mount="opacity-100 translate-y-0 scale-100"
        data-dialog-unmount="opacity-0 -translate-y-28 scale-90 pointer-events-none"
        data-dialog-transition="transition-all duration-300"
        class="relative flex flex-col gap-4 lg:gap-5 m-4 py-4 px-10 lg:w-2/5 md:min-w-[60%] md:max-w-[60%] lg:min-w-[40%] lg:max-w-[40%] rounded-lg bg-white text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
        <div class="flex items-center text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
          Share This Profile
        </div>
        <div
          class="relative flex justify-center md:justify-start gap-3 text-base antialiased font-light leading-relaxed text-blue-gray-500">
          <a href="https://www.instagram.com/" target="_blank"
            class="grid place-content-center rounded-full aspect-square h-12 lg:h-14 text-xl text-red-500 border-2 border-red-500 hover:text-white hover:bg-red-500 transition-all">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="https://www.facebook.com/" target="_blank"
            class="grid place-content-center rounded-full aspect-square h-12 lg:h-14 text-xl text-blue-700 border-2 border-blue-700 hover:text-white hover:bg-blue-700 transition-all">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="https://www.twitter.com/" target="_blank"
            class="grid place-content-center rounded-full aspect-square h-12 lg:h-14 text-xl text-gray-900 border-2 border-gray-900 hover:text-white hover:bg-gray-900 transition-all">
            <i class="bi bi-twitter-x"></i>
          </a>
        </div>
        <div class="flex flex-wrap items-center justify-end shrink-0 text-blue-gray-500">
          <button data-ripple-dark="true" data-dialog-close="true"
            class="px-6 py-3 mr-1 text-xs font-bold text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
            Cancel
          </button>
        </div>
      </div>
    </div>
    {{-- share end --}}
  </div>
  {{-- body end --}}
  {{-- content start --}}
  <div>
    {{-- header content start --}}
    <div id="menu"
      class="sticky z-20 top-0 flex bg-gray-100 after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:w-1/2 after:h-[0.15rem] after:bg-black after:transition-all after:-translate-x-full">
      <button role="button" id="gallery-tab" data-target="gallery"
        class="flex gap-3 items-center justify-center py-3 w-full capitalize font-bold text-xl tracking-normal cursor-pointer">
        <i class="bi bi-folder-fill"></i>
        <span class="hidden lg:block">Gallery</span>
      </button>
      <button role="button" id="like-tab" data-target="like"
        class="flex gap-3 items-center justify-center py-3 w-full capitalize font-bold text-xl tracking-normal cursor-pointer">
        <i class="bi bi-heart"></i>
        <span class="hidden lg:block">Like</span>
      </button>
    </div>
    {{-- header content end --}}
    {{-- body content start --}}
    <div id="content" class="block">
      <div id="gallery">
        <x-list.gallery />
      </div>
    </div>
    {{-- body content end --}}
  </div>
  {{-- conten end --}}
</section>
