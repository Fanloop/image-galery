<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @livewireStyles
  @vite('resources/css/app.css')
  @stack('style')
  <link rel="shortcut icon" href="href="{{ asset('assets/img/logo.jpeg') }}"" type="image/x-icon">
  <title>{{ $title ?? 'testing' }}</title>
</head>

<body>
  <div>
    <div id="form">
      <div class="flex justify-evenly items-center min-h-screen py-5">
        {{-- image start --}}
        <div class="hidden lg:block self-stretch my-auto">
          <img src="{{ asset('assets/img/Online gallery.gif') }}" draggable="false" alt="gif" loading="lazy">
        </div>
        {{-- image end --}}

        {{-- form start --}}
        <div>
          {{ $slot }}
        </div>
        {{-- form end --}}
      </div>
    </div>
  </div>
  @yield('content')
  @vite(['resources/js/app.js', 'resources/js/auth.js'])
  @stack('script')
  @livewireScripts
</body>

</html>
