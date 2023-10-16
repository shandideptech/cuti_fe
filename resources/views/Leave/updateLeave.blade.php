@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <h2>Form Edit Data Pegawai</h2>
        @if(session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded text-center">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/leaves/{{ $leave['id'] }}">
            @csrf
            <div class="form-group">
                <label for="title">Title <span style="color: red">*</span></label>
                <input type="text" name="title" id="title" class="form-control mb-2" value="{{ $leave['title'] }}">
                @error('title')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="description">Deskripsi <span style="color: red">*</span></label>
                <input type="text" name="description" id="description" class="form-control mb-2" value="{{ $leave['description'] }}">
                @error('description')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>
@endsection
