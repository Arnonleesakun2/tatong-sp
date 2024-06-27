{{-- รายงานเงิน --}}
@extends('admin/layout/adminlayout')
@section('title')
    รายงานเงินเดือน
@endsection
@section('content')
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('message') }}", 'Success!', {
                timeOut: 3000
            });
        </script>
    @endif
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
    <div class="w-full  mx-auto py-8">
        <div class="con-show">
            <div class="form-title  text-center">
                <h2 class="text-center headeredit ">รายงานเงินเดือนบริษัทตาตง</h2>
            </div>
            {{-- <form action="{{ url('/SelectDate') }}" method="POST"> 
                @csrf
                <div class="justify-end  mb-2 flex item-center">
                    <select name="month" class="select select-primary w-full max-w-40 mr-2">
                        <option disabled selected>เลือกเดือน</option>
                        @foreach ($months as $month)
                            <option value="{{ $month->id }}">{{ $month->name }}</option>
                        @endforeach
                    </select>
                    <select name="year" class="select select-primary w-full max-w-40 mr-2">
                        <option disabled selected>เลือกปี</option>
                        <option value="{{ $years }}">{{ $years }}</option>
                        <option value="{{ $years - 1 }}">{{ $years - 1 }}</option>
                        <option value="{{ $years - 2 }}">{{ $years - 2 }}</option>
                    </select>
                    <div class="button">
                        <button style="--clr:#009DE4" type="submit" class="btn btnmodify btn-info">ค้นหา</button>
                    </div>
            </form>--}}
                <div class="justify-end  mb-2 flex item-center">
                    <select id="seletmonth" name="month" class="select select-primary w-full max-w-40 mr-2">
                        <option disabled selected>เลือกเดือน</option>
                        @foreach ($months as $month)
                            <option value="{{ $month->id }}">{{ $month->name }}</option>
                        @endforeach
                    </select>
                    <select id="selectyear" name="year" class="select select-primary w-full max-w-40 mr-2">
                        <option disabled selected>เลือกปี</option>
                        <option value="{{ $years }}">{{ $years }}</option>
                        <option value="{{ $years - 1 }}">{{ $years - 1 }}</option>
                        <option value="{{ $years - 2 }}">{{ $years - 2 }}</option>
                    </select>
                    <div class="button flex ">
                        <a class="btn btnmodify " style="--clr:#EF4C53" href="{{ url('/Employees') }}">ยกเลิก</a>
                    </div>
                </div>
        <div class="tatongtable">
            <div class="overflow-x-auto">
                <table class="table table-xs text-center">
                    <thead>
                        <tr>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>เงินเดือน</th>
                            <th>วันที่ออกเงินเดือน</th>
                            <th>เบี้ยขยัน</th>
                            <th>ขาดงาน</th>
                            <th>สินค้าหาย</th>
                            <th>ค่าปรับตร</th>
                            <th>ค่าปรับขนส่ง</th>
                            <th>สวัสดิการ</br>ยืมเงิน</th>
                            <th>กยศ</th>
                            <th>เงินเดือน</br>(ประกันการขับขี่)</th>
                            <th>หน้าร้าน</br>(ประกันการขับขี่)</th>
                            <th>เงินเดือนรวม</th>
                            <th>คลิกเพิ่มลบ</th>
                        </tr>
                    </thead>
                    
                    <tbody class="SelectMonth" id="SelectMonth"></tbody>
                    <tbody class="SelectYear" id="SelectYear"></tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
@endsection
@section('endscript')
    <script>
        //month
        $(document).ready(function(){
            $('#seletmonth').on('click',function(){
                $value =$(this).val();
                if($value){
                    $('.SelectMonth').show();
                    $('.SelectYear').hide();
                }else{
                    $('.SelectMonth').hide();
                    $('.SelectYear').show();
                }
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('SelectMonth') }}',
                    data: {
                        'month': $value
                    },
                    success: function(data) {
                        console.log(data);
                        $('#SelectMonth').html(data);
                    }
                });
            })

            $('#selectyear').on('click',function(){
                $value =$(this).val();
                if($value){
                    $('.SelectMonth').hide();
                    $('.SelectYear').show();
                }else{
                    $('.SelectMonth').show();
                    $('.SelectYear').hide();
                }
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('SelectYear') }}',
                    data: {
                        'year': $value
                    },
                    success: function(data) {
                        console.log(data);
                        $('#SelectYear').html(data);
                    }
                });
            })
        });
    </script>
@endsection