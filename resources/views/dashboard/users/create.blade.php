@extends('dashboard.layouts.main')

@section('title')
    Tambah Penguna | Perpustakaan Hans
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Pengguna Baru</h1>
    </div>
    <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="form-group m-4">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                               required autofocus value="{{ old('name') }}">
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
                               required autofocus value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group m-4">
                    <label for="password" class="form-label">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group m-4">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group m-4">
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                               autofocus value="{{ old('email') }}">
                        @error('phone')
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
                               autofocus value="{{ old('address') }}">
                        @error('address')
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
                            <option value="{{$role->id}}">{{$role->roleName}}</option>
                        @endforeach
                    </select>
                </div>
                <input class="btn btn-primary ms-4" type="submit" id="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
@endsection
