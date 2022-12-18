@extends('dashboard.layouts.main')

@section('title')
    Permintaan Pinjaman | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Daftar Permintaan Pinjaman</h1>
        <a href="{{route('loans.create')}}"><button type="button" class="btn btn-dark bg-gradient btn-md p-3 me-4"><i
                    class="bi bi-file-plus"></i> Tambah Peminjaman</button></a>
    </div>
    <div class="container">
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
                    <th class="text-center">Actions</th>
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


                        <td class="text-center">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <form action="{{route('loans.approve')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="loan" value="{{$loan->id}}">
                                        <button class="btn btn-success" title="Approve" type="submit">Approve</button>
                                    </form>
{{--                                    <a class="btn btn-success" href="{{ route('loans.approve', $loan) }}">Approve</a>--}}
                                </div>
                                <div class="col-md-4">
                                    <form action="{{route('loans.reject')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="loan" value="{{$loan->id}}">
                                        <button class="btn btn-danger" title="Reject" type="submit">Reject</button>
                                    </form>
{{--                                    <a class="btn btn-danger" href="{{ route('loans.reject', $loan) }}">Reject</a>--}}
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('loans.edit', $loan->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
