@extends('dashboard.layouts.main')

@section('title')
    Dashboard | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}!</h1>
{{--        <h1 class="h2">Welcome back, Test</h1>--}}
    </div>
    @cannot('admin')
        <a href="{{route('collection.create')}}"><button type="button" class="btn btn-dark bg-gradient btn-lg p-3 m-5"><i
                    class="bi bi-book-fill"></i> Pinjam Koleksi</button></a>
    @endcannot

{{--    @if()--}}
@endsection
