<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <title>Админка</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/bootstrap.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
@if(!(Auth::user()))
    @include('auth.login')
@else
    @include('admin.layouts.header')
    <main role="main" class="flex-shrink-0 mb-5">
        @include('layouts.flashMessage')
        @yield('content')
    </main>
    @include('admin.layouts.footer')
@endif
<script type="text/javascript" src="{{asset('/js/jquery-home.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
@if(View::hasSection('javascript'))
    @yield('javascript')
@endif
</body>
</html>
