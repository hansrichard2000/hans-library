@extends('layouts.app')

@section('title')
    Beranda | Perpustakaan Hans
@endsection

@section('content')
    <nav class="navbar navbar-expand-md fixed-top text-light navbar-dark bg-dark bg-gradient shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{route('home.index')}}">
                <img src="{{asset('storage/hr-transparent-logo.png')}}" width="50" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li><a class="nav-link active" href="{{route('home.index')}}">Beranda</a></li>
                    <li><a class="nav-link" href="{{route('collection.index')}}">Daftar Koleksi</a></li>
                    @auth
                        <li><a class="nav-link" href="{{route('dashboard.index')}}">Dashboard</a></li>
                    @endauth
                    <li><a class="nav-link" href="{{route('author.index')}}">Tentang</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
    <div class="bg-image img-fluid d-flex justify-content-center align-items-center cover">
        <div class="inner">
            <h1 class="text-white">Selamat Datang di Persputakaan Hans</h1>
            <h3 class="text-white">Website ini memberikan informasi koleksi dan layanan peminjaman untuk seluruh literatur yang
                tersedia</h3>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center">
        <a href="{{route('collection.index')}}"><button type="button" class="btn btn-dark bg-gradient btn-lg p-3 m-5"><i
                    class="bi bi-search"></i> Katalog Online</button></a>
        @cannot('admin')
        <a href="{{route('collection.create')}}"><button type="button" class="btn btn-dark bg-gradient btn-lg p-3 m-5"><i
                    class="bi bi-book-fill"></i> Pinjam Koleksi</button></a>
        @endcannot
    </div>
@endsection


