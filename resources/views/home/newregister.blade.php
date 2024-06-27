{{-- ฟอร์มกรอกของมูล พนักงานใหม่ --}}
@extends('home/layout/layout')
@section('title')
    สมัครสมาชิก
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
    <div class="w-full mx-auto pb-8">
        <div class="con ">
            <p>สมัครงาน</p>
        </div>
        <div class="con-show">
            <form action="{{url('/StoreNewEmployees')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-11/12 ">
                    <div class="mr-4">
                        <input id="imageUpload" name="image" type="file" class="file-input file-input-bordered  " accept=".png,.jpg,.jpeg" />
                    </div>
                    @error('image')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('image') }}</div>
                    @enderror
                </div>

                <div class="d2 w-11/12 mx-auto">
                    <div class=" items-center">
                        <label>วันที่มาสมัคร:</label>
                        <input name="date" type="date" placeholder="วันเกิด" class="input input-bordered  w-full " />
                        @error('date')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('date') }}</div>
                        @enderror
                    </div>
                    <div class="items-center">
                        <label>เกิดวันที่:</label>
                        <input name="brithday" type="date" placeholder="วันเกิด" class="input input-bordered  w-full " />
                        @error('brithday')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('brithday') }}</div>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <p>คำนำหน้า</p>
                </div>
                <div class="d3 w-11/12 mx-auto ">
                    <div class="">
                        <select name="prefix" class="select select-bordered w-full max-w-xs">
                            <option disabled selected>เลือก</option>
                            @foreach ($prefixs as $prefix)
                                <option value="{{ $prefix->id }}">{{ $prefix->name }}</option>
                            @endforeach
                        </select>
                        @error('prefix')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('prefix') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="name" type="text" placeholder="ชื่อ-นามสกุล"
                            class="input input-bordered w-full " />
                        @error('name')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('name') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="nickname" type="text" placeholder="ชื่อเล่น" class="input input-bordered w-full " />
                        @error('nickname')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('nickname') }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <input name="address" type="text" placeholder="ที่อยู่ปัจจุบัน"
                            class="input input-bordered w-full" />
                        @error('address')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('address') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="cardaddress" type="text" placeholder="ที่อยู่ตามบัตรประชาชน"
                            class="input input-bordered w-full " />
                        @error('cardaddress')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('cardaddress') }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto flex">
                    <div class="">
                        <input name="tel" type="number" placeholder="เบอร์โทร" class="input input-bordered w-full " />
                        @error('tel')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('tel') }}</div>
                        @enderror
                    </div>

                    <div class="">
                        <input name="idcard" type="number" placeholder="เลขประจำตัว 13 หลัก"
                            class="input input-bordered w-full " />
                        @error('idcard')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('idcard') }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <input name="pobirth" type="text" placeholder="เกิดที่จังหวัด"
                            class="input input-bordered w-full " />
                        @error('pobirth')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('pobirth') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="age" type="number" placeholder="อายุ" class="input input-bordered w-full " />
                        @error('age')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('age') }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d3 w-11/12 mx-auto ">
                    <div class="">
                        <p>สัญชาติ</p>
                        <select name="nationlity" class="select select-bordered w-full ">
                            <option disabled selected>เลือก</option>
                            @foreach ($nationlitys as $nationlity)
                                <option value="{{ $nationlity->id }}">{{ $nationlity->name }}</option>
                            @endforeach
                        </select>
                        @error('nationlity')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('nationlity') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>เชื้อชาติ</p>
                        <select name="race" class="select select-bordered w-full ">
                            <option disabled selected>เลือก</option>
                            @foreach ($races as $race)
                                <option value="{{ $race->id }}">{{ $race->name }}</option>
                            @endforeach
                        </select>
                        @error('race')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('race') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>ศาสนา</p>
                        <select name="religion" class="select select-bordered w-full ">
                            <option disabled selected>เลือก</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                            @endforeach
                        </select>
                        @error('religion')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('religion') }}</div>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <p>สถานะภาพ</p>
                </div>

                <div class="d3 w-11/12 mx-auto ">
                    <div class="">
                        <select name="psts" class="select select-bordered w-full">
                            <option disabled selected>เลือก</option>
                            @foreach ($psts as $pst)
                                <option value="{{ $pst->id }}">{{ $pst->name }}</option>
                            @endforeach
                        </select>
                        @error('psts')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('psts') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="onchilden" type="number" placeholder="จำนวนบุตร"
                            class="input input-bordered w-full " />
                        @error('onchilden')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('onchilden') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="stum" type="number" placeholder="กำลังศึกษาอยู่กี่คน"
                            class="input input-bordered w-full" />
                        @error('stum')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('stum') }}</div>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <p>ผ่านการเกณฑ์มาหรือยัง</p>
                </div>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <select name="typemilitary" class="select select-bordered w-full ">
                            <option disabled selected>เลือก</option>
                            @foreach ($typemilitarys as $typemilitary)
                                <option value="{{ $typemilitary->id }}">{{ $typemilitary->name }}</option>
                            @endforeach
                        </select>
                        @error('typemilitary')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('typemilitary') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="datemilitary" type="text" placeholder="ถ้ายังถึงกำหนดเมือไร"
                            class="input input-bordered w-full " />
                        @error('datemilitary')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('datemilitary') }}</div>
                        @enderror
                    </div>

                </div>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <label>ท่านมีใบขับขี่ประเภทใด</label>
                        <select name="divingcard" class="select select-bordered w-full ">
                            <option disabled selected>เลือก</option>
                            @foreach ($divingcards as $divingcard)
                                <option value="{{ $divingcard->id }}">{{ $divingcard->name }}</option>
                            @endforeach
                        </select>
                        @error('divingcard')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('divingcard') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <div class="">
                            <label>ท่านมีความสามารถในการขับขี่ยานพาหนะประเภทใดบ้าง</label>
                            <select name="cartype" class="select select-bordered w-full ">
                                <option disabled selected>เลือก</option>
                                @foreach ($cartypes as $cartype)
                                    <option value="{{ $cartype->id }}">{{ $cartype->name }}</option>
                                @endforeach
                            </select>
                            @error('cartype')
                                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('cartype') }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <label>วันอนุญาต</label>
                        <input name="caryearstart" type="date" class="input input-bordered w-full " />
                        @error('caryearstart')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('caryearstart') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <label>วันสิ้นอายุ</label>
                        <input name="caryearend" type="date" class="input input-bordered w-full " />
                        @error('caryearend')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('caryearend') }}</div>
                        @enderror
                    </div>
                </div>



                <div class="d4 w-11/12 mx-auto ">

                    <div class="">
                        <p>เคยสมัครงานที่นี้ ถ้าเคยใส่วันที่ ถ้าไม่ก้ไม่ต้องกรอก</p>
                        <input name="datejop" type="date" placeholder="" class="input input-bordered w-full" />
                        @error('datejop')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('datejop') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>ต้องการทำงานตำแหน่งอะไร</p>
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
                        <p>ต้องการเงินเดือนเท่าไร</p>
                        <input name="needsalary" type="number" placeholder="ต้องการเงินเดือนเท่าไร"
                            class="input input-bordered w-full " />
                        @error('needsalary')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('needsalary') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>ท่านเคยมีส่วนในคดีต่างๆหรือไม่</p>
                        <input name="case" type="text" placeholder="ถ้าเคยกรุณาอธิบายถ้าไม่ก้ไม่ต้องกรอก"
                            class="input input-bordered w-full " />
                        @error('case')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('case') }}</div>
                        @enderror
                    </div>
                </div>


                <div class="d3 w-11/12 mx-auto ">
                    <div class="">
                        <p>ท่านพร้อมจะปฏิบัติงานต่างจังหวัดหรือไม่</p>
                        <select name="towork" class="select select-bordered w-full ">
                            <option disabled selected>เลือก</option>
                            <option>ได้</option>
                            <option>ไม่ได้</option>
                        </select>
                        @error('towork')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('towork') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>วัคซีนโควิคเข็ม1</p>
                        <input name="vaccine1" type="text" placeholder="วัคซีนโควิคเข็ม1"
                            class="input input-bordered w-full " />
                        @error('vaccine1')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('vaccine1') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>วัคซีนโควิคเข็ม2</p>
                        <input name="vaccine2" type="text" placeholder="วัคซีนโควิคเข็ม2"
                            class="input input-bordered w-full " />
                        @error('vaccine2')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('vaccine2') }}</div>
                        @enderror
                    </div>
                </div>



                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <p>เคยป่วยร้ายเเรงหรือเป็นโรคติดต่อหรือไม่</p>
                        <input name="disease" type="text" placeholder="ถ้าเคยโปรดระบุชื่อโรคถ้าไม่ก้ไม่ต้่องกรอก"
                            class="input input-bordered w-full " />
                        @error('disease')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('disease') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <p>ท่านติดสารเสพติดหรือไม่</p>
                        <input name="addicted" type="text" placeholder="ถ้าเคยกรุณาอธิบายถ้าไม่ก้ไม่ต้่องกรอก"
                            class="input input-bordered w-full " />
                        @error('disease')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('addicted') }}</div>
                        @enderror
                    </div>
                </div>



                <h1 class="mb-6 text-3xl">การศึกษา</h1>
                <p>ประเภทการศึกษาที่1</p>
                <div class="schoolrow1 w-full">
                    <div class="">
                        <select name="typeeducation" class="select select-bordered w-full max-w-xs">
                            <option disabled selected>เลือก</option>
                            @foreach ($typeeducations as $typeeducation)
                                <option value="{{ $typeeducation->id }}">{{ $typeeducation->name }}</option>
                            @endforeach

                        </select>
                        @error('typeeducation')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('typeeducation') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="yearstart" type="number" placeholder="ตั่งแต่ปี"
                            class="input input-bordered w-full max-w-xs" />
                        @error('yearstart')
                            <div class="invalid-feedback d-block text-red-700 ">{{ $errors->first('yearstart') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="yearend" type="number" placeholder="ถึงปี"
                            class="input input-bordered w-full max-w-xs" />
                        @error('yearend')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('yearend') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="location" type="text" placeholder="สถารศึกษา/ที่ตั่ง"
                            class="input input-bordered w-full " />
                        @error('location')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('location') }}</div>
                        @enderror
                    </div>
                </div>
                <div class="schoolrow2 w-full">
                    <div class="">
                        <input name="degree" type="text" placeholder="วุฒิที่ได้รับ"
                            class="input input-bordered w-full max-w-xs" />
                        @error('degree')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('degree') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="gpa" type="number" placeholder="เกรดเฉลี่ยรวม"
                            class="input input-bordered w-full max-w-xs" />
                        @error('gpa')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('gpa') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="major" type="text" placeholder="วิชาเอก"
                            class="input input-bordered w-full " />
                        @error('majorn')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('major') }}</div>
                        @enderror
                    </div>

                </div>




                <h1 class="mb-6 text-3xl">กรณีเร่งด่วน บุคคลที่สามารถติดต่อได้:</h1>
                <p>คนรู้จักที่สามารถติดต่อได้</p>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <input name="acquaintance" type="text" placeholder="ชื่อ-นามสกุล"
                            class="input input-bordered w-full" />
                        @error('acquaintance')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('acquaintance') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="addressacquaintance" type="text" placeholder="ที่อยู่"
                            class="input input-bordered w-full " />
                        @error('addressacquaintance')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('addressacquaintance') }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <input name="telacquaintance" type="text" placeholder="เบอร์โทร"
                            class="input input-bordered w-full" />
                        @error('telacquaintance')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('telacquaintance') }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <input name="relation" type="text" placeholder="ความสัมพันธ์"
                            class="input input-bordered w-full " />
                        @error('relation')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('relation') }}</div>
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
                            <a class="btn btnmodify" style="--clr:#EF4C53;" href="{{ url('/') }}">ยกเลิก</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
