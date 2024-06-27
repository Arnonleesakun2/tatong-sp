{{-- แสดงปฏิทิน --}}
@extends('admin/layout/adminlayout')
@section('title')
    เพิ่มข้อมูล
@endsection
@section('script')
    <style>
        form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: green;
            color: white;
        }
    </style>
@endsection
@section('content')
@if (Session::has('error'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton": true,
    }
    toastr.error("{{ Session::get('error') }}", 'Error!', {
        timeOut: 3000
    });
</script>
@endif
    <div class="w-full  mx-auto pb-8">
        <div class="con ">
            <p>เพิ่มข้อมูล</p>
        </div>
        <div class="con-show">
            <form action="{{ URL('/CreateSchedule') }}" method="POST">
                @csrf
                <label for='title'>{{ __('หัวข้อ') }}</label>
                <input type='text' class='form-control' id='title' name='title'>
                @error('title')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('title') }}</div>
                @enderror
                <label for="start">{{ __('วันที่') }}</label>
                <input type='date' class='form-control' id='start' name='start' required value='{{ now()->toDateString() }}'>
                @error('start')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('start') }}</div>
                @enderror
                <label for="end">{{ __('ถึงวันที่') }}</label>
                <input type='date' class='form-control' id='end' name='end' required
                    value='{{ now()->toDateString() }}'>
                @error('end')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('end') }}</div>
                @enderror
                <label for="description">{{ __('รายละเอียด') }}</label>
                <textarea id="description" name="description"></textarea>
                @error('description')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('description') }}</div>
                @enderror
                <label for="color">{{ __('Color') }}</label>
                <input type="color" id="color" name="color" />
        
                
                <div class=" text-center"> 
                    <div class="button">
                        <label class="btn btnmodify" for="my_modal_5" style="--clr:#00935F;" href="">บันทึก</label>
                        <input type="checkbox" id="my_modal_5" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">แน่ใจว่าจะบึนทึก</h3>
                                <p class="py-4">คลิกปุ่มยกเลิกเพื่อกลับ</p>
                                <div class="modal-action">
                                    <button style="--clr:#00935F;" type="submit" class="btn btnmodify btn-success">บันทึก</button>
                                    <label style="--clr:#EF4C53;" for="my_modal_5" class="btn btnmodify btn-error">ยกเลิก</label>
                                </div>
                            </div>
                        </div>
                        </dialog>
                        <a class="btn btnmodify" style="--clr:#EF4C53;" href="{{ url('/Calender') }}">ยกเลิก</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    
@endsection
