@extends('dashboard.layouts.main')

@section('title')
    Tipe Collection | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Daftar Tipe Koleksi</h1>
        {{--        <h1 class="h2">Welcome back, Test</h1>--}}
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
                            <form action="{{ route('collections.destroy', $collectionType->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('collections.show', $collectionType) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('collections.edit', $collectionType->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
