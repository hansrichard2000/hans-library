@extends('layouts.app')

@section('title')
    Daftar Koleksi | Perpustakaan Hans
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
    <div class="container mt-2">
        &nbsp;
    </div>
    <div class="container mt-5">
        <div class="text-center mt-5">
            <h1>Daftar Koleksi</h1>
        </div>
    </div>
    <div class="container mt-3">
        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="row">
                <div class="card-body border-bottom">
                    <h5 class="card-title text-center">Cari Koleksi</h5>
                    <form class="row" method="POST" action="">
                        <div class="row row-cols-6">
                            <div class="col">
                                <div class="form-group text-center">
                                    <label for="collectionName">Judul</label>
                                    <input type="text" class="form-control" id="collectionName" name="collectionName">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group text-center">
                                    <label for="collectionSubject">Subjek</label>
                                    <input type="text" class="form-control" id="collectionSubject" name="collectionSubject">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group text-center">
                                    <label for="collectionAuthor">Pengarang</label>
                                    <input type="text" class="form-control" id="collectionAuthor" name="collectionAuthor">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group text-center">
                                    <label for="collectionPublisher">Penerbit</label>
                                    <input type="text" class="form-control" id="collectionPublisher" name="collectionPublisher">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group text-center">
                                    <label for="collectionPublishYear">Tahun Terbit</label>
                                    <input type="text" class="form-control" id="collectionPublishYear" name="collectionPublishYear">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group text-center">
                                    <label for="collectionType" >Tipe</label>
                                    <select id="collectionType" name="collectionType" class="custom-select form-control">
                                        @foreach ($collectionTypes as $collectionType)
                                            <option value="{{$collectionType->id}}">{{$collectionType->collectionTypeName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container d-flex justify-content-center align-items-center mt-3">
                            <input class="btn btn-dark bg-gradient" type="submit" id="search" name="search" value="Search">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @foreach($collections as $collection)
                        <article class="mb-5 border-bottom pb-4">
                            <div class="row row-cols-2">
                                <div class="col-sm-2 ms-5">
                                    <img class="img-fluid img-thumbnail" src="{{asset('storage/images/notAvailable.jpg')}}" alt="{{$collection->collectionName}}">
                                </div>
                                <div class="col-lg-9">
                                    <h2>{{$collection->collectionName}}</h2>
                                    <p>Penulis: {{$collection->collectionAuthor}}</p>
                                    <p>Penerbit: {{$collection->collectionPublisher}}</p>
                                    <p>Tahun Terbit: {{$collection->collectionPublishYear}}</p>
                                    <p>Tipe Koleksi: {{$collection->collectionType->collectionTypeName}}</p>
                                    @if($collection->collectionStatus->id == 1)
                                        <p class="text-success">Status: {{$collection->collectionStatus->collectionStatusName}}</p>
                                        <a href="{{route('collection.show', $collection)}}"><button type="button" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-eyeglasses"></i> Lihat</button></a>
                                        <a><button type="button" class="btn btn-dark bg-gradient btn-sm"><i
                                                    class="bi bi-book-fill"></i> Pinjam</button></a>
                                    @elseif($collection->collectionStatus->id == 2)
                                        <p class="text-danger">Status: {{$collection->collectionStatus->collectionStatusName}}</p>
                                        <a href="{{route('collection.show', $collection)}}"><button type="button" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-eyeglasses"></i> Lihat</button></a>
                                    @else
                                        <p class="text-warning">Status: {{$collection->collectionStatus->collectionStatusName}}</p>
                                        <a href="{{route('collection.show', $collection)}}"><button type="button" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-eyeglasses"></i> Lihat</button></a>
                                    @endif

{{--                                    <p class="justify-content-center">{{$collection->collectionDesc}}</p>--}}
                                </div>
                            </div>

                        </article>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
