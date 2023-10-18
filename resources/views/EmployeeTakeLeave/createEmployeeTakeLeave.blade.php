@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <div class="mb-3 fs-5"><a class="mb-2" href="/employee-take-leaves"><i class="bi bi-arrow-left me-2"></i>@lang('employeeTakeLeave.button.back')</a></div>
        <h2>@lang('employeeTakeLeave.title.create')</h2>
        <button id="button-id" class="btn btn-outline-secondary mb-2" onclick="onclickIdForm()">
            ID
        </button>
        <button id="button-en" class="btn btn-outline-secondary mb-2" onclick="onclickEnForm()">
            EN
        </button>
        @if(session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded text-center">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/employee-take-leaves">
            @csrf
            <div id="form-id" style="display: none;width:100%">
                <div class="form-group">
                    <label for="id_employee_id">Nama Karyawan <span style="color: red">*</span></label>
                    <select name="id_employee_id" id="id_employee_id" class="form-select form-select-sm p-2 mb-2">
                        <option selected disabled hidden>Pilih Karyawan</option>
                        @foreach($employees_indonesia as $employee)
                        <option value="{{$employee['id']}}"
                            @if($employee['id'] == old('id_employee_id')) selected @endif>
                            {{$employee['first_name']}} {{$employee['last_name']}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_employee_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="id_leave_id">Alasan Cuti <span style="color: red">*</span></label>
                    <select name="id_leave_id" id="id_leave_id" class="form-select form-select-sm p-2 mb-2">
                        <option selected disabled hidden>Pilih Alasan Cuti</option>
                        @foreach($leaves_indonesia as $leave)
                        <option value="{{$leave['id']}}"
                            @if($leave['id'] == old('id_leave_id')) selected @endif>
                            {{$leave['title']}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_leave_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="start_date_id">Tanggal Mulai <span style="color: red">*</span></label>
                    <input type="text" name="start_date_id" id="start_date_id" class="form-control mb-2" value="{{old('start_date_id')}}">
                    @error('start_date_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="end_date_id">Tanggal Selesai <span style="color: red">*</span></label>
                    <input type="text" name="end_date_id" id="end_date_id" class="form-control mb-2" value="{{old('end_date_id')}}">
                    @error('end_date_id')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input class="btn btn-success" type="submit" value='Simpan'>
                </div>
            </div>
            <div id="form-en" style="display: none;width:100%">
                <div class="form-group">
                    <label for="id_employee_en">Employee Name <span style="color: red">*</span></label>
                    <select name="id_employee_en" id="id_employee_en" class="form-select form-select-sm p-2 mb-2">
                        <option selected disabled hidden>Select Employee</option>
                        @foreach($employees_english as $employee)
                        <option value="{{$employee['id']}}"
                            @if($employee['id'] == old('id_employee_en')) selected @endif>
                            {{$employee['first_name']}} {{$employee['last_name']}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_employee_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="id_leave_en">Reason for Leave <span style="color: red">*</span></label>
                    <select name="id_leave_en" id="id_leave_en" class="form-select form-select-sm p-2 mb-2">
                        <option selected disabled hidden>Select Reason for Leave</option>
                        @foreach($leaves_english as $leave)
                        <option value="{{$leave['id']}}"
                            @if($leave['id'] == old('id_leave_en')) selected @endif>
                            {{$leave['title']}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_leave_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="start_date_en">Start Date <span style="color: red">*</span></label>
                    <input type="text" name="start_date_en" id="start_date_en" class="form-control mb-2" value="{{old('start_date_en')}}">
                    @error('start_date_en')
                        <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                    @enderror
                    <label for="end_date_en">End Date <span style="color: red">*</span></label>
                    <input type="text" name="end_date_en" id="end_date_en" class="form-control mb-2" value="{{old('end_date_en')}}">
                    @error('end_date_en')
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
<script>
    $('#start_date_id').datepicker({                      
        format: 'yyyy-mm-dd',
        autoclose: true,
    }); 
    $('#start_date_en').datepicker({                      
        format: 'yyyy-mm-dd',
        autoclose: true,
    }); 
    $('#end_date_id').datepicker({                      
        format: 'yyyy-mm-dd',
        autoclose: true,
    });
    $('#end_date_en').datepicker({                      
        format: 'yyyy-mm-dd',
        autoclose: true,
    });
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
