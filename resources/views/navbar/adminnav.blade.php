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
<body>
<div id="app">
    @auth
    @if(Auth::user()->role == "admin")
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid d-flex justify-content-between align-items-center" style="padding-left: 50px">
            <a class="navbar-brand p-2" href="{{ url('/') }}">
                <img src="{{asset('logo/logo.png')}}" alt="" width="125px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>



            <div class="collapse navbar-collapse d-flex justify-content-between align-items-center" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto" >
                        <h2 class="text-center text-secondary " style="text-align: center">
                            Admin Panel
                        </h2>
                    </ul>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            @if(request()->is('admin/dashboard') )
                            <a href="{{route('admin.dashboard')}}" class="nav-link active">
                            <svg width="20" height="20" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="128" height="128" fill="url(#pattern0)"/>
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0" transform="scale(0.0078125)"/>
                                    </pattern>
                                    <image id="image0" width="128" height="128" xlink:href="data:image/png;base64,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"/>
                                </defs>
                            </svg>
                            Dashboard
                            </a>
                            @else
                                <a href=" {{route('admin.dashboard')}} "class="nav-link">
                                    <img src="{{asset('logo/dashboardin.png')}}" alt="" width="30px">
                                    Dashboard
                                </a>

                                @endif


                        </li>

                        <li class="nav-item">
                            @if(request()->is('admin/products'))
                                <a href="{{route('admin.products')}}" class="nav-link active">
                                    <img src="{{asset('logo/productsac.png')}}" alt="" width="30px">
                                    Products
                                </a>
                            @else
                                <a href="{{route('admin.products')}}" class="nav-link">

                                    <img src="{{asset('logo/box.png')}}" alt="" width="30px">
                                    Products
                                </a>
                            @endif

                        </li>

                        <li class="nav-item">
                            @if(request()->is('admin/users'))
                            <a href="{{route('admin.users')}}" class="nav-link active">

                                <img src="{{asset('logo/userac.png')}}" alt="" width="30px">
                                Users
                            </a>
                            @else
                                <a href="{{route('admin.users')}}" class="nav-link">

                                    <img src="{{asset('logo/user.png')}}" alt="" width="30px">
                                    Users
                                </a>
                                @endif

                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('editprof') }}">
                                    Edit profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @endif

    @if(Auth::user()->role == 'storage')
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container-fluid d-flex justify-content-between align-items-center" style="padding-left: 50px">
                    <a class="navbar-brand p-2" href="{{ url('/') }}">
                        <img src="{{asset('logo/logo.png')}}" alt="" width="125px">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>



                    <div class="collapse navbar-collapse d-flex justify-content-between align-items-center" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mx-auto" >
                            <h2 class="text-center text-secondary " style="text-align: center">
                                Storage Keeper Panel
                            </h2>
                        </ul>


                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav">

                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button  type="submit" class="btn btn-outline-danger">Log Out</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        @if(Auth::user()->role == "cashier")
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container-fluid d-flex justify-content-between align-items-center" style="padding-left: 50px">
                    <a class="navbar-brand p-2" href="{{ url('/') }}">
                        <img src="{{asset('logo/logo.png')}}" alt="" width="125px">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>



                    <div class="collapse navbar-collapse d-flex justify-content-between align-items-center" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mx-auto" >
                            <h2 class="text-center text-secondary " style="text-align: center">
                                Cashier Panel
                            </h2>
                        </ul>


                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav">

                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

    @endauth
    @guest
    @endguest
    <main class="py-4">
        @yield('content')
    </main>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('success'))
    <script>
        swal("Good job!", "Pembayaran Telah Berhasil", "success");
    </script>
    @endif
@stack('script')
</body>

</html>
