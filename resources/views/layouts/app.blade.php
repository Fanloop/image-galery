<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @livewireStyles
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('style')
  <link rel="shortcut icon" href="{{ asset('assets/img/logo.jpeg') }}" type="image/x-icon">
  <title>{{ $title ?? 'testing' }}</title>
</head>

<body>
  {{ $slot }}
  @yield('content')
  @stack('script')
  @livewireScripts
</body>

</html>
