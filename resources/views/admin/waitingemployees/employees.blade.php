{{-- หน้าแสดงของมูลผู้สมัครและรออนุมัติ --}}
@extends('admin/layout/adminlayout')
@section('title')
    รอสัมภาษณ์
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
            <p>พนักงานรอสัมภาษณ์</p>
        </div>
        <div class="con-show">
            <div class="">
                <table class="table">
                    <thead>
                        <tr class=" text-center headtable">
                            <th>ชื่อ</th>
                            <th>ชื่อเล่น</th>
                            <th>เบอร์โทร</th>
                            <th>กำหนดงาน</th>
                            <th>ข้อมูล</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="hover items-center text-center">
                                <th>{{ $employee->name }}</th>
                                <th>{{ $employee->nickname }}</th>
                                <th>{{ $employee->tel }}</th>
                                <th><a class="fa-solid fa-paperclip fa-xl"
                                        href="{{ url('/NewAdd', $employee->id) }}"></a></th>
                                <th><a class="fa-solid fa-file-excel fa-xl"
                                        href="{{ url('/ShowFirst', $employee->id) }}"></a></th>
                                <th><a class="fa-solid fa-pen-to-square fa-xl"
                                        href="{{ url('/NewEdit', $employee->id) }}"></a></th>
                                <th><a class="fa-solid fa-trash-can fa-xl"
                                        href="{{ url('/NewDelete', $employee->id) }}"></a></th>
                            </tr>
                        @endforeach
                    </tbody>
                    {{ $employees->links() }}
                </table>
                @if (count($employees) > 0)
            </div>
        </div>
    </div>
    
@else
    <div class=" max-w-full mx-auto ">
        <div role="alert" class="notingdata alert shadow-lg mt-4">
            <span class="loading loading-dots loading-md"></span>
            <div>
                <h3 class="font-bold">ไม่มีข้อมูลรอสัมภาษณ์</h3>
                <div class="text-xs">There is no information waiting to be interviewed.</div>
            </div>

        </div>
    </div>
    @endif
@endsection
