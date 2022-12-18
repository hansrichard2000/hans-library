@extends('dashboard.layouts.main')

@section('title')
    Tipe Collection | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Daftar Tipe Koleksi</h1>
        <a href="{{route('collection-type.create')}}"><button type="button" class="btn btn-dark bg-gradient btn-md p-3 me-4"><i
                    class="bi bi-file-plus"></i> Tambah Tipe Koleksi</button></a>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Collection Type Name</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($collectionTypes as $collectionType)
                    <tr>
                        {{--                    <th scope="row">{{ $index }}</th>--}}
                        <td>{{ $collectionType->id }}</td>
                        <td>{{ $collectionType->collectionTypeName }}</td>
                        <td class="text-center">
                            <a class="btn btn-primary" href="{{ route('collection-type.edit', $collectionType) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
