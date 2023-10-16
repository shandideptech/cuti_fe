@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 mb-3">Master Data Cuti</h1>
            <button class="btn btn-outline-primary" onclick="location.href='{{ url('leaves/create') }}'">
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
                    <th scope="col">Title</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($leaves as $leave)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $leave['title'] }}</td>
                        <td>{{ $leave['description'] }}</td>
                        <td><a href="/leaves/edit/{{ $leave['id'] }}"><i class="bi bi-pencil-square"
                                    style="margin-right: 5px; color: green;"></i></a>
                            <a href="/leaves/delete/{{ $leave['id'] }}"><i class="bi bi-x-square-fill" style="color: #f43737;"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
