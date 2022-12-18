@extends('dashboard.layouts.main')

@section('title')
    Edit Peminjaman | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Edit Peminjaman Koleksi</h1>
        <a href="{{route('loans.create')}}"><button type="button" class="btn btn-dark bg-gradient btn-md p-3 me-4"><i
                    class="bi bi-file-plus"></i> Tambah Peminjaman</button></a>
    </div>

    <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
            <form action="{{route('loans.update', $loan)}}" method="POST">
                @method('put')
                @csrf
                <div class="form-group m-4">
                    <label for="name">Nama Peminjam :</label>
                    <select id="name" name="name" class="custom-select form-control">
                        @foreach ($users as $user)
                            @if (old('name', $loan->userID) === $user->id)
                                <option value="{{ $user->id }}" selected>{{$user->id}} - {{$user->name}} - {{$user->email}}</option>
                            @else
                                <option value="{{$user->id}}">{{$user->id}} - {{$user->name}} - {{$user->email}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                <div class="form-group m-4">
                    <label for="name">Koleksi Yang Dipinjam :</label>
                    <select id="collectionID" name="collectionID" class="custom-select form-control">
                        @foreach ($collections as $collection)
                            @if (old('collectionID', $loan->collectionID) === $collection->id)
                                <option value="{{$collection->id}}" selected>{{$collection->collectionCode}} {{$collection->collectionName}} - {{$collection->collectionType->collectionTypeName}}</option>
                            @else
                                <option value="{{$collection->id}}">{{$collection->collectionCode}} {{$collection->collectionName}} - {{$collection->collectionType->collectionTypeName}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                <input class="btn btn-primary ms-4" type="submit" id="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
@endsection
