<section class="flex flex-col gap-10 lg:gap-10 p-5 lg:px-20 lg:p-5">
  {{-- title start --}}
  <div class="flex gap-5 items-center">
    <button wire:click="$parent.setComponent('index')"
      class="grid lg:hover:bg-gray-300 active:bg-gray-300 w-12 aspect-square text-3xl rounded-full place-content-center transition-all">
      <i class="bi bi-arrow-left"></i>
    </button>
    <div class="font-bold text-xl lg:text-2xl mb-1">Edit profile</div>
  </div>
  {{-- title end --}}
  {{-- header profile start --}}
  <form wire:submit='avatarUpdate' class="flex flex-col gap-5 items-center">
    <div class="relative flex gap-10 mx-auto w-fit">
      <input wire:model.live='avatar' id="uploadImage" type="file"
        class="absolute opacity-0 z-10 w-full h-full cursor-pointer">
      @if ($avatarProfile)
        <img id="imagePreview" src="{{ asset("storage/$avatarProfile") }}" alt="{{ $nama }}" draggable="false"
          class="inline-block h-28 lg:h-40 aspect-square !rounded-full ring-1 ring-gray-400 object-cover object-center" />
      @elseif ($avatar && !$errors->has('avatar'))
        <img id="imagePreview" src="{{ $avatar->temporaryUrl() }}" alt="{{ $nama }}" draggable="false"
          class="inline-block h-28 lg:h-40 aspect-square !rounded-full ring-1 ring-gray-400 object-cover object-center" />
      @else
        <div
          class="relative grid place-content-center bg-gray-300/70 h-28 lg:h-40 aspect-square text-6xl font-medium !rounded-full ring-1 ring-gray-400 object-cover object-center capitalize">
          {{ substr($nama, 0, 1) }}
        </div>
      @endif
      <div
        class="absolute bg-gray-300 h-10 lg:h-12 aspect-square rounded-full ring-1 ring-gray-400 grid place-content-center bottom-0 right-0 text-xl">
        <i class="bi bi-camera opacity-80"></i>
      </div>
    </div>
    @error('avatar')
      <p class="flex items-center gap-1 text-sm antialiased font-normal leading-normal text-red-500 mb-2">
        <i class="bi bi-info-circle-fill w-4 h-4 text-red-500"></i>
        {{ $message }}
      </p>
    @enderror
    <button type="submit" wire:loading.attr='disabled' wire:click='$parent.setComponent("detail")'
      class="block font-semibold text-center transition-all text-base py-2 md:py-3 px-6 w-full md:w-fit rounded-md bg-gray-300/70 text-gray-800 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
      type="button" data-ripple-dark="true">
      Save avatar</button>
  </form>
  {{-- header profile end --}}
  {{-- form start --}}
  <form wire:submit='update' autocomplete="off" spellcheck="false" class="flex flex-col gap-5">
    @csrf
    {{-- field name start --}}
    <div class="relative h-11 w-full min-w-[200px]">
      <input wire:model.blur='nama' placeholder="Standard" draggable="false"
        class="peer h-full w-full border-b border-gray-200 bg-transparent pt-4 pb-1.5 text-sm lg:text-base font-medium text-gray-700 tracking-wide outline outline-0 transition-all placeholder-shown:border-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100"
        value="{{ $nama }}" />
      <label
        class="after:content[''] pointer-events-none absolute left-0  -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-gray-500">
        Name
      </label>
    </div>
    @error('nama')
      <p class="flex items-center gap-1 text-sm antialiased font-normal leading-normal text-red-500 mb-2">
        <i class="bi bi-info-circle-fill w-4 h-4 text-red-500"></i>
        {{ $message }}
      </p>
    @enderror
    {{-- field name end --}}
    {{-- field username start --}}
    <div class="relative h-11 w-full min-w-[200px]">
      <input wire:model.blur='username' placeholder="Standard"
        class="peer h-full w-full border-b border-gray-200 bg-transparent pt-4 pb-1.5 text-sm lg:text-base font-medium text-gray-700 tracking-wide outline outline-0 transition-all placeholder-shown:border-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100"
        value="{{ $username }}" />
      <label
        class="after:content[''] pointer-events-none absolute left-0  -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-gray-500">
        Username
      </label>
    </div>
    @error('username')
      <p class="flex items-center gap-1 text-sm antialiased font-normal leading-normal text-red-500 mb-2">
        <i class="bi bi-info-circle-fill w-4 h-4 text-red-500"></i>
        {{ $message }}
      </p>
    @enderror
    {{-- field username end --}}
    {{-- field alamat start --}}
    <div class="relative h-11 w-full min-w-[200px]">
      <input wire:model.blur='alamat' placeholder="Standard"
        class="peer h-full w-full border-b border-gray-200 bg-transparent pt-4 pb-1.5 text-sm lg:text-base font-medium text-gray-700 tracking-wide outline outline-0 transition-all placeholder-shown:border-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100"
        value="{{ $alamat }}" />
      <label
        class="after:content[''] pointer-events-none absolute left-0  -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-gray-500">
        Address
      </label>
    </div>
    @error('alamat')
      <p class="flex items-center gap-1 text-sm antialiased font-normal leading-normal text-red-500 mb-2">
        <i class="bi bi-info-circle-fill w-4 h-4 text-red-500"></i>
        {{ $message }}
      </p>
    @enderror
    {{-- field alamat end --}}
    {{-- field bio start --}}
    <div class="relative w-full min-w-[200px]">
      <textarea wire:model.blur='bio'
        class="peer h-full min-h-[100px] w-full resize-none border-b border-x-0 border-t-0 border-gray-200 bg-transparent pt-4 pb-1.5 text-sm lg:text-base font-medium tracking-wide text-gray-700 outline outline-0 transition-all placeholder-shown:border-gray-200 focus:border-gray-900 focus:outline-0 disabled:resize-none disabled:border-0 disabled:bg-gray-50 outline-none focus:outline-none focus:ring-0"
        style="padding-left: 0;" placeholder=" ">{{ $bio }}</textarea>
      <label
        class="after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-0 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-900 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-gray-500">
        Bio
      </label>
    </div>
    @error('bio')
      <p class="flex items-center gap-1 text-sm antialiased font-normal leading-normal text-red-500 mb-2">
        <i class="bi bi-info-circle-fill w-4 h-4 text-red-500"></i>
        {{ $message }}
      </p>
    @enderror
    {{-- field bio end --}}
    <div>
      <button type="submit" wire:loading.attr="disabled" wire:target='update'
        class="block select-none rounded border w-fit border-red-600 py-3 px-6 text-center align-middle text-base lg:text-lg font-bold capitalize tracking-wider text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:bg-red-700 focus:text-gray-100 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
        type="button">
        <span wire:loading.remove wire:target='update'>Change</span>
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
    </div>
  </form>
  {{-- form end --}}
</section>

@script
  <script>
    let navbarHeight = document.querySelector('header').offsetHeight;
    let contentHeight = document.querySelector('#main');

    contentHeight.style.height = `calc(100vh - ${navbarHeight}px)`;
  </script>
@endscript
