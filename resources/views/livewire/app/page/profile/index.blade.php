<section class="relative flex flex-col gap-5 p-5 lg:p-20">
  {{-- header start --}}
  <div class="flex flex-col lg:flex-row items-center gap-3 lg:gap-5 h-fit">
    @if ($user->avatar)
      <img src="{{ $user->avatar }}" alt="{{ $user->nama }}" draggable="false"
        class="inline-block h-24 lg:h-32 aspect-square !rounded-full object-cover object-center" />
    @else
      <div
        class="relative grid place-content-center bg-gray-300/70 h-24 lg:h-32 aspect-square text-4xl lg:text-6xl font-medium !rounded-full ring-1 ring-gray-400 object-cover object-center">
        {{ substr($user->nama, 0, 1) }}
      </div>
    @endif
    <div class="flex flex-col items-center text-gray-900 lg:items-start gap-1 justify-center h-full">
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
      <button type="button" class="group hover:underline underline-offset-2 transition-all">{{ $userFollowing }} <span
          class="group-hover:text-gray-900/80 text-gray-900/55 font-medium">Following</span>
      </button>
      <button type="button" class="group hover:underline underline-offset-2 transition-all">{{ $userFollower }} <span
          class="group-hover:text-gray-900/80 text-gray-900/55 font-medium">Followers</span></button>
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
    @if ($user->id == Auth::user()->id)
      {{-- edit start --}}
      <button type="button" wire:loading.attr='disabled' wire:click='$parent.setComponent("detail")'
        class="block font-semibold text-center transition-all text-base py-2 md:py-3 px-6 w-full md:w-fit rounded-md bg-gray-300 text-gray-900 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
        type="button" data-ripple-dark="true">
        Edit profile</button>
      {{-- edit end --}}
      {{-- share start --}}
      <button type="button" data-modal-target="crypto-modal" data-modal-toggle="crypto-modal"
        class="block font-semibold text-center transition-all text-base py-2 md:py-3 px-6 w-full md:w-fit rounded-md bg-gray-300 text-gray-900 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
        data-ripple-light="true" data-dialog-target="animated-dialog">
        Share Profile
      </button>
      <!-- Share modal -->
      <div id="crypto-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto backdrop-blur-sm overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Share Profile
              </h3>
              <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="crypto-modal">
                <i class="bi bi-plus-lg text-lg rotate-45"></i>
                <span class="sr-only">Close modal</span>
              </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
              <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Share your profile to another platform</p>
              <ul class="my-4 space-y-3">
                <li>
                  <a href="https://www.instagram.com" target="_blank"
                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <img src="{{ asset('assets/icon/Instagram_logo.svg') }}" alt="instagram" class="h-5">
                    <span class="flex-1 ms-3 whitespace-nowrap">Instagram</span>
                    <span
                      class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span>
                  </a>
                </li>
                <li>
                  <a href="https://www.facebook.com" target="_blank"
                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <img src="{{ asset('assets/icon/Facebook_logo.svg') }}" alt="facebook" class="h-5">
                    <span class="flex-1 ms-3 whitespace-nowrap">Facebook</span>
                  </a>
                </li>
                <li>
                  <a href="https://www.twitter.com" target="_blank"
                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <img src="{{ asset('assets/icon/X_logo.svg') }}" alt="instagram" class="h-4">
                    <span class="flex-1 ms-3 whitespace-nowrap">X</span>
                  </a>
                </li>
              </ul>
              <div class="inline-flex items-center text-xs text-gray-500 dark:text-gray-400">
                &copy; copyright
                <a href="https://github.com/Fanloop" target="_blank" class="ml-1 font-bold hover:underline">
                  Fanloop (Fahri Prayoga)</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- share end --}}
    @else
      <button type="button" wire:loading.attr='disabled' wire:click='follow'
        class="grid place-content-center font-semibold text-center transition-all text-base md:text-xl py-3 h-12 px-6 w-1/2 md:w-1/4 rounded-full @if ($following < 1) bg-red-700 text-gray-100 active:bg-transparent disabled:bg-transparent disabled:text-red-700 disabled:border disabled:border-red-700 hover:bg-transparent hover:text-red-700 hover:border hover:border-red-700 @else bg-transparent text-red-700 disabled:bg-red-700 disabled:text-gray-100 border border-red-700 hover:bg-red-700 hover:text-gray-100 hover:border-none @endif"
        type="button" data-ripple-dark="true">
        @if ($following < 1)
          Follow
        @else
          Following
        @endif
      </button>
    @endif
  </div>
  {{-- body end --}}
  {{-- content start --}}
  <div>
    {{-- header content start --}}
    <div id="menu" wire:ignore
      class="sticky z-20 top-0 flex bg-gray-100 after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:w-1/2 after:h-[0.15rem] after:bg-black after:transition-all after:-translate-x-full">
      <button type="button" wire:click="setComponent('gallery')"
        class="flex gap-3 items-center justify-center py-3 w-full capitalize font-bold text-xl tracking-normal cursor-pointer">
        <i class="bi bi-folder-fill"></i>
        <span class="hidden lg:block">Gallery</span>
      </button>
      <button type="button" wire:click="setComponent('list-photo')"
        class="flex gap-3 items-center justify-center py-3 w-full capitalize font-medium text-xl tracking-normal cursor-pointer">
        <i class="bi bi-heart"></i>
        <span class="hidden lg:block">Like</span>
      </button>
    </div>
    {{-- header content end --}}
    {{-- body content start --}}
    <div id="content" class="block">
      <div>
        <livewire:dynamic-component :component="$component" :key="$component" :idUser="$user->id" />
      </div>
    </div>
    {{-- body content end --}}
  </div>
  {{-- conten end --}}
</section>

@script
  <script>
    const menu = document.querySelector("#menu") ?? undefined;
    const button1 = menu.children[0] ?? undefined;
    const button2 = menu.children[1] ?? undefined;
    let translateClass = "after:-translate-x-full";
    let fontBoldClass = "font-bold";
    let fontMediumClass = "font-medium";

    button1.addEventListener("click", () => {
      button2.classList.add(fontMediumClass);
      button2.classList.remove(fontBoldClass);
      button2.children[0].classList.add("bi-heart");
      button2.children[0].classList.remove("bi-heart-fill");
      if (!menu.classList.contains(translateClass)) {
        menu.classList.add(translateClass);
        button1.classList.add(fontBoldClass);
        button1.classList.remove(fontMediumClass);
        button1.children[0].classList.add("bi-folder-fill");
        button1.children[0].classList.remove("bi-folder");
      }
    });
    button2.addEventListener("click", () => {
      button1.classList.add(fontMediumClass);
      button1.classList.remove(fontBoldClass);
      button2.classList.add(fontBoldClass);
      button2.classList.remove(fontMediumClass);
      button1.children[0].classList.add("bi-folder");
      button1.children[0].classList.remove("bi-folder-fill");
      button2.children[0].classList.add("bi-heart-fill");
      button2.children[0].classList.remove("bi-heart");
      if (menu.classList.contains(translateClass)) {
        menu.classList.remove(translateClass);
      }
    });
  </script>
@endscript
