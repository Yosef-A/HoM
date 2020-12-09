<!--<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    
      
     
    </head>
    <body>
        <div id="app">
          <router-view></router-view>
          <hr>
          <router-link to="/">Home</router-link>
          <router-link to="/about">About</router-link> 
         <router-link :to="{name:'about'}">About</router-link> 
        </div>
        <script src="/js/app.js"> </script>
    </body>
</html>
-->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>App Example</title>
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
   <div id="app"></div>
   <script>
      var BASE_URL = '{{ URL::to('/') }}'; 
   </script>
      
       <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
