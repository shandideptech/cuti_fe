@extends('Layout.main')
@section('content')
    <div class="p2 mb-5 mx-auto" style="width:50%">
        <h2>Form Edit Profil Admin</h2>
        @if (session()->has('success'))
            <div class="error mb-3 bg-success text-light p-2 rounded">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/profile">
            @csrf
            <div class="form-group">
                <label for="first_name">Nama Depan <span style="color: red">*</span></label>
                <input type="text" name="first_name" id="first_name" class="form-control mb-2"
                    value="{{ $admin['first_name'] }}">
                @error('nama_depan')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="last_name">Nama Belakang <span style="color: red">*</span></label>
                <input type="text" name="last_name" id="last_name" class="form-control mb-2"
                    value="{{ $admin['last_name'] }}">
                @error('last_name')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="email">Email <span style="color: red">*</span></label>
                <input type="email" name="email" id="email" class="form-control mb-2" value="{{ $admin['email'] }}">
                @error('email')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>
@endsection
