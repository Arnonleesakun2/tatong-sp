{{-- แก้ไขเงินเดือน --}}
@extends('admin/layout/adminlayout')
@section('title')
    แก้ไขเงินเดือนบริษัทตาตง
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
        <div class="con">
            <p>แก้ไขเงินเดือน</p>
        </div>
        <div class="con-show">
            
            <form action="{{ url('/Cal') }}" method="POST">
                @csrf
                @method('patch')
                <input type="hidden" value="{{$employee->id}}" name="id">
                <div class="d3 w-11/12 mx-auto flex">
                    <div class="">
                        <p>ชื่อ-นามสกุล:</p>
                        <input name="name" value="{{ $employee->name }}" type="text"
                            class="input input-bordered w-full " />
                    @error('name')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('name') }}</div>
                    @enderror
                    </div>
                    <div class="">
                        <p>เงินเดือน:</p>
                        <input  value="{{ $employee->salarys[0]->name }}" type="number"
                            class="salary input input-bordered w-full " disabled/>
                            <input id="salary" type="hidden" name="salary" value="{{ $employee->salarys[0]->name }}">
                            @error('salary')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('salary') }}</div>
                    @enderror
                    </div>
                    <div class="">
                        <p>วันที่คำนวณเงิน:</p>
                        <input name="datecal" type="date" class="input input-bordered w-full " />
                        @error('datecal')
                    <div class="invalid-feedback d-block text-red-700">{{ $errors->first('datecal') }}</div>
                    @enderror
                    </div>
                </div>
                <div class="box2 ">
                    <div class="">
                        <h2>เพิ่มเงินเดือน</h2>
                        <div class="">
                            <p>เบี้ยขยัน:</p>
                            <input id="bonus" name="bonus" type="number" class="input input-bordered w-full" />
                        </div>
                        <div class="">
                            <p>หน้าร้าน(ประกันขับขี่):</p>
                            <input id="storefront" name="storefront" type="number" class="input input-bordered w-full" />
                        </div>
                        <div class="button text-center mt-6">
                            <button style="--clr:#00BBA6" type="button" id="btn-cal" class="btn btnmodify btn-outline btn-accent">คำนวณเงินเดือน</button>
                            <label class="btn btnmodify" for="my_modal_6" style="--clr:#00935F;"
                                href="">บันทึก</label>
                            <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                            <div class="modal" role="dialog">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg">แน่ใจว่าจะบึนทึก</h3>
                                    <p class="py-4">คลิกปุ่มยกเลิกเพื่อกลับ</p>
                                    <div class="modal-action">
                                        <button style="--clr:#00935F;" type="submit"
                                            class="btn btnmodify btn-success">บันทึก</button>
                                        <label style="--clr:#EF4C53;" for="my_modal_6"
                                            class="btn btnmodify btn-error">ยกเลิก</label>
                                    </div>
                                </div>
                            </div>
                            </dialog>
                            <a class="btn btnmodify" style="--clr:#EF4C53;" href="{{ url('/Employees') }}">ยกเลิก</a>
                        </div>
                    </div>
                    <div class="">
                        <h2>ค่าปรับ</h2>
                        <div class="sub">
                            <div class="">
                                <p>เบี้ยขยัน:</p>
                                <input id="bonus" name="bonus" type="number" class="input input-bordered w-40" />
                            </div>
                            <div class="">
                                <p>ขาดงาน:</p>
                                <input id="missingwork" name="missingwork" type="number" class="input input-bordered w-40  " />
                            </div>
                            <div class="">
                                <p>สินค้าหาย:</p>
                                <input id="lostproduct" name="lostproduct" type="number" class="input input-bordered w-40  " />
                            </div>
                        </div>
                        
                        <div class="sub">
                            <div class="">
                                <p>ค่าปรับตำรวจ:</p>
                                <input id="poicefine" name="poicefine" type="number" class="input input-bordered w-40  " />
                            </div>
                            <div class="">
                                <p>ค่าปรับขนส่ง:</p>
                                <input id="transportfine" name="transportfine" type="number" class="input input-bordered w-40  " />
                            </div>
                            <div class="">
                                <p>สวัสการเงินยืม:</p>
                                <input id="welfareloan" name="welfareloan" type="number" class="input input-bordered w-40 " />
                            </div>
                        </div>
                        <div class="sub">
                            <div class="">
                                <p>กยศ:</p>
                                <input id="ava" name="ava" type="number" class="input input-bordered w-40 " />
                            </div>
                            <div class="">
                                <p>เงินเดือน(ประกันขับขี่):</p>
                                <input id="drivinginsurance" name="drivinginsurance" type="number" class="input input-bordered w-40 " />
                            </div>
                            <div class="">
                                <p>ผลรวม:</p>
                                <input   type="number" class="total input input-bordered w-40" disabled/>
                                <input id="total" type="hidden" name="total">
                                @error('total')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('total') }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            
                
            </form>
        </div>
    </div>

    
@endsection
@section('endscript')
<script>
    $(document).ready(() => {
        $('#btn-cal').on('click', cal)

        function cal() {
            let total = (Number($('#salary').val())) +
                (Number($('#bonus').val())) -
                (Number($('#missingwork').val())) -
                (Number($('#lostproduct').val())) -
                (Number($('#poicefine').val())) -
                (Number($('#transportfine').val())) -
                (Number($('#welfareloan').val())) -
                (Number($('#ava').val())) -
                (Number($('#drivinginsurance').val())) +
                (Number($('#storefront').val()))
            $('#total').val(total);
            $('.total').val(total);
            $('.salary').val();
        }
    })
</script>   
@endsection