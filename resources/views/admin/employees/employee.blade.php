{{-- รายชื่อพนักงานตาตง --}}
@extends('admin/layout/adminlayout')
@section('title')
    พนักงานบริษัทตาตง
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
    <div class="w-full  mx-auto pb-8">
        <div class="con ">
            <p>พนักงานในบริษัท</p>
        </div>
        <div class="con-show">
            <div class="header mx-auto">
                <div class="button flex items-center">
                    <input id="search" type="text" placeholder="ค้นหา" class="inputmodify input input-bordered input-primary w-44" />
                    <select name="company" class="select w-36 ml-2 inputmodify select-primary" id="selectcompany">
                        <option disabled selected >เลือกบริษัท</option>
                        @foreach ($companys as $company)
                            <option value="{{ $company->id }}">{{ $company->name }} </option>
                        @endforeach
                    </select>
                    <a class="btn btnmodify  ml-2" style="--clr:#3F00E7" href="{{ url('/ReportSalary') }}">รายงานเงินเดือน</a>
                    <label class="addcom ml-2 btn btnmodify" for="my_modal_5" style="--clr:#ff0000;" href="">ลบบริษัท</label>
                </div>
            </div>
            <div class="">
                <div class=" mt-4 ">
                    <table class="table text-center ">
                        <thead >
                            <tr class="headtable">
                                <th>ชื่อ</th>
                                <th>บริษัท</th>
                                <th>ตำแหน่ง</th>
                                <th>หน้าที่</th>
                                <th>เงินเดือน</th>
                                <th>เลขบัญชี</th>
                                <th>เบอร์โทร</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                            @foreach ($employees as $employee)
                                <tr class="">
                                    <th>{{ $employee->name ?? ''}}</th>
                                    <th>{{ $employee->companys->name ?? ''}}</th>
                                    <th>{{ $employee->positions->name ?? ''}}</th>
                                    <th>{{ $employee->mainlines->name ?? ''}}</th>
                                    <th>{{ $employee->salarys[0]->name ?? ''}}</th>
                                    <th>{{ $employee->accountnumbers[0]->name ?? ''}}</th>
                                    <th>{{ $employee->tel }}</th>
                                    <th>
                                        <div class="dropdown dropdown-top dropdown-end ">
                                            <div tabindex="0" role="button" class="manu fa-solid fa-ellipsis fa-xl">
                                            </div>
                                            <ul tabindex="0"
                                                class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-44">
                                                <li><a href="{{ url('/EmployeeInfo', $employee->id) }}"
                                                        class=" fa-solid fa-eye">&nbsp;&nbsp;ข้อมูล</a></li>
                                                <li><a class="fa-solid fa-pen-to-square"
                                                        href="{{ url('/EmployeeEdit', $employee->id) }}">&nbsp;&nbsp;แก้ไข</a>
                                                </li>
                                                <li><a class="fa-solid fa-pen-to-square"
                                                        href="{{ url('/AddAccountnumber', $employee->id) }}">&nbsp;&nbsp;แก้ไขเลขบัญชี</a>
                                                </li>
                                                <li><a class="fa-solid fa-calculator"
                                                        href="{{ url('/CalSalary', $employee->id) }}">&nbsp;&nbsp;คำนวณเงินเดือน</a>
                                                </li>
                                                <li><a class="fa-solid fa-right-from-bracket"
                                                        href="{{ url('/SelectOut', $employee->id) }}">&nbsp;&nbsp;พ้นสภาพ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody id="Content" class="searchdata">
                        </tbody>
                        <tbody id="Selectcompany" class="selcetdata">
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
        @if (count($employees) > 0)
    </div>
@else
    <div class=" max-w-full mx-auto ">
        <div role="alert" class="notingdata alert shadow-lg mt-4">
            <span class="loading loading-dots loading-md"></span>
            <div>
                <h3 class="font-bold">ไม่มีข้อมูลพนักงาน</h3>
                <div class="text-xs">There is No employee information.</div>
            </div>
        </div>
    </div>
    @endif
    {{-- ลบบริษัท --}}
    <input type="checkbox" id="my_modal_5" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <form action="{{ url('/DeleteCompany') }}" method="POST">
                @csrf
                <div class="text-center">
                    <p class="font-semibold">ลบบริษัท</p>
                    <select name="company" class="select select-bordered w-full max-w-xs mt-4" >
                        <option disabled selected>เลือก</option>
                        @foreach ($companys as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                    @error('company')
                        <div class="invalid-feedback d-block text-red-700">{{ $errors->first('company') }}</div>
                    @enderror
                </div>
                <div style="--clr:#00A96E" class="button text-center mt-4">
                    <button type="submit" class="btn btnmodify">บันทึก</button>
                    <label style="--clr:#EF4C53;" for="my_modal_5" class="btn btnmodify btn-error">ยกเลิก</label>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('endscript')
    <script>
        $(document).ready(function() {
            //search
            $('#search').on('keyup', function() {
                $value = $(this).val();
                if ($value) {
                    $('.alldata').hide();
                    $('.selcetdata').hide();
                    $('.searchdata').show();
                } else {
                    $('.alldata').show();
                    $('.searchdata').hide();
                }
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search') }}',
                    data: {
                        'search': $value
                    },

                    success: function(data) {
                        $('#Content').html(data);
                    }
                });
            })
            //select
            $('#selectcompany').on('click',function(){
                $value =$(this).val();
                console.log($value);
                if ($value) {
                    $('.alldata').hide();
                    $('.searchdata').hide();
                    $('.selcetdata').show();
                } else {
                    $('.alldata').show();
                    $('.selcetdata').hide();
                }
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('select') }}',
                    data: {
                        'company': $value
                    },
                    success: function(data) {
                        $('#Selectcompany').html(data);
                    }
                });
            })
        });
    </script>
@endsection
