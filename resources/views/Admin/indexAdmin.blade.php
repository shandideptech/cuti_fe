@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 mb-3">@lang('admin.title.index')</h1>
            <button class="btn btn-outline-primary" onclick="location.href='{{ url('admins/create') }}'">
                <i class="bi bi-file-earmark-plus"></i> @lang('admin.button.add')</button>
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
                    <th scope="col">#</th>
                    <th scope="col">@lang('admin.column.first_name')</th>
                    <th scope="col">@lang('admin.column.last_name')</th>
                    <th scope="col">@lang('admin.column.email')</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($admins as $admin)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $admin['first_name'] }}</td>
                        <td>{{ $admin['last_name'] }}</td>
                        <td>{{ $admin['email'] }}</td>
                        <td><a href="/admins/edit/{{ $admin['id'] }}">
                                <i class="bi bi-pencil-square" style="margin-right: 5px; color: green;"></i>
                            </a>
                            <a onclick="return confirm('Are you Sure?')" href="/admins/delete/{{ $admin['id'] }}">
                                <i class="bi bi-x-square-fill" style="color: #f43737;"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
