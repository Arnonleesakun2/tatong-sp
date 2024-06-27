@extends('user/layout/userlayout')
@section('title')
    ข้อมูล
@endsection
@section('content')
    <div class="w-full  mx-auto pb-8">
        <div class="con ">
            <p>ข้อมูล</p>
        </div>
        <div class="con-show">
            <div class="w-full">
                <div class="max-w-screen-sm mx-auto pt-8">
                    <img class="w-40 h-48 rounded-lg ml-56" src="{{url('uploads/'.$user->employees->image ??'')}}">
                </div>
            </div>

            <div class="d2 w-11/12 mx-auto">
                <div class=" items-center">
                    <p> วันที่มาสมัคร:</p>
                    <input value="{{ $user->employees->date }}" type="text" class="input input-bordered  w-full" />
                </div>
                <div class=" items-center">
                    <label>เกิดวันที่:</label>
                    <input value="{{ $user->employees->brithday }}" type="text" class="input input-bordered w-full " />
                </div>
            </div>

            <div class="d3 w-11/12 mx-auto ">
                <div class="">
                    <p>คำนำหน้า</p>
                    <input value="{{ $user->employees->prefixs->name }}"type="text" class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>ชื่อ-นามสกุล</p>
                    <input value="{{ $user->employees->name }}" type="text" class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>ชื่อเล่น</p>
                    <input value="{{ $user->employees->nickname }}" type="text" class="input input-bordered w-full" />
                </div>
            </div>

            <div class="d2 w-11/12 mx-auto ">
                <div class="">
                    <p>ที่อยู่ปัจจุบัน</p>
                    <input value="{{ $user->employees->address }}" type="text" class="input input-bordered w-full" />
                </div>
                <div class="">
                    <p>ที่อยู่ที่ทำงาน</p>
                    <input value="{{ $user->employees->cardaddress }}" type="text" class="input input-bordered w-full" />
                </div>
            </div>

            <div class="d3 w-11/12 mx-auto flex">
                <div class="">
                    <p>เบอร์ดโทร</p>
                    <input value="{{ $user->employees->tel }}" type="text" class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>เลขประจำตัว 13 หลัก</p>
                    <input value="{{ $user->employees->idcard }}" type="text" class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>บริษัท</p>
                    <input value="{{ $user->employees->companys->name ??''}}" type="text" class="input input-bordered w-full " />
                </div>
            </div>

            <div class="d5 w-11/12 mx-auto ">
                <div class="">
                    <p>ตำแหน่ง</p>
                    <input value="{{ $user->employees->positions->name }}" type="text" class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>หน้าที่</p>
                    <input value="{{ $user->employees->mainlines->name }}" type="text" class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>เงินเดือน</p>
                    <input value="{{ $user->employees->salarys[0]->name ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>เกิดที่จังหวัด</p>
                    <input value="{{ $user->employees->pobirth }}" type="text" class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>อายุ</p>
                    <input value="{{ $user->employees->age }}" type="text" class="input input-bordered w-full" />
                </div>
            </div>

            <div class="d3 w-11/12 mx-auto ">
                <div class="">
                    <p>สัญชาติ</p>
                    <input value="{{ $user->employees->nationalitys->name }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>เชื้อชาติ</p>
                    <input value="{{ $user->employees->races->name }}" type="text" class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>ศาสนา</p>
                    <input value="{{ $user->employees->religions->name }}" type="text" class="input input-bordered w-full " />
                </div>
            </div>



            <div class="d3 w-11/12 mx-auto ">
                <div class="">
                    <p>สถานะภาพ</p>
                    <input value="{{ $user->employees->psts->name ?? '' }}" type="text" class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>จำนวนบุตร</p>
                    <input value="{{ $user->employees->childens[0]->onchilden ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>กำลังศึกษาอยู่กี่คน</p>
                    <input value="{{ $user->employees->childens[0]->stum ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
            </div>



            <div class="d2 w-11/12 mx-auto ">
                <div class="">
                    <p>ผ่านการเกณฑ์มาหรือยัง</p>
                    <input value="{{ $user->employees->typemilitarys->name ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>ถ้ายังถึงกำหนดเมือไร</p>
                    <input value="{{ $user->employees->militarys[0]->datemilitary ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>

            </div>


            <div class="d4 w-11/12 mx-auto ">
                <div class="">
                    <p>ท่านมีใบขับขี่ประเภทใด</p>
                    <input value="{{ $user->employees->divingcards->name ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>สามารถขับขี่ยานพาหนะประเภท</p>
                    <input value="{{ $user->employees->cartypes->name ?? '' }}" type="text"
                        class="input input-bordered w-full" />
                </div>
                <div class="">
                    <p>วันอนุญาต</p>
                    <input value="{{ $user->employees->agedivingcards[0]->yearstart ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>วันสิ้นอายุ</p>
                    <input value="{{ $user->employees->agedivingcards[0]->yearend ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
            </div>


            <div class="d4 w-11/12 mx-auto ">
                <div class="">
                    <p>เคยมีส่วนในคดีอะไรบ้าง</p>
                    <input value="{{ $user->employees->cases[0]->case ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>พร้อมจะปฏิบัติงานต่างจังหวัดหรือไม่</p>
                    <input value="{{ $user->employees->towork }}"type="text" class="input input-bordered w-full s" />
                </div>
                <div class="">
                    <p>วัคซีนโควิคเข็ม1</p>
                    <input value="{{ $user->employees->vaccines[0]->name1 ?? '' }}" type="text"
                        class="input input-bordered w-full s" />
                </div>
                <div class="">
                    <p>วัคซีนโควิคเข็ม2</p>
                    <input value="{{ $user->employees->vaccines[0]->name2 ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
            </div>


            <div class="d3 w-11/12 mx-auto ">
                <div class="">
                    <p>เคยสมัครงานที่นี้เมื่อวันที่</p>
                    <input value="{{ $user->employees->jopps[0]->datejop ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>เคยป่วยร้ายเเรงหรือเป็นโรคติดต่อหรือไม่</p>
                    <input value="{{ $user->employees->diseases[0]->name ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>ท่านติดสารเสพติดหรือไม่</p>
                    <input value="{{ $user->employees->addicteds[0]->name ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
            </div>

            <h1 class="mb-6 text-3xl">การศึกษา</h1>

            <div class="schoolrow1 w-full">
                <div class="">
                    <p>ประเภทการศึกษาที่1</p>
                    <input value="{{ $user->employees->typeeducations->name ?? '' }} " type="text"
                        class="input input-bordered w-full" />
                </div>
                <div class="">
                    <p>ตั่งแต่ปี</p>
                    <input value="{{ $user->employees->educations[0]->yearstart ?? '' }}" type="text"
                        class="input input-bordered w-full" />
                </div>
                <div class="">
                    <p>ถึงปี</p>
                    <input value="{{ $user->employees->educations[0]->yearend ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>สถารศึกษา/ที่ตั่ง</p>
                    <input value="{{ $user->employees->educations[0]->location ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
            </div>
            <div class="schoolrow2 w-full">
                <div class="">
                    <p>วุฒิที่ได้รับ</p>
                    <input value="{{ $user->employees->educations[0]->degree ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>เกรดเฉลี่ยรวม</p>
                    <input value="{{ $user->employees->educations[0]->gpa ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
                <div class="">
                    <p>วิชาเอก</p>
                    <input value="{{ $user->employees->educations[0]->major ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
            </div>



            <h1 class="mb-6 text-3xl">กรณีเร่งด่วน บุคคลที่สามารถติดต่อได้:</h1>
            <p>คนรู้จักที่สามารถติดต่อได้</p>

            <div class="d2 w-11/12 mx-auto ">
                <div class="">
                    <p>ชื่อ-นามสกุล</p>
                    <input value="{{ $user->employees->acquaintances[0]->name ?? '' }}" type="text"
                        class="input input-bordered w-full" />
                </div>
                <div class="">
                    <p>ที่อยู่</p>
                    <input value="{{ $user->employees->acquaintances[0]->address ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
            </div>

            <div class="d2 w-11/12 mx-auto ">
                <div class="">
                    <p>เบอร์โทร</p>
                    <input value="{{ $user->employees->acquaintances[0]->tel ?? '' }}" type="text"
                        class="input input-bordered w-full" />
                </div>
                <div class="">
                    <p>ความสัมพันธ์</p>
                    <input value="{{ $user->employees->acquaintances[0]->relation ?? '' }}" type="text"
                        class="input input-bordered w-full " />
                </div>
            </div>

            <div class="mt-10 w-11/12 mx-auto pb-8">
                <div class="button text-center">
                    <a class="btn btnmodify" style="--clr:#EF4C53;" href="{{ url('/dashboard') }}">ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </div>
@endsection