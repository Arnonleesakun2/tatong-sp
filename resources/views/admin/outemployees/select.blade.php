@extends('admin/layout/adminlayout');
@section('title')
    เลือกพ้นสภาพ
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
    <div class="w-full  mx-auto">
        <div class="con-show">
            <div class="form-title  text-center">
                <h2 class="text-center headeredit ">เลือกสถานะพ้นสภาพ</h2>
            </div>
            <form action="{{url('/Select')}}" method="POST">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value="{{$employee->id}}">
                <div class="mt-10 w-full mx-auto mb-8 text-center">
                    <div class="">
                        <p class="mb-2 ">เลือกสถานะ</p>
                        <select name="outsts" class="select select-bordered w-full max-w-xs mt-4" >
                            <option disabled selected>เลือก</option>
                            @foreach ($outsts as $outst)
                                <option value="{{$outst->id}}">{{$outst->name}}</option>
                            @endforeach
                        </select>
                        @error('outsts')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('outsts') }}</div>
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