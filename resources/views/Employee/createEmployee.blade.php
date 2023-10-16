@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <h2>Form Tambah Data Pegawai</h2>
        @if(session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded text-center">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/employees">
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
                <label for="phone_number">No HP <span style="color: red">*</span></label>
                <input type="text" name="phone_number" id="phone_number" class="form-control mb-2">
                @error('phone_number')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="address">Alamat <span style="color: red">*</span></label>
                <input type="text" name="address" id="address" class="form-control mb-2">
                @error('address')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="gender">jenis Kelamin <span style="color: red">*</span></label>
                <select name="gender" id="gender" class="form-select form-select-sm p-2 mb-2">
                    <option selected disabled hidden>Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('gender')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>
@endsection
