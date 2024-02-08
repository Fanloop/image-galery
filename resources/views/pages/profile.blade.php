@extends('layout.main')

@section('profile')
  <a href="javascript:void(0)" class="flex gap-3 items-center capitalize font-bold text-xl tracking-normal">
    <box-icon type='solid' name='user' class="block"></box-icon>
    <span class="hidden lg:block">profile</span>
  </a>
@endsection

@section('main')
  <section class="flex flex-col gap-5 lg:gap-10 p-5 lg:p-20">
    {{-- header start --}}
    <div class="flex flex-col lg:flex-row items-center gap-3 lg:gap-5 h-fit">
      <img src="{{ $user->avatar }}" alt="{{ $user->nama }}" draggable="false"
        class="relative inline-block h-24 lg:h-32 aspect-square !rounded-full object-cover object-center" />
      <div class="flex flex-col items-center lg:items-start gap-1 justify-center h-full">
        <h2 class="font-semibold text-lg lg:text-3xl lg:tracking-wide">
          {{ $user->username }}
        </h2>
        <h3 class="font-medium text-base lg:text-xl opacity-70">{{ $user->nama }}</h3>
      </div>
    </div>
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
      Lorem ipsum dolor sit, amet consectetur adipisicing elit.
    </div>
    {{-- bio end --}}
    <div class="flex justify-center gap-3">
      <a href=""
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
      <div class="flex">
        <div
          class="flex gap-3 items-center justify-center border-b-2 border-black py-3 w-full capitalize font-bold text-xl tracking-normal">
          <box-icon type='solid' name='folder-open'></box-icon>
          <span class="hidden lg:block">Gallery</span>
        </div>
        <div class="flex gap-3 items-center justify-center py-3 w-full capitalize font-bold text-xl tracking-normal">
          <box-icon name='heart'></box-icon>
          <span class="hidden lg:block">Like</span>
        </div>
      </div>
      {{-- gallery start --}}
      <div>

      </div>
      {{-- gallery end --}}
    </div>
    {{-- conten end --}}
  </section>
@endsection
