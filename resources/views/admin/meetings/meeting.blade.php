{{-- หน้าการอบรม --}}
@extends('admin/layout/adminlayout')
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
        <p>ประชุม/อบรม</p>
    </div>
    <div class="w-full  mx-auto pb-8">
        <div class="con-show">
            <div class="search mb-2  ">
                <div class="flex justify-end">
                    <div class="button">
                        <label style="--clr:#4400F6;" for="my_modal_5" class="btn btnmodify ">+ เพิ่มการอบรม</label>
                    </div>
                </div>
            </div>

            <div class="tatongtable">
                <div class="overflow-x-auto">
                    <table class="table member text-base text-center">
                        <thead>
                            <t>
                                <th>หัวข้อ</th>
                                <th>ผู้จัดอบรม</th>
                                <th>วันที่</th>
                                <th>ตรวจสอบ</th>
                                <th>ลบ</th>
                            </t>
                        </thead>
                        <tbody>
                            @foreach ($meetings as $meeting)
                                <tr">
                                    <th>{{ $meeting->topic }}</th>
                                    <th>{{ $meeting->organizer }}</th>
                                    <th>{{ $meeting->date }}</th>
                                    <th><a class="fa-solid fa-magnifying-glass fa-xl"
                                            href="{{ url('/Check', $meeting->id) }}"></a></th>
                                    <th><a class="fa-regular fa-trash-can fa-xl"
                                            href="{{ url('/DeleteMeeting', $meeting->id) }}"></a></th>
                                    </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @if (count($meetings) > 0)
                </div>
            </div>
        </div>
    </div>
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
{{-- เพิ่มประชุม --}}
<input type="checkbox" id="my_modal_5" class="modal-toggle" />
<div class="modal " role="dialog">
    <div class="modal-box max-w-4xl">
        <form action="{{url('/CreateMeeting')}}" method="POST" >
            @csrf
            <div class="d3 w-11/12 mx-auto ">
                <div class="">
                    <p>หัวข้อ:</p>
                    <input name="topic" type="text" placeholder="Type here"
                        class="input input-bordered input-info w-full " />
                    @error('topic')
                        <div class="invalid-feedback d-block text-red-700">{{ $errors->first('topic') }}</div>
                    @enderror
                </div>
                <div class="">
                    <p>ผู้จัด:</p>
                    <input name="organizer" type="text" placeholder="Type here"
                        class="input input-bordered input-info w-full" />
                    @error('organizer')
                        <div class="invalid-feedback d-block text-red-700">{{ $errors->first('organizer') }}</div>
                    @enderror
                </div>
                <div class="">
                    <p>วันที่ประชุม:</p>
                    <input name="datemeeting" type="date" placeholder="Type here"
                        class="input input-bordered input-info w-full" />
                    @error('datemeeting')
                        <div class="invalid-feedback d-block text-red-700">{{ $errors->first('datemeeting') }}</div>
                    @enderror
                </div>
            </div>
            <div style="--clr:#00A96E" class="button text-center mt-4">
                <button type="submit" class="btn btnmodify">บันทึก</button>
                <label style="--clr:#EF4C53;" for="my_modal_5" class="btn btnmodify btn-error">ยกเลิก</label>
            </div>
        </form>
    </div>
</div>
@endsection
