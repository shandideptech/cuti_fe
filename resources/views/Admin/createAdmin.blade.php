@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <div class="mb-3 fs-5"><a class="mb-2" href="/admins"><i class="bi bi-arrow-left me-2"></i>@lang('admin.button.back')</a></div>
        <h2>@lang('admin.title.create')</h2>
        <form class="form-floating" method="POST" action="/admins">
            @csrf
            <div class="form-group">
                <label for="first_name">@lang('admin.column.first_name') <span style="color: red">*</span></label>
                <input type="text" name="first_name" id="first_name" class="form-control mb-2" value="{{ old('first_name') }}">
                @error('first_name')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="last_name">@lang('admin.column.last_name') <span style="color: red">*</span></label>
                <input type="text" name="last_name" id="last_name" class="form-control mb-2" value="{{ old('last_name') }}">
                @error('last_name')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="email">@lang('admin.column.email') <span style="color: red">*</span></label>
                <input type="email" name="email" id="email" class="form-control mb-2" value="{{ old('email') }}"> 
                @error('email')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="password">@lang('admin.column.password') <span style="color: red">*</span></label>
                <input type="password" name="password" id="password" class="form-control mb-2" value="{{ old('password') }}">
                @error('password')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="password_confirmation">@lang('admin.column.password_confirmation') <span style="color: red">*</span></label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control mb-2" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value=@lang('admin.button.save')>
            </div>
        </form>
    </div>
@endsection
