<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>
  <body>
    <x-navbar></x-navbar>
    {{ $slot }}

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>