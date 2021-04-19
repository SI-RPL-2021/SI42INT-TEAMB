<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-color: #14274E">
<h1 class="text-center h1 text-white font-weight-bold" ; style="margin-top: 10%;font-size: 200px">Pilih Disini</h1>
<div class="d-block mx-auto">
    <center>
<a href="{{route('index')}}" class="btn btn-light text-center p-3 rounded shadow"><img class="" src="{{asset('logo/logo.png')}}" alt=""></a>
        <p class="text-white mt-3 display-2">Sentuh Untuk Memulai</p>
    </center>
</div>
</body>
