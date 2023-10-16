@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <h2>Form Tambah Data Admin</h2>
        <form class="form-floating" method="POST" action="/admins">
            @csrf
            <div class="form-group">
                <label for="first_name">Nama Depan <span style="color: red">*</span></label>
                <input type="text" name="first_name" id="first_name" class="form-control mb-2">
                @error('first_name')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="last_name">Nama Belakang <span style="color: red">*</span></label>
                <input type="text" name="last_name" id="last_name" class="form-control mb-2">
                @error('last_name')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="email">Email <span style="color: red">*</span></label>
                <input type="email" name="email" id="email" class="form-control mb-2">
                @error('email')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="password">Password <span style="color: red">*</span></label>
                <input type="password" name="password" id="password" class="form-control mb-2">
                @error('password')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="password_confirmation">Konfirmasi Password <span style="color: red">*</span></label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control mb-2">
                @error('password_confirmation')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>
@endsection
