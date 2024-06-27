{{-- เพิมพนักงานใหม่เข้าบริษัท --}}
@extends('admin/layout/adminlayout')
@section('title')
    เพิ่มพนักงานเข้าบริษัท
@endsection
@section('content')
    <div class="w-full  mx-auto pb-8">
        <div class="con">
            <p>เพิ่มพนักงานเข้าบริษัท</p>
        </div>
        <div class="con-show">
            <form action="{{ url('/NewUpdateEmployees') }}" method="POST">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value="{{$employees->id}}">
                <div class="d2 w-11/12 mx-auto flex">
                    <div class="">
                        <p>ชื่อ:</p>
                        <input name="name" value="{{ $employees->name }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>เลขบัญชี:</p>
                        <input name="accountnumber" type="text" class="input input-bordered w-full " />
                        @error('accountnumber')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('accountnumber') }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d4 w-11/12 mx-auto ">
                    <div class="">
                        <p>บริษัท:</p>
                        <select name="company" class="select select-bordered w-full">
                            <option disabled selected>เลือก</option>
                            @foreach ($companys as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('company') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>ตำแหน่งงาน:</p>
                        <select name="position" class="select select-bordered w-full ">
                            <option disabled selected>เลือก</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                        @error('position')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('position') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>เลือกสายงาน:</p>
                        <select name="mainline" class="select select-bordered w-full">
                            <option disabled selected>เลือก</option>
                            @foreach ($mainlines as $mainline)
                                <option value="{{ $mainline->id }}">{{ $mainline->name }}</option>
                            @endforeach
                        </select>
                        @error('mainline')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('mainline') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>เงินเดือน:</p>
                        <input name="salary" type="text" class="input input-bordered w-full " />
                        @error('salary')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('salary') }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-10 w-11/12 mx-auto mb-8">
                    <div class=" text-center"> 
                        <div class="button">
                            <label class="btn btnmodify" for="my_modal_6" style="--clr:#00935F;" href="">บันทึก</label>
                            <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                            <div class="modal" role="dialog">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg">แน่ใจว่าจะบึนทึก</h3>
                                    <p class="py-4">คลิกปุ่มยกเลิกเพื่อกลับ</p>
                                    <div class="modal-action">
                                        <button style="--clr:#00935F;" type="submit" class="btn btnmodify btn-success">บันทึก</button>
                                        <label style="--clr:#EF4C53;" for="my_modal_6" class="btn btnmodify btn-error">ยกเลิก</label>
                                    </div>
                                </div>
                            </div>
                            </dialog>
                            <a class="btn btnmodify" style="--clr:#EF4C53;" href="{{ url('/ShowWaitting') }}">ยกเลิก</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
@endsection
