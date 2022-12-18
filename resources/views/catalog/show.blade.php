@extends('layouts.app')

@section('title')
    Lihat Koleksi | Perpustakaan Hans
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
                    <li><a class="nav-link" href="{{route('home.index')}}">Beranda</a></li>
                    <li><a class="nav-link active" href="{{route('collection.index')}}">Daftar Koleksi</a></li>
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
    <div class="container">
        &nbsp;
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="row">
                    <div class="col">
                        <h1 class="mb-3">{{ $collectionShow->collectionName }}</h1>
                    </div>
                    @can('member')
                    <div class="col">
                        <a href="{{route('collection.create')}}"><button type="button" class="btn btn-dark bg-gradient btn-md mt-2"><i
                                    class="bi bi-book-fill"></i> Pinjam</button></a>
                    </div>
                    @endcan
                    @can('admin')
                        <div class="col">
                            <a href="{{route('collections.edit', $collectionShow)}}"><button type="button" class="btn btn-primary btn-md mt-2"><i
                                        class="bi bi-pen-fill"></i> Edit</button></a>
                        </div>
                    @endcan
                </div>

                <p>By {{$collectionShow->collectionAuthor}}</p>

                @if($collectionShow->collectionImage)
                    <div style="max-height: 350px; overflow: hidden">
                        <img src="{{asset('storage/collectionImages/'.$collectionShow->collectionImage)}}" alt="{{ $collectionShow->collectionName }}" class="img-fluid">
                    </div>
                @else
                    <img src="{{asset('storage/images/notAvailable.jpg')}}" alt="{{ $collectionShow->collectionName }}" class="img-fluid">
                @endif

                <article class="my-3 fs-5">
                    {!! $collectionShow->collectionDesc !!}
                </article>


                <a href="{{route('collection.index')}}" class='d-block mt-3'>Kembali ke Daftar Koleksi</a>
            </div>
        </div>
    </div>
@endsection
