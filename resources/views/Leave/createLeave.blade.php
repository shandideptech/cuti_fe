@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <div class="mb-3 fs-5"><a class="mb-2" href="/leaves"><i class="bi bi-arrow-left me-2"></i>@lang('leave.button.back')</a></div>
        <h2>@lang('leave.title.create')</h2>
        <button id="button-id" class="btn btn-outline-secondary mb-2" onclick="onclickIdForm()">
            ID
        </button>
        <button id="button-en" class="btn btn-outline-secondary mb-2" onclick="onclickEnForm()">
            EN
        </button>
        @if (session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/leaves">
            @csrf
            <div id="form-id" style="display: none;width:100%">
                <div class="form-group">
                    <label for="title_id">Judul <span style="color: red">*</span></label>
                    <input type="text" name="title_id" id="title_id" class="form-control mb-2" value="{{ old('title_id') }}">
                    @error('title_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="description_id">Deskripsi <span style="color: red">*</span></label>
                    <input type="text" name="description_id" id="description_id" class="form-control mb-2" value="{{ old('description_id') }}">
                    @error('description_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input class="btn btn-success" type="submit" value='Simpan'>
                </div>
            </div>
            <div id="form-en" style="display: none;width:100%">
                <div class="form-group">
                    <label for="title_en">Title <span style="color: red">*</span></label>
                    <input type="text" name="title_en" id="title_en" class="form-control mb-2" value="{{ old('title_en') }}">
                    @error('title_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="description_en">Description <span style="color: red">*</span></label>
                    <input type="text" name="description_en" id="description_en" class="form-control mb-2" value="{{ old('description_en') }}">
                    @error('description_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input class="btn btn-success" type="submit" value='Save'>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $( document ).ready(function() {
        $('#form-' + "{{Session::get('locale')}}").css({'display':'block'});
        $('#button-' + "{{Session::get('locale')}}").removeClass('btn-outline-secondary');
        $('#button-' + "{{Session::get('locale')}}").addClass('btn-success');
    });
    function onclickIdForm(){
        $('#button-en').removeClass('btn-success');
        $('#button-en').addClass('btn-outline-secondary');
        $('#button-id').removeClass('btn-outline-secondary');
        $('#button-id').addClass('btn-success');
        $('#form-en').css({'display':'none'});
        $('#form-id').css({'display':'block'});
    }
    function onclickEnForm(){
        $('#button-id').removeClass('btn-success');
        $('#button-id').addClass('btn-outline-secondary');
        $('#button-en').removeClass('btn-outline-secondary');
        $('#button-en').addClass('btn-success');
        $('#form-id').css({'display':'none'});
        $('#form-en').css({'display':'block'});
    }
</script>
@endsection
