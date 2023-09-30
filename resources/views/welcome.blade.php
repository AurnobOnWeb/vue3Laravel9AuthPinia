<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fullstack</title>

        <!-- Fonts -->
      
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-gray-200">
      <div id="app">

      </div>

      @vite('resources/js/app.js')
    </body>
</html>
