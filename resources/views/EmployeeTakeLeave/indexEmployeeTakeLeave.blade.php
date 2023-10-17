@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 mb-3">List Cuti Pegawai</h1>
            <button class="btn btn-outline-primary" onclick="location.href='{{ url('employee-take-leaves/create') }}'">
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
                    <th scope="col">Nama</th>
                    <th scope="col">Alasan Cuti</th>
                    <th scope="col">Tanggal Mulai Cuti</th>
                    <th scope="col">Tanggal Selesai Cuti</th>
                    <th scope="col"></th>
            </td>
                </tr>
            </thead>

            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($employee_take_leaves as $employee_take_leave)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $employee_take_leave['employee']['first_name'] }} {{ $employee_take_leave['employee']['last_name'] }}</td>
                    <td>{{ $employee_take_leave['leave']['title'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($employee_take_leave['start_date'])->translatedFormat('d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($employee_take_leave['end_date'])->translatedFormat('d F Y') }}</td>
                    <td><a href="/employee-take-leaves/edit/{{ $employee_take_leave['id'] }}">
                            <i class="bi bi-pencil-square" style="margin-right: 5px; color: green;"></i>
                        </a>
                        <a onclick="return confirm('Are you Sure?')" href="/employee-take-leaves/delete/{{ $employee_take_leave['id'] }}">
                            <i class="bi bi-x-square-fill" style="color: #f43737;"></i>
                        </a>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
