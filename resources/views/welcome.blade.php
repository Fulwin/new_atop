<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- csrf-token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

        <div id="app">
            <router-view></router-view>
        </div>
        
        <!-- scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
