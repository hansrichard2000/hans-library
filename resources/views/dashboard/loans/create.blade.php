@extends('dashboard.layouts.main')

@section('title')
    Tambah Peminjaman | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Tambah Peminjaman Koleksi</h1>
    </div>

    <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
            <form action="{{route('loans.store')}}" method="POST">
                @csrf
                <div class="form-group m-4">
                    <label for="name">Nama Peminjam :</label>
                    <select id="name" name="name" class="custom-select form-control">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->id}} - {{$user->name}} - {{$user->email}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group m-4">
                    <label for="name">Koleksi Yang Dipinjam :</label>
                    <select id="collectionID" name="collectionID" class="custom-select form-control">
                        @foreach ($collections as $collection)
                            <option value="{{$collection->id}}">{{$collection->collectionCode}} {{$collection->collectionName}} - {{$collection->collectionType->collectionTypeName}}</option>
                        @endforeach
                    </select>
                </div>
                <input class="btn btn-primary ms-4" type="submit" id="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
@endsection
