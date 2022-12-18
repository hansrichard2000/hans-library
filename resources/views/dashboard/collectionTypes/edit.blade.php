@extends('dashboard.layouts.main')

@section('title')
    Edit Tipe Koleksi | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Edit Tipe Koleksi</h1>
    </div>

    <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
            <form action="{{route('collection-type.update', $collectionType)}}" method="POST">
                @method('put')
                @csrf
                <div class="form-group mb-3">
                    <label for="collectionTypeName" class="form-label">Nama Tipe Koleksi</label>
                    <input type="text" class="form-control @error('collectionTypeName') is-invalid @enderror" id="collectionTypeName" name="collectionTypeName"
                           required autofocus value="{{ old('collectionTypeName', $collectionType->collectionTypeName) }}">
                    @error('collectionTypeName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <input class="btn btn-primary ms-4" type="submit" id="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
@endsection
