@extends('dashboard.layouts.main')

@section('title')
    Edit Penguna | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Pengguna</h1>
    </div>
    <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
            <form action="{{route('users.update', $user)}}" method="POST">
                @method('put')
                @csrf
                <div class="form-group m-4">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                               required autofocus value="{{ old('name', $user->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="form-group m-4">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                               disabled autofocus value="{{ old('email', $user->email) }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group m-4">
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="address" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                               autofocus value="{{ old('address', $user->address) }}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group m-4">
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                               autofocus value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group m-4">
                    <label for="role">Role Pengguna :</label>
                    <select id="role" name="role" class="custom-select form-control">
                        @foreach ($roles as $role)
                            @if(old('role', $user->roleID) === $role->id)
                                <option value="{{$role->id}}" selected>{{$role->roleName}}</option>
                            @else
                                <option value="{{$role->id}}">{{$role->roleName}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <input class="btn btn-primary ms-4" type="submit" id="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
@endsection
