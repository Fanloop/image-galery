@extends('layout.main')

@section('profile')
  <a href="javascript:void(0)" class="flex gap-3 items-center capitalize font-bold text-xl tracking-normal">
    <box-icon type='solid' name='user' class="block"></box-icon>
    <span class="hidden lg:block">profile</span>
  </a>
@endsection

@push('script')
  @vite('resources/js/crop.js')
@endpush

@section('main')
  <section class="flex flex-col gap-10 lg:gap-10 p-5 lg:px-20 lg:p-5">
    {{-- title start --}}
    <div class="flex gap-5 items-center">
      <a href="{{ route('profile.user') }}" class="block lg:hidden">
        <box-icon name='arrow-back'></box-icon>
      </a>
      <a href="{{ route('profile.user') }}"
        class="hidden lg:grid hover:bg-gray-300 w-10 aspect-square rounded-full place-content-center">
        <box-icon name='arrow-back' size='md'></box-icon>
      </a>
      <div class="font-bold text-xl lg:text-2xl mb-1">Edit profile</div>
    </div>
    {{-- title end --}}
    {{-- header profile start --}}
    <div class="relative flex gap-10 mx-auto w-fit">
      <img id="crop" src="{{ $user->avatar }}" alt="{{ $user->nama }}" draggable="false"
        class="inline-block h-28 lg:h-40 object-cover object-center" />
      <div>
        <input id="uploadImage" type="file" class="absolute opacity-0 z-10 w-full h-full cursor-pointer">
        <img id="imagePreview" src="{{ $user->avatar }}" alt="{{ $user->nama }}" draggable="false"
          class="inline-block h-28 lg:h-40 aspect-square !rounded-full object-cover object-center" />
        <div
          class="absolute bg-gray-300 h-10 lg:h-12 aspect-square rounded-full grid place-content-center bottom-0 right-0">
          <box-icon type='solid' name='camera-plus' class="opacity-80 hidden lg:block"></box-icon>
          <box-icon type='solid' name='camera-plus' size='1.25rem' class="opacity-80 block lg:hidden"></box-icon>
        </div>
      </div>
    </div>
    {{-- header profile end --}}
    {{-- form start --}}
    <form action="" method="POST" autocomplete="off" spellcheck="false" class="flex flex-col gap-5">
      @csrf
      {{-- field name start --}}
      <div class="relative h-11 w-full min-w-[200px]">
        <input placeholder="Standard" draggable="false"
          class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 text-sm lg:text-base font-medium text-blue-gray-700 tracking-wide outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100"
          value="{{ $user->nama }}" />
        <label
          class="after:content[''] pointer-events-none absolute left-0  -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
          Name
        </label>
      </div>
      {{-- field name end --}}
      {{-- field username start --}}
      <div class="relative h-11 w-full min-w-[200px]">
        <input placeholder="Standard"
          class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 text-sm lg:text-base font-medium text-blue-gray-700 tracking-wide outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100"
          value="{{ $user->username }}" />
        <label
          class="after:content[''] pointer-events-none absolute left-0  -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
          Username
        </label>
      </div>
      {{-- field username end --}}
      {{-- field alamat start --}}
      <div class="relative h-11 w-full min-w-[200px]">
        <input placeholder="Standard"
          class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 text-sm lg:text-base font-medium text-blue-gray-700 tracking-wide outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100"
          value="{{ $user->alamat }}" />
        <label
          class="after:content[''] pointer-events-none absolute left-0  -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
          Address
        </label>
      </div>
      {{-- field alamat end --}}
      {{-- field bio start --}}
      <div class="relative w-full min-w-[200px]">
        <textarea
          class="peer h-full min-h-[100px] w-full resize-none border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 text-sm lg:text-base font-medium tracking-wide text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-900 focus:outline-0 disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50"
          style="padding-left: 0;" placeholder=" ">{{ $user->bio }}</textarea>
        <label
          class="after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-500 transition-all after:absolute after:-bottom-0 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-900 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
          Bio
        </label>
      </div>
      {{-- field bio end --}}
      <div class="flex gap-3 mb-5">
        <button type="button"
          class="block select-none rounded border w-fit border-red-600 py-3 px-6 text-center align-middle text-base lg:text-lg font-bold capitalize tracking-wider text-red-600 transition-all hover:bg-red-700 hover:text-gray-100 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button">
          Change
        </button>
      </div>
    </form>
    {{-- form end --}}
  </section>
@endsection
