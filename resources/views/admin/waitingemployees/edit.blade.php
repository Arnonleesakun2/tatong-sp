{{-- แก้ไขข้อมูล --}}
@extends('admin/layout/adminlayout')
@section('title')
    แก้ไขข้อมูล
@endsection
@section('content')
    <div class="w-full  mx-auto pb-8">
        <div class="con ">
            <p>แก้ไขข้อมูล</p>
        </div>
        <div class="con-show">
            <form action="{{ url('/Newupdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value= "{{$employee->id}}">
                <div class="w-11/12 ">
                    <div class="">
                        <input name="image" type="file" class="file-input file-input-bordered  " accept=".png,.jpg,.jpeg"/>
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto">
                    <div class=" items-center">
                        <p> วันที่มาสมัคร:</p>
                        <input name="date" value="{{ $employee->date }}" type="text"
                            class="input input-bordered  w-full" />
                    </div>
                    <div class=" items-center">
                        <label>เกิดวันที่:</label>
                        <input name="brithday" value="{{ $employee->brithday }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                </div>

                <div class="d3 w-11/12 mx-auto ">
                    <div class="">
                        <p>คำนำหน้า</p>
                        <select name="prefix" class="select select-bordered w-full ">
                            <option value="{{ $employee->prefixs->id }}">{{ $employee->prefixs->name }}</option>
                            @foreach ($prefixs as $prefix)
                                <option value="{{ $prefix->id }}">{{ $prefix->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <p>ชื่อ-นามสกุล</p>
                        <input name="name" value="{{ $employee->name }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>ชื่อเล่น</p>
                        <input name="nickname" value="{{ $employee->nickname }}" type="text"
                            class="input input-bordered w-full" />
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <p>ที่อยู่ปัจจุบัน</p>
                        <input name="address" value="{{ $employee->address }}" type="text"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="">
                        <p>ที่อยู่ที่ทำงาน</p>
                        <input name="cardaddress" value="{{ $employee->cardaddress }}" type="text"
                            class="input input-bordered w-full" />
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto flex">
                    <div class="">
                        <p>เบอร์ดโทร</p>
                        <input name="tel" value="{{ $employee->tel }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>เลขประจำตัว 13 หลัก</p>
                        <input name="idcard" value="{{ $employee->idcard }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <p>เกิดที่จังหวัด</p>
                        <input name="pobirth" value="{{ $employee->pobirth }}" type="text"
                            class="input input-bordered w-full " />
                    </div>

                    <div class="">
                        <p>อายุ</p>
                        <input name="age" value="{{ $employee->age }}" type="text"
                            class="input input-bordered w-full" />
                    </div>
                </div>

                <div class="d3 w-11/12 mx-auto ">
                    <div class="">
                        <p>สัญชาติ</p>
                        <select name="nationlity" class="select select-bordered w-full ">
                            <option value="{{ $employee->nationalitys->id }}">{{ $employee->nationalitys->name }}</option>
                            @foreach ($nationlitys as $nationlity)
                                <option value="{{ $nationlity->id }}">{{ $nationlity->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <p>เชื้อชาติ</p>
                        <select name="race" class="select select-bordered w-full ">
                            <option value="{{ $employee->races->id }}">{{ $employee->races->name }}</option>
                            @foreach ($races as $race)
                                <option value="{{ $race->id }}">{{ $race->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <p>ศาสนา</p>
                        <select name="religion" class="select select-bordered w-full ">
                            <option value="{{ $employee->religions->id }}">{{ $employee->religions->name }}</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="d3 w-11/12 mx-auto ">
                    <div class="">
                        <p>สถานะภาพ</p>
                        <select name="psts" class="select select-bordered w-full">
                            <option value="{{ $employee->psts->id }}">{{ $employee->psts->name }}</option>
                            @foreach ($psts as $pst)
                                <option value="{{ $pst->id }}">{{ $pst->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <p>จำนวนบุตร</p>
                        <input name="onchilden" value="{{ $employee->childens[0]->onchilden }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>กำลังศึกษาอยู่กี่คน</p>
                        <input name="stum" value="{{ $employee->childens[0]->stum }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                </div>



                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <p>ผ่านการเกณฑ์มาหรือยัง</p>
                        <select name="typemilitary" class="select select-bordered w-full ">
                            <option value="{{ $employee->typemilitarys->id ?? '' }}">
                                {{ $employee->typemilitarys->name ?? '' }}</option>
                            @foreach ($typemilitarys as $typemilitary)
                                <option value="{{ $typemilitary->id }}">{{ $typemilitary->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <p>ถ้ายังถึงกำหนดเมือไร</p>
                        <input name="datemilitary" value="{{ $employee->militarys[0]->datemilitary }}" type="text"
                            class="input input-bordered w-full " />
                    </div>

                </div>


                <div class="d4 w-11/12 mx-auto ">
                    <div class="">
                        <p>ท่านมีใบขับขี่ประเภทใด</p>
                        <select name="divingcard" class="select select-bordered w-full ">
                            <option value="{{ $employee->divingcards->id ?? '' }}">{{ $employee->divingcards->name ?? '' }}
                            </option>
                            @foreach ($divingcards as $divingcard)
                                <option value="{{ $divingcard->id }}">{{ $divingcard->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <p>สามารถขับขี่ยานพาหนะประเภท</p>
                        <select name="cartype" class="select select-bordered w-full ">
                            <option value="{{ $employee->cartypes->id ?? '' }}">{{ $employee->cartypes->name ?? '' }}
                            </option>
                            @foreach ($cartypes as $cartype)
                                <option value="{{ $cartype->id }}">{{ $cartype->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <p>วันอนุญาต</p>
                        <input name="caryearstart" value="{{ $employee->agedivingcards[0]->yearstart }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>วันสิ้นอายุ</p>
                        <input name="caryearend" value="{{ $employee->agedivingcards[0]->yearend }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                </div>



                <div class="d3 w-11/12 mx-auto ">
                    <div class="">
                        <p>เคยสมัครงานที่นี้เมื่อวันที่</p>
                        <input name="datejop" value="{{ $employee->jopps[0]->datejop }}" type="text"
                            class="input input-bordered w-full " />
                    </div>

                    <div class="">
                        <p>ต้องการทำงานตำเเหน่งอะไร</p>
                        <select name="position" class="select select-bordered w-full ">
                            <option value="{{ $employee->positions->id }}">{{ $employee->positions->name }}</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <p>ต้องการเงินเดือนเท่าไร</p>
                        <input name="needsalary" value="{{ $employee->needsalary }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                </div>






                <div class="d4 w-11/12 mx-auto ">
                    <div class="">
                        <p>เคยมีส่วนในคดีอะไรบ้าง</p>
                        <input name="case" value="{{ $employee->cases[0]->case }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>พร้อมจะปฏิบัติงานต่างจังหวัดหรือไม่</p>
                        <select name="towork" class="select select-bordered w-full ">
                            <option>{{ $employee->towork }}</option>
                            <option>ได้</option>
                            <option>ไม่ได้</option>
                        </select>
                    </div>
                    <div class="">
                        <p>วัคซีนโควิคเข็ม1</p>
                        <input name="vaccine1" value="{{ $employee->vaccines[0]->name1 }}" type="text"
                            class="input input-bordered w-full s" />
                    </div>
                    <div class="">
                        <p>วัคซีนโควิคเข็ม2</p>
                        <input name="vaccine2" value="{{ $employee->vaccines[0]->name2 }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                </div>


                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <p>เคยป่วยร้ายเเรงหรือเป็นโรคติดต่อหรือไม่</p>
                        <input name="disease" value="{{ $employee->diseases[0]->name }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>ท่านติดสารเสพติดหรือไม่</p>
                        <input name="addicted" value="{{ $employee->addicteds[0]->name }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                </div>

                <h1 class="mb-6 text-3xl">การศึกษา</h1>

                <div class="schoolrow1 w-full">
                    <div class="">
                        <p>ประเภทการศึกษาที่1</p>
                        <select name="typeeducation" class="select select-bordered w-full max-w-xs">
                            <option value="{{ $employee->typeeducations->id ?? '' }}">
                                {{ $employee->typeeducations->name ?? '' }}
                            </option>
                            @foreach ($typeeducations as $typeeducation)
                                <option value="{{ $typeeducation->id }}">{{ $typeeducation->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="">
                        <p>ตั่งแต่ปี</p>
                        <input name="yearstart" value="{{ $employee->educations[0]->yearstart }}" type="text"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="">
                        <p>ถึงปี</p>
                        <input name="yearend" value="{{ $employee->educations[0]->yearend }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>สถารศึกษา/ที่ตั่ง</p>
                        <input name="location" value="{{ $employee->educations[0]->location }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                </div>
                <div class="schoolrow2 w-full">
                    <div class="">
                        <p>วุฒิที่ได้รับ</p>
                        <input name="degree" value="{{ $employee->educations[0]->degree }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>เกรดเฉลี่ยรวม</p>
                        <input name="gpa" value="{{ $employee->educations[0]->gpa }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                    <div class="">
                        <p>วิชาเอก</p>
                        <input name="major" value="{{ $employee->educations[0]->major }}" type="text"
                            class="input input-bordered w-full " />
                    </div>
                </div>



                <h1 class="mb-6 text-3xl">กรณีเร่งด่วน บุคคลที่สามารถติดต่อได้:</h1>
                <p>คนรู้จักที่สามารถติดต่อได้</p>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <p>ชื่อ-นามสกุล</p>
                        <input name="acquaintance" value="{{ $employee->acquaintances[0]->name }}" type="text"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="">
                        <p>ที่อยู่</p>
                        <input name="addressacquaintance" value="{{ $employee->acquaintances[0]->address }}"
                            type="text" class="input input-bordered w-full " />
                    </div>
                </div>

                <div class="d2 w-11/12 mx-auto ">
                    <div class="">
                        <p>เบอร์โทร</p>
                        <input name="telacquaintance" value="{{ $employee->acquaintances[0]->tel }}" type="text"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="">
                        <p>ความสัมพันธ์</p>
                        <input name="relation" value="{{ $employee->acquaintances[0]->relation }}" type="text"
                            class="input input-bordered w-full " />
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
@endsection
