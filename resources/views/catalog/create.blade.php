@extends('layouts.app')
@section('title')
    Form Pengajuan Pinjam Koleksi | Perpustakaan Hans
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
    <br><br>
    <div class="container mt-5">
        <h2>Form Peminjaman Koleksi</h2>
        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <form action="{{route('collection.store')}}" method="POST">
                    @csrf
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="collection" class="text-light">Rider's Name :</label>
                                <input type="" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="number" class="text-light">Race Number :</label>
                                <input type="number" class="form-control" id="number" name="number" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nation" class="text-light">Nation :</label>
                        <input type="text" class="form-control" id="nation" name="nation" required>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="date" class="text-light">Date of Birth :</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="place" class="text-light">Place of Birth :</label>
                                <input type="text" class="form-control" id="place" name="place">
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="height" class="text-light">Heigth (cm):</label>
                                <input type="number" class="form-control" id="height" name="height">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="weight" class="text-light">Weigth (kg):</label>
                                <input type="number" class="form-control" id="weight" name="weight">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="podiums" class="text-light">Podiums:</label>
                        <input type="number" class="form-control" id="podiums" name="podiums">
                    </div>
                    <div class="form-group">
                        <label for="wins" class="text-light">Wins :</label>
                        <input type="number" class="form-control" id="wins" name="wins">
                    </div>
                    <div class="form-group">
                        <label for="title" class="text-light">World Championship Title:</label>
                        <input type="number" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description" class="text-light">Description : </label>
                        <textarea rows="4" class="form-control" id="description" name="description"></textarea>
                    </div>
{{--                    <input type="hidden" name="created_by" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">--}}
                    <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection
