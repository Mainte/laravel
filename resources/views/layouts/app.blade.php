<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
            
        @section('icon')
        <link rel="shortcut icon" type="image/ico" href="{{ url('favicon.ico') }}" />
        @show

        @section('css')
        <link media="all" type="text/css" rel="stylesheet" href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}">
        <link media="all" type="text/css" rel="stylesheet" href="{{ url('/assets/fontAwesome/css/font-awesome.min.css') }}">
        <link media="all" type="text/css" rel="stylesheet" href="{{ url('/css/style.css') }}">
        @show
    </head>
    <body>
        <div id="filtro"></div>
        @section('menu')
            @include('layouts.menu')
        @show

        @section('container')
            @yield('content')
        @show
        
        @section('bottom')
            @include('layouts.bottom')
        @show

        @section('js')
        <script src="{{ url('/assets/jquery/js/jquery-2.2.3.min.js') }}" ></script>
        <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>   
        <script src="{{ url('/assets/areyousure/jquery.are-you-sure.js') }}"></script>
        <script src="{{ url('/assets/areyousure/ays-beforeunload-shim.js') }}"></script> 
        <script src="{{ url('/js/script.js') }}"></script>
        <script>$(function(){ $('form').areYouSure(); });</script>
        @show
    </body>
</html>
