@extends('layout.main')

@section('profile')
  <a href="javascript:void(0)" class="flex gap-3 items-center capitalize font-bold text-xl tracking-normal">
    <box-icon type='solid' name='user' class="block"></box-icon>
    <span class="hidden lg:block">profile</span>
  </a>
@endsection

@push('script')
  <script src="{{ asset('assets/js/core/moreText.js') }}"></script>
  <script src="{{ asset('assets/js/core/dropdown.js') }}"></script>
  <script src="{{ asset('assets/js/core/menu.js') }}"></script>
@endpush

@section('main')
  <section class="relative flex flex-col gap-5 p-5 lg:p-20">
    {{-- header start --}}
    <div class="flex flex-col lg:flex-row items-center gap-3 lg:gap-5 h-fit">
      <img src="{{ $user->avatar }}" alt="{{ $user->nama }}" draggable="false"
        class="inline-block h-24 lg:h-32 aspect-square !rounded-full object-cover object-center" />
      <div class="flex flex-col items-center lg:items-start gap-1 justify-center h-full">
        <h2 class="font-semibold text-lg lg:text-3xl lg:tracking-wide">
          {{ $user->username }}
        </h2>
        <h3 class="font-medium text-base lg:text-xl opacity-70">{{ $user->nama }}</h3>
      </div>
    </div>
    @if (!empty($user->alamat))
      <h3 class="flex font-medium -mt-3 text-base opacity-70 italic break-words w-full">
        <box-icon name='map' class="opacity-65"></box-icon>
        <p>{{ $user->alamat }}</p>
      </h3>
    @endif
    {{-- header end --}}
    {{-- body start --}}
    <div>
      <div class="flex justify-center lg:justify-start gap-5 font-bold opacity-100 tracking-wide text-base lg:text-lg">
        <p>10 <span class="opacity-60 font-medium">Following</span>
        </p>
        <p>1102 <span class="opacity-60 font-medium">Followers</span></p>
      </div>
    </div>
    {{-- bio start --}}
    <div>
      @if (!empty($user->alamat))
        <h3 class="flex lg:hidden font-medium text-base opacity-70 italic break-words w-fit">
          <box-icon name='map' class="opacity-65" size='sm'></box-icon>
          <p>{{ $user->alamat }}medan, sumatra utara</p>
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
      <a href="{{ route('profile.edit') }}"
        class="block font-semibold text-center transition-all text-base py-2 md:py-3 px-6 w-full md:w-fit rounded-md bg-gray-300 text-gray-900 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
        type="button" data-ripple-dark="true">
        Edit profile</a>
      <a href=""
        class="block font-semibold text-center transition-all text-base py-2 md:py-3 px-6 w-full md:w-fit rounded-md bg-gray-300 text-gray-900 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
        type="button" data-ripple-dark="true">
        Share profile</a>
    </div>
    {{-- body end --}}
    {{-- content start --}}
    <div>
      <div id="menu"
        class="sticky z-20 top-0 flex bg-gray-100 after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:w-1/2 after:h-[0.15rem] after:bg-black after:transition-all after:-translate-x-full">
        <button role="button"
          class="flex gap-3 items-center justify-center py-3 w-full capitalize font-bold text-xl tracking-normal cursor-pointer">
          <box-icon name='folder' class="hidden"></box-icon>
          <box-icon name='folder' type='solid'></box-icon>
          <span class="hidden lg:block">Gallery</span>
        </button>
        <button role="button"
          class="flex gap-3 items-center justify-center py-3 w-full capitalize font-bold text-xl tracking-normal cursor-pointer">
          <box-icon name='heart' type='solid' class="hidden"></box-icon>
          <box-icon name='heart'></box-icon>
          <span class="hidden lg:block">Like</span>
        </button>
      </div>
      {{-- gallery start --}}
      <div id="content" class="flex">
        <x-list.gallery />
        <x-list.photo />
      </div>
      {{-- gallery end --}}
    </div>
    {{-- conten end --}}
  </section>
@endsection
