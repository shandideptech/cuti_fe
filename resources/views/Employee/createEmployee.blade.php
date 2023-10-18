@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <div class="mb-3 fs-5"><a class="mb-2" href="/employees"><i class="bi bi-arrow-left me-2"></i>@lang('employee.button.back')</a></div>
        <h2>@lang('employee.title.create')</h2>
        <button id="button-id" class="btn btn-outline-secondary mb-2" onclick="onclickIdForm()">
            ID
        </button>
        <button id="button-en" class="btn btn-outline-secondary mb-2" onclick="onclickEnForm()">
            EN
        </button>
        @if(session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded text-center">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/employees">
            @csrf
            <div id="form-id" style="display: none;width:100%">
                <div class="form-group">
                    <label for="first_name_id">Nama Depan <span style="color: red">*</span></label>
                    <input type="text" name="first_name_id" id="first_name_id" class="form-control mb-2" value="{{old('first_name_id')}}">
                    @error('first_name_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="last_name_id">Nama Belakang <span style="color: red">*</span></label>
                    <input type="text" name="last_name_id" id="last_name_id" class="form-control mb-2" value="{{old('last_name_id')}}">
                    @error('last_name_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="email_id">Email <span style="color: red">*</span></label>
                    <input type="email" name="email_id" id="email_id" class="form-control mb-2" value="{{old('email_id')}}">
                    @error('email_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="phone_number_id">Nomor HP <span style="color: red">*</span></label>
                    <input type="text" name="phone_number_id" id="phone_number_id" class="form-control mb-2" value="{{old('phone_number_id')}}">
                    @error('phone_number_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="address_id">Alamat <span style="color: red">*</span></label>
                    <input type="text" name="address_id" id="address_id" class="form-control mb-2" value="{{old('address_id')}}">
                    @error('address_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="gender_id">Jenis Kelamin <span style="color: red">*</span></label>
                    <select name="gender_id" id="gender_id" class="form-select form-select-sm p-2 mb-2">
                        <option selected disabled hidden>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" @if(old('gender_id') == "Laki-Laki") selected @endif>Laki-Laki</option>
                        <option value="Perempuan" @if(old('gender_id') == "Perempuan") selected @endif>Perempuan</option>
                    </select>
                    @error('gender_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input class="btn btn-success" type="submit" value="Simpan">
                </div>
            </div>
            <div id="form-en" style="display: none;width:100%">
                <div class="form-group">
                    <label for="first_name_en">First Name <span style="color: red">*</span></label>
                    <input type="text" name="first_name_en" id="first_name_en" class="form-control mb-2" value="{{old('first_name_en')}}">
                    @error('first_name_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="last_name_en">Last Name <span style="color: red">*</span></label>
                    <input type="text" name="last_name_en" id="last_name_en" class="form-control mb-2" value="{{old('last_name_en')}}">
                    @error('last_name_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="email_en">Email <span style="color: red">*</span></label>
                    <input type="email" name="email_en" id="email_en" class="form-control mb-2" value="{{old('email_en')}}">
                    @error('email_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="phone_number_en">Phone Number <span style="color: red">*</span></label>
                    <input type="text" name="phone_number_en" id="phone_number_en" class="form-control mb-2" value="{{old('phone_number_en')}}">
                    @error('phone_number_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="address_en">Address <span style="color: red">*</span></label>
                    <input type="text" name="address_en" id="address_en" class="form-control mb-2" value="{{old('address_en')}}">
                    @error('address_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="gender_en">Gender <span style="color: red">*</span></label>
                    <select name="gender_en" id="gender_en" class="form-select form-select-sm p-2 mb-2">
                        <option selected disabled hidden>Select Gender</option>
                        <option value="Male" @if(old('gender_en') == "Laki-Laki") selected @endif>Male</option>
                        <option value="Female" @if(old('gender_en') == "Perempuan") selected @endif>Female</option>
                    </select>
                    @error('gender_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input class="btn btn-success" type="submit" value="Save">
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
