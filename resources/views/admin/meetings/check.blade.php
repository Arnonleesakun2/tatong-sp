{{-- เช็คการอมรม --}}
@extends('admin/layout/adminlayout')
@section('title')
    เช็คอบรม
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
        <div class="con">
            <p>เช็ดชื่อผู้เข้าอมรม</p>
        </div>
        <div class="con-show">
        <div class="search mb-2 ">
            <div class="flex justify-end">
                <div class="button">
                    <a class="btn btnmodify" style="--clr:#FF525B" href="{{ url('/Meeting') }}">ย้อนกลับ</a>
                </div>
            </div>
        </div>
        <div class="">
            <div class="">
                <table class="table text-center">
                    <thead>
                        <tr class="headtable">
                            <th>ชื่อ-นามสกุล</th>
                            <th>ลายเซ็น</th>
                            <th>Tool</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($employeemeetings as $employeemeeting)
                      <tr>
                        <th>{{$employeemeeting->employees->name}}</th></th>
                        <th class="w-6/12">
                                <img class="h-24  w-full" src="{{url('signature/'.$employeemeeting->image)}}" alt="" />
                        </th>
                        <th><a class="fa-regular fa-trash-can fa-xl" href="{{url('/DeleteUser',$employeemeeting->employees->id)}}"></a></th>
                    </tr> 
                      @endforeach   
                    </tbody>
                    {{$employeemeetings->links()}}
                </table>
                @if (count($employeemeetings) > 0)
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
           @endif
    </div>
    </div>
@endsection
