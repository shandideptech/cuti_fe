@extends('Layout.main')
@section('content')
    <div class="p2 mx-auto" style="width:50%">
        <div class="mb-3 fs-5"><a class="mb-2" href="/employee-take-leaves"><i class="bi bi-arrow-left me-2"></i>Kembali</a></div>
        <h2>Form Edit Data Pegawai Mengambil Cuti</h2>
        @if(session()->has('error'))
            <div class="error mb-3 bg-danger text-light p-2 rounded text-center">{{ session('error') }}</div>
        @endif
        <form class="form-floating" method="POST" action="/employee-take-leaves/{{$employee_take_leave['id']}}">
            @csrf
            <div class="form-group">
                <label for="id_employee">Nama Karyawan <span style="color: red">*</span></label>
                <select name="id_employee" id="id_employee" class="form-select form-select-sm p-2 mb-2">
                    <option selected disabled hidden>Pilih Karyawan</option>
                    @foreach($employees as $employee)
                    <option value="{{$employee['id']}}" 
                    @if(!$employee_take_leave['employee'] ? null : $employee['id'] == $employee_take_leave['employee']['id']) selected @endif>
                        {{$employee['first_name']}} {{$employee['last_name']}}
                    </option>
                    @endforeach
                </select>
                @error('id_employee')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="id_leave">Alasan Cuti <span style="color: red">*</span></label>
                <select name="id_leave" id="id_leave" class="form-select form-select-sm p-2 mb-2">
                    <option selected disabled hidden>Pilih Alasan Cuti</option>
                    @foreach($leaves as $leave)
                    <option value="{{$leave['id']}}" 
                    @if(!$employee_take_leave['leave']? null : $leave['id'] == $employee_take_leave['leave']['id']) selected @endif>
                        {{$leave['title']}}
                    </option>
                    @endforeach
                </select>
                @error('id_leave')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="start_date">Tangga Mulai (YYYY-MM-DD) <span style="color: red">*</span></label>
                <input type="text" name="start_date" id="start_date" class="form-control mb-2" 
                    value="{{ old('start_date') ? old('start_date') : $employee_take_leave['start_date'] }}">
                @error('start_date')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
                <label for="end_date">Tangga Selesai (YYYY-MM-DD) <span style="color: red">*</span></label>
                <input type="text" name="end_date" id="end_date" class="form-control mb-2" 
                    value="{{ old('end_date') ? old('end_date') : $employee_take_leave['end_date'] }}">
                @error('end_date')
                    <div class="error mb-3 bg-danger text-light p-2 rounded">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </form>
    </div>
@endsection
@section('script')
<script>
    $('#start_date').datepicker({                      
        format: 'yyyy-mm-dd',
        autoclose: true,
    }); 
    $('#end_date').datepicker({                      
        format: 'yyyy-mm-dd',
        autoclose: true,
    });
</script>
@endsection