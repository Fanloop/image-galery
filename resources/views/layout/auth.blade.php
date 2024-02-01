@extends('base')

@push('style')
  <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}">
@endpush
@push('script')
  <script src="{{ asset('assets/js/auth/main.js') }}"></script>
@endpush

@section('content')
  <div id="form">

    <div class="flex justify-evenly items-center min-h-screen py-5">
      {{-- image start --}}
      <div class="hidden lg:block self-stretch my-auto">
        <img src="{{ asset('assets/img/Online gallery.gif') }}" draggable="false" alt="gif" loading="lazy">
      </div>
      {{-- image end --}}

      {{-- form start --}}
      <div class="">
        @yield('form')
      </div>
      {{-- form end --}}
    </div>
  </div>
@endsection
