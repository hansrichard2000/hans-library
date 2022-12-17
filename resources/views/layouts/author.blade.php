<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="{{asset('storage/hr-transparent-logo.png')}}">
    @vite(['resources/css/author.css', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top text-light navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('images/motogp-white-logo.svg')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto text-white">
                <li><a class="nav-link" href="/">Home</a></li>
                <li><a class="nav-link" href="/rider">Rider List</a></li>
                <li><a class="nav-link" href="/team">Teams List</a></li>
                <li><a class="nav-link" href="/constructor">Constructor List</a></li>
                @auth
                    @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                        <li><a class="nav-link" href={{route('admin.user.index')}}>Users List</a></li>
                    @endif
                @endauth
                <li><a class="nav-link active" href="/author">Website Maker</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
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
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        @yield('banner')
    </div>
</div>
@yield('content')
<footer class="bg-dark text-white">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col text-center">
                Copyright &#169; 2022
            </div>
        </div>
    </div>
</footer>
</body>
</html>