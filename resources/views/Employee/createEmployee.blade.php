@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <div class="mb-3 fs-5"><a class="mb-2" href="/employees"><i class="bi bi-arrow-left me-2"></i>@lang('employee.button.back')</a></div>
        <h2>@lang('employee.title.create')</h2>
        @if(session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded text-center">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/employees">
            @csrf
            <div class="form-group">
                <label for="first_name">@lang('employee.column.first_name') <span style="color: red">*</span></label>
                <input type="text" name="first_name" id="first_name" class="form-control mb-2">
                @error('first_name')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="last_name">@lang('employee.column.last_name') <span style="color: red">*</span></label>
                <input type="text" name="last_name" id="last_name" class="form-control mb-2">
                @error('last_name')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="email">@lang('employee.column.email') <span style="color: red">*</span></label>
                <input type="email" name="email" id="email" class="form-control mb-2">
                @error('email')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="phone_number">@lang('employee.column.phone_number') <span style="color: red">*</span></label>
                <input type="text" name="phone_number" id="phone_number" class="form-control mb-2">
                @error('phone_number')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="address">@lang('employee.column.address') <span style="color: red">*</span></label>
                <input type="text" name="address" id="address" class="form-control mb-2">
                @error('address')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="gender">@lang('employee.column.gender') <span style="color: red">*</span></label>
                <select name="gender" id="gender" class="form-select form-select-sm p-2 mb-2">
                    <option selected disabled hidden>@lang('employee.select.gender')</option>
                    <option value="Laki-Laki">@lang('employee.gender.male')</option>
                    <option value="Perempuan">@lang('employee.gender.female')</option>
                </select>
                @error('gender')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value=@lang('employee.button.save')>
            </div>
        </form>
    </div>
@endsection
