<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>
  <body>
    <x-sidebar></x-sidebar>
    <div class="lg:ml-64">
      <div class="container mx-auto">
          {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('js/admin/admin.js') }}"></script>
  </body>
</html>