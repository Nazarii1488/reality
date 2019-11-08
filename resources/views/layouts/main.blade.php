<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <style>
            body{
                background-image: url('http://winallos.com/uploads/posts/2014-12/1418156322_blue-fon-green-abstract.jpg');
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/bootstrap.css" rel="stylesheet">
    </head>
    <body class="d-flex flex-column h-100">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    </body>
</html>
