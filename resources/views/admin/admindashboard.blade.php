@extends('admin/layout/adminlayout')
@section('title')
    AdminDashboard
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
    <div class="con ">
        <p>Dashboard</p>
    </div>
    <div class="w-full  mx-auto pb-8">
        <div class="con-show ">
            <div class="totals flex">
                <div class="agedivingcard ">
                    <div class="text-center mt-4">
                        <h2>แจ้งเตือนใบขับขี่หมดอายุ</h2>
                    </div>
                    <div class="mx-auto w-11/12">
                        <div class="overflow-x-auto">
                            <table class="table">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Datedivingcard</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cy Ganderton</td>
                                        <td>Quality Control Specialist</td>
                                        <td>status</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tatalmenu">
                    <div style="--clr:#010101" role="alert" class="totallist alert  mb-2">
                        <i class="fa-regular fa-user fa-lg"></i>
                        <div class="">
                            <p>สมาชิกทั้งหมด</p>
                            <p>มี่ทั้งหมด {{ $total }} คน</p>
                        </div>
                        <div class="button">
                            <a style="--clr:#fff" class="btn btnmodify" href="{{ url('/Employees') }}">ดูข้อมูล</a>
                        </div>
                    </div>
                    <div style="--clr:#010101" role="alert" class="totallist alert  mb-2">
                        <i class="fa-regular fa-user fa-lg"></i>
                        <div class="">
                            <p>รายชื่อพ้นสภาพ</p>
                            <p>มี่ทั้งหมด {{ $totalout }} คน</p>
                        </div>
                        <div class="button">
                            <a style="--clr:#fff" class="btn btnmodify" href="{{ url('/OutEmployees') }}">ดูข้อมูล</a>
                        </div>
                    </div>
                    <div style="--clr:#010101" role="alert" class="totallist alert ">
                        <i class="fa-regular fa-user fa-lg"></i>
                        <div class="">
                            <p>รายชื่อที่รอสัมภาษณ์</p>
                            <p>มี่ทั้งหมด {{ $totalwaiting }} คน</p>
                        </div>
                        <div class="button">
                            <a style="--clr:#fff" class="btn btnmodify" href="{{ url('/ShowWaitting') }}">ดูข้อมูล</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
