<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!--google Font-->
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Play&display=swap" rel="stylesheet">

    </head>
    <body>
      <div id="app"></div>

      <script>
        var BASE_URL = '{{ URL::to('/') }}';
      </script>

      <script src="{{ asset('js/app.js') }}"></script>
     
  <!-- JS, Popper.js, and jQuery -->
 
    </body>
</html>
