@extends('dashboard.layouts.main')

@section('title')
    Daftar Pengguna | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Daftar Pengguna</h1>
        <a href="{{route('users.create')}}"><button type="button" class="btn btn-dark bg-gradient btn-md p-3 me-4"><i
                    class="bi bi-file-plus"></i> Tambah Pengguna</button></a>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Role</th>
                    <th scope="col">is_active</th>
                    <th scope="col">is_login</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        {{--                    <th scope="row">{{ $index }}</th>--}}
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->role->roleName }}</td>
                        <td>{{ $user->is_active }}</td>
                        <td>{{ $user->is_login }}</td>
                        <td class="text-center">
                            <form action="{{ route('collections.destroy', $user->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('collections.edit', $user->id) }}">Edit</a>
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
