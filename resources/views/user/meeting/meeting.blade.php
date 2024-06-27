{{-- หน้าการอบรม --}}
@extends('user/layout/userlayout')
@section('title')
    ประชุม/อบรม
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
    @if (Session::has('warning'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.warning("{{ Session::get('warning') }}", '"Warning"!', {
                timeOut: 3000
            });
        </script>
    @endif
    <div class="w-full  mx-auto pb-8">
        <div class="con">
            <p>ประชุม</p>
        </div>
        <div class="con-show">
            <div class="mt-4">
                <table class="table text-center">
                    <thead>
                        <tr class="headtable">
                            <th>หัวข้อการประชุม</th>
                            <th>ผู้จัด</th>
                            <th>วันที่ประชุม</th>
                            <th>เข้าร่วม</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meetings as $meeting)
                            <tr>
                                <th>{{ $meeting->topic }}</th>
                                <th>{{ $meeting->organizer }}</th>
                                <th>{{ $meeting->date }}</th>
                                <th><a href="{{ url('/AddUser', $meeting->id) }}"><i
                                            class="fa-solid fa-right-to-bracket fa-lg"></i></a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$meetings->links()}}
                @if (count($meetings) > 0)
                @else
                <div class=" max-w-full mx-auto ">
                  <div role="alert" class="notingdata alert shadow-lg mt-4">
                      <span class="loading loading-dots loading-md"></span>
                      <div>
                          <h3 class="font-bold">ไม่มีข้อมูลประชุม/อบรม</h3>
                          <div class="text-xs">There is no training / meeting information.</div>
                      </div>
          
                  </div>
              </div>
              @endif
            </div>
        </div>
    </div>
@endsection
