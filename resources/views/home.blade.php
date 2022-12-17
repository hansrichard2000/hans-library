@extends('layouts.app')

@section('title')
    Beranda | Perpustakaan Hans
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg fixed-top text-light navbar-dark bg-dark bg-gradient shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('storage/hr-transparent-logo.png')}}" class="img-fluid" width="50" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto text-white">
                    <li><a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a></li>
                    <li><a class="nav-link" href="/catalog">Catalog</a></li>
                    @auth
                        @if(\illuminate\Support\Facades\Auth::user()->isAdmin())
                            <li><a class="nav-link" href={{route('admin.user.index')}}>Users List</a></li>
                        @endif
                    @endauth
                    <li><a class="nav-link" href="/author">Website Maker</a></li>
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
    <div class="cover">
        <div class="container">
            <div class="inner">
                <h1>Welcome at MotoGP 2020 Customized Website</h1>
                <h3>This Website will give you the information about the rider and the teams of 2020 Season. Enjoy!</h3>
            </div>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid bg-dark">
        <div class="container">
            <div class="row">
                <div class="col text-bold text-light text-left">
                    <h2 class="graduate">What is MotoGP&trade;?</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col text-justify text-light">
                    MotoGP&trade; is the premier class of motorcycle road racing events held on road circuits sanctioned by the Fédération Internationale de Motocyclisme (FIM). Independent motorcycle racing events have been held since the start of the twentieth century and large national events were often given the title Grand Prix.
                    The foundation of the Fédération Internationale de Motocyclisme as the international governing body for motorcycle sport in 1949 provided the opportunity to coordinate rules and regulations in order that selected events could count towards official World Championships. It is the oldest established motorsport world championship.
                    Now this motorcycling competition is entering for the 2020 season.
                </div>
            </div>

        </div>
    </div>
@endsection
