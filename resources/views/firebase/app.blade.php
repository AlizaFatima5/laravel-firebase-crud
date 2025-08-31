<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
      
         <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap 5.3.3 Bundle (CSS + JS + Popper) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        @include('firebase.inc.navbar');
        <div class="py-3">
@yield('content')
        </div>
    </body>
    </html>