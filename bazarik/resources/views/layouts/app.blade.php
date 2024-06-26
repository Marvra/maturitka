<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bazarik</title>

    <link rel="icon" href="{{ asset('images/site/bazarik-fav.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-primary"  style="--bs-bg-opacity: .05;">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm ">
            <div class="container ms-4">
                <a href="{{ url('/ok') }}" class="navbar-brand"> 
                    <img style="height: 45px; width: 250px" src="{{ asset('images/site/bazarik-logo.png') }}" alt="logo">  
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <form action="/search" method="GET">
                        <div class="input-group ms-4" style="width: 800px">
                            <input type="search" name="search" class="form-control rounded" placeholder="Vyhľadaj" aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="btn btn-outline-primary">Vyhľadaj</button>
                        </div>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-5">
                        <div class="pe-4"><a href="
                            @guest
                                {{ route('login') }}
                            @else
                                /ok/create
                            @endguest
                                " class="btn btn-primary">Vytvor</a>
                        </div>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Prihlásenie</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrácia</a>
                                </li>
                            @endif
                        @else
                            <img src="{{ asset('images/profile/' .  Auth::user()->profile_pic) }}" width="40" height="40" class="rounded-circle border">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/ok/user/{{ Auth::user()->id }}" class="mt-3">
                                        Profil
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Odhlásenie
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

            <div class="">
                <main class="pt-4 ps-2">
                    @yield('content')
                </main>
            </div>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
