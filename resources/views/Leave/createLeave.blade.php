@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <div class="mb-3 fs-5"><a class="mb-2" href="/leaves"><i class="bi bi-arrow-left me-2"></i>@lang('leave.button.back')</a></div>
        <h2>@lang('leave.title.create')</h2>
        @if (session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/leaves">
            @csrf
            <div class="form-group">
                <label for="title">@lang('leave.column.title') <span style="color: red">*</span></label>
                <input type="text" name="title" id="title" class="form-control mb-2" value="{{ old('title') }}">
                @error('title')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="description">@lang('leave.column.description') <span style="color: red">*</span></label>
                <input type="description" name="description" id="description" class="form-control mb-2" value="{{ old('description') }}">
                @error('description')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value=@lang('leave.button.save')>
            </div>
        </form>
    </div>
@endsection
