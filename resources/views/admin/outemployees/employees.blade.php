{{-- รายชื่อพนักงานที่พ้นสภาพ --}}
@extends('admin/layout/adminlayout')
@section('title')
    พนักงานที่พ้นสภาพ
@endsection
@section('content')
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('message') }}", 'Success!', {
                timeOut: 2000
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
            <p>พนักงานพ้นสภาพ</p>
        </div>
        <div class="con-show">
            <div class="header mx-auto">
                <div class="button flex">
                    <select name="selectout" class="select w-48 select-primary inputmodify" id="selectoutdata">
                        <option disabled selected>เลือกสถานะ</option>
                        @foreach ($outsts as $outst)
                            <option value="{{ $outst->id }}">{{ $outst->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <div class="">
                    <table class="table member text-center">
                        <thead>
                            <tr class="headtable">
                                <th>ชื่อ</th>
                                <th>บริษัท</th>
                                <th>ตำแหน่ง</th>
                                <th>หน้าที่</th>
                                <th>สถานะ</th>
                                <th>คลิกเพื่อกลับไปทำงาน</th>
                                <th>ข้อมูล</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody class="alldata" >
                            @foreach ($employees as $employee)
                                <tr class="hover">
                                    <th>{{ $employee->name }}</th>
                                    <th>{{ $employee->companys->name }}</th>
                                    <th>{{ $employee->positions->name }}</th>
                                    <th>{{ $employee->mainlines->name }}</th>
                                    <th>{{ $employee->outsts->name }}</th>
                                    <th><a class="fa-solid fa-arrow-right-arrow-left fa-xl"
                                            href="{{ url('/BackOut', $employee->id) }}"></a></th>
                                    <th><a class="fa-solid fa-file-excel fa-xl"
                                            href="{{ url('/OutInfo', $employee->id) }}"></a></th>
                                    <th><a class="fa-solid fa-pen-to-square"
                                            href="{{ url('/OutEdit', $employee->id) }}"></a></th>
                                    <th><a class="fa-solid fa-trash fa-xl"
                                            href="{{ url('/OutDelete', $employee->id) }}"></a></th>
                                </tr>
                            @endforeach

                        </tbody>
                        <tbody class="SelectOut" id="selectdata"></tbody>
                    </table>
                    {{ $employees->links() }}
                    @if (count($employees) > 0)
                </div>
            </div>
        </div>
    </div>
@else
    <div class=" max-w-full mx-auto ">
        <div role="alert" class="notingdata alert shadow-lg mt-4">
            <span class="loading loading-dots loading-md"></span>
            <div>
                <h3 class="font-bold">ไม่มีข้อมูลพนักงานที่พ้นสภาพ</h3>
                <div class="text-xs">There is no information on employees who have retired.</div>
            </div>

        </div>
    </div>
    @endif
@endsection
@section('endscript')
    <script>
        $(document).ready(function() {
            $('#selectoutdata').click(function() {
                $value = $(this).val();
                if ($value) {
                    $('.alldata').hide()
                    $('.SelectOut').show()
                } else {
                    $('.alldata').show()
                    $('.SelectOut').hide()
                }
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('SelectOutdata') }}',
                    data: {
                        'selectout': $value
                    },
                    success: function(data) {
                        $('#selectdata').html(data);
                    }
                });
            })
        });
    </script>
@endsection
