@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 mb-3">Master Data Pegawai</h1>
            <button class="btn btn-outline-primary" onclick="location.href='{{ url('employees/create') }}'">
                <i class="bi bi-file-earmark-plus"></i> Tambah Data</button>
        </div>
        <div class="row" id="read"></div>
    </div>
    <div class="col-12">
        @if (session()->has('success'))
            <div class="error mb-3 bg-success text-light p-2 rounded">{{ session('success') }}</div>
        @endif
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Depan</th>
                    <th scope="col">Nama Belakang</th>
                    <th scope="col">Email</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $employee['first_name'] }}</td>
                        <td>{{ $employee['last_name'] }}</td>
                        <td>{{ $employee['email'] }}</td>
                        <td>{{ $employee['phone_number'] }}</td>
                        <td>{{ $employee['address'] }}</td>
                        <td>{{ $employee['gender'] }}</td>
                        <td><a href="/employees/edit/{{ $employee['id'] }}"><i class="bi bi-pencil-square"
                                    style="margin-right: 5px; color: green;"></i></a>
                            <a href="/employees/delete/{{ $employee['id'] }}"><i class="bi bi-x-square-fill"
                                    style="color: #f43737;"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
