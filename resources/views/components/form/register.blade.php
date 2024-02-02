<div class="sample-transition relative flex flex-col text-gray-900 bg-transparent shadow-none rounded-xl bg-clip-border">
  <h4 class="block font-sans text-4xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
    Sign Up
  </h4>
  <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
    Share your moment, come Join to <strong class="font-medium text-red-900">Kalouki</strong>
  </p>
  <form action="{{ route('register.proses') }}" method="POST" class="max-w-screen-lg mt-8 mb-2 w-80 sm:w-96"
    autocomplete="off" spellcheck="false">
    @csrf
    <div class="flex flex-col gap-6 mb-1">
      <div>
        <div class="relative w-full min-w-[200px] h-10">
          <input type="text" name="nama" required
            @error('nama') value="" @else value="{{ old('nama') }}" @enderror
            class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900 tracking-wider"
            placeholder=" " /><label
            class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900 tracking-wide">Name
          </label>
        </div>
        @error('nama')
          <p class="flex items-center gap-1 mt-2 font-sans text-sm antialiased font-normal leading-normal text-red-300">
            <i class="fa-solid fa-circle-exclamation w-4 h-4 mr-2 text-red-500"></i>
            {{ $message }}
          </p>
        @enderror
      </div>
      <div>
        <div class="relative w-full min-w-[200px] h-10">
          <input type="text" name="username" required
            @error('username') value="" @else value="{{ old('username') }}" @enderror
            class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900 tracking-wider"
            placeholder=" " /><label
            class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900 tracking-wide">Username
          </label>
        </div>
        @error('username')
          <p class="flex items-center gap-1 mt-2 font-sans text-sm antialiased font-normal leading-normal text-red-300">
            <i class="fa-solid fa-circle-exclamation w-4 h-4 mr-2 text-red-500"></i>
            {{ $message }}
          </p>
        @enderror
      </div>
      <div>
        <div class="relative w-full min-w-[200px] h-10">
          <input type="email" name="email" required
            @error('email') value="" @else value="{{ old('email') }}" @enderror
            class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900 tracking-wider"
            placeholder=" " /><label
            class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900 tracking-wide">email
          </label>
        </div>
        @error('email')
          <p class="flex items-center gap-1 mt-2 font-sans text-sm antialiased font-normal leading-normal text-red-300">
            <i class="fa-solid fa-circle-exclamation w-4 h-4 mr-2 text-red-500"></i>
            {{ $message }}
          </p>
        @enderror
      </div>
      <div>
        <div id="password" class="relative w-full min-w-[200px] h-10">
          <div
            class="absolute grid w-5 h-5 place-items-center cursor-pointer text-blue-gray-500 top-2/4 right-3 -translate-y-2/4">
            <i id="password-toggle" class="fa-regular fa-eye-slash"></i>
          </div>
          <input type="password" name="password" required
            class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] !pr-9 border-blue-gray-200 focus:border-gray-900 tracking-wider"
            placeholder=" " />
          <label
            class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900 tracking-wide">
            password
          </label>
        </div>
        @error('password')
          <p class="flex items-center gap-1 mt-2 font-sans text-sm antialiased font-normal leading-normal text-red-300">
            <i class="fa-solid fa-circle-exclamation w-4 h-4 mr-2 text-red-500"></i>
            {{ $message }}
          </p>
        @enderror
      </div>
    </div>
    <button
      class="mt-6 block w-full select-none rounded-lg bg-gray-900 py-3 px-6 text-center align-middle font-sans text-base font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:bg-transparent focus:border-2 focus:border-red-900 focus:text-gray-900 focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none hover:-translate-y-2 duration-300 disabled:opacity-50 disabled:shadow-none"
      type="submit">
      sign up
    </button>
    <p class="text-center opacity-75 my-3">or</p>
    <a href="{{ route('google.auth') }}"
      class="align-middle w-full select-none font-sans font-bold text-center tracking-wider transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none py-3.5 px-7 rounded-lg border border-blue-gray-500 text-blue-gray-500 text-base focus:ring focus:ring-blue-gray-200 hover:text-blue-gray-900 hover:border-blue-gray-900 hover:-translate-y-2 active:opacity-[0.85] duration-300 flex justify-center items-center gap-3"
      type="button">
      <img src="{{ asset('assets/icon/google_icon.svg') }}" alt="metamask" class="w-5 h-5" />
      Continue with Google
    </a>
    <p
      class="block mt-4 font-sans tracking-wide text-base antialiased font-normal leading-relaxed text-center text-gray-700">
      Already have an account?
      <button id="swap" type="button" class="font-semibold tracking-wide text-gray-900"
        hx-get="{{ route('login') }}" hx-swap="outerHTML transition:true" hx-target="#form">
        Sign In
      </button>
    </p>
  </form>
</div>
