@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 mb-3">@lang('employee.title.index')</h1>
            <button class="btn btn-outline-primary" onclick="location.href='{{ url('employees/create') }}'">
                <i class="bi bi-file-earmark-plus"></i> @lang('employee.button.add')</button>
        </div>
        <div class="row" id="read"></div>
    </div>
    <div class="col-12">
        @if (session()->has('success'))
            <div class="error mb-3 bg-success text-light p-2 rounded">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded">{{ session('error') }}</div>
        @endif
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('employee.column.first_name')</th>
                    <th scope="col">@lang('employee.column.last_name')</th>
                    <th scope="col">@lang('employee.column.email')</th>
                    <th scope="col">@lang('employee.column.phone_number')</th>
                    <th scope="col">@lang('employee.column.address')</th>
                    <th scope="col">@lang('employee.column.gender')</th>
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
                            <a onclick="return confirm('Are you Sure?')" href="/employees/delete/{{ $employee['id'] }}">
                                    <i class="bi bi-x-square-fill"
                                    style="color: #f43737;"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
<script type="text/javascript">
 
    $('.show_confirm').click(function(event) {
        //  var form =  $(this).closest("form");
        var href = $(this).attr('href');
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((confirmed) => {
        if (confirmed) {
            alert(href);
        }
        });
     });
 
</script>
@endsection
