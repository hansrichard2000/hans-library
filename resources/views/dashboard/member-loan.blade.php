@extends('dashboard.layouts.main')

@section('title')
    Pinjaman Saya | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Daftar Pinjaman Pribadi</h1>
        {{--        <h1 class="h2">Welcome back, Test</h1>--}}
    </div>
    <div class="container">
        @if($loans->count())
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Koleksi</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Approvement</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($loans as $loan)
                    <tr>
                        {{--                    <th scope="row">{{ $index }}</th>--}}
                        <td>{{ $loan->id }}</td>
                        <td>{{ $loan->loan->collectionName }}</td>
                        <td>{{ $loan->borrower->name }}</td>
                        <td>
                            {{--                            {{ $loan->is_approved }}--}}
                            @if($loan->is_approved == 0) <p class="text-warning">Pending</p>
                            @elseif($loan->is_approved == 1) <p class="text-success">Approved</p>
                            @else<p class="text-danger">Rejected</p>
                            @endif
                        </td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->expiration_date }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center fs-4">Anda belum pernah meminjam</p>
        @endif

    </div>
@endsection
