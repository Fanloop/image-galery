<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @livewireStyles
  @vite('resources/css/app.css')
  @stack('style')
  <title>Kalouki | {{ $title }}</title>
</head>

<body>
  @yield('content')
  @vite('resources/js/app.js')
  @stack('script')
  @livewireScripts
</body>

</html>
