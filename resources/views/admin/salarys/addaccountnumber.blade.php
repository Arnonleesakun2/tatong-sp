{{-- แก้ไขบัญชี --}}
@extends('admin/layout/adminlayout')
@section('title')
    แก้ไขเลขที่บัญชี
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
            <p>แก้ไขเลขบัญชี</p>
        </div>
        <div class="con-show">
        
            <form action="{{url('/UpdateAccountnumber')}}" method="POST">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value="{{$accountnumber[0]->id}}">
                <div class="mt-10 w-full mx-auto mb-8 text-center">
                    <div class="">
                        <p class="mb-2 ">ชื่อ-นามสกุล:</p>
                        <input value="{{$accountnumber[0]->name}}" name="accountnumber" id="salary" value=""
                            type="text" class="input input-bordered w-96 " />
                        @error('accountnumber')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('accountnumber') }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-10 w-11/12 mx-auto mb-8">
                        <div class="button text-center">
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
            </form>
        </div>
    </div>
@endsection
