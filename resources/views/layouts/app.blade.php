<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Style -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
  @include('layouts.navbar')
  @yield('content')
</body>
</html>