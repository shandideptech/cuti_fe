@extends('Layout.main')
@section('content')
<div class="p2 mx-auto" style="width:50%">
    <h2>Form Edit Password</h2>
    @if (session()->has('success'))
        <div class="error mb-3 bg-success text-light p-2 rounded">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ session('error') }}</div>
    @endif
    <form class="form-floating" method="POST" action="/profile/password">
        @csrf
        <div class="form-group">
            <label for="old_password">Password Lama <span style="color: red">*</span></label>
            <input type="password" name="old_password" id="old_password" class="form-control mb-2">
            @error('old_password')
                <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
            @enderror
            <label for="new_password">Password Baru <span style="color: red">*</span></label>
            <input type="password" name="new_password" id="new_password" class="form-control mb-2">
            @error('new_password')
                <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
            @enderror
            <label for="new_password_confirmation">Konfirmasi Password <span style="color: red">*</span></label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control mb-2">
            @error('new_password_confirmation')
                <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <input class="btn btn-success" type="submit" value="Simpan">
        </div>
    </form>
</div>
@endsection