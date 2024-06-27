{{-- หน้าจัดการLayout --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('script')
    @vite('resources/css/app.css')
    {{-----------------------------------------------------------font-awesome----------------------------------------------------------}}
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.5.2-web/css/all.min.css')}}">
    {{-----------------------------------------------------------jquery----------------------------------------------------------------}}
    <script src="jquery/jquery.js"></script>
     {{---------------------------------------------------------switchtheme-------------------------------------------------------------}}
     <script src="/theme/theme.js"></script>
    {{-----------------------------------------------------------toastr----------------------------------------------------------------}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
   
    {{---------------------------------------------------------signature-------------------------------------------------------------}}
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
</head>

<body>
    {{-- navber --}}
    <div class="navbars">
        <div class="nav-con">
            <div class="nav-logo">
                <img src="{{ url('img/logo.jpg') }}" alt="">
                <p>Tatong/SP</p>
            </div>
            <div class="flex">
                <label class="addcom" for="my_modal_6" style="--clr:#00935F;" href="">เพิมบริษัท</label>
                <div class=" dropdown dropdown-bottom dropdown-end mr-1">
                    <div tabindex="0" role="button" class="btn m-1 theme-con">Theme</div>
                    <ul tabindex="0" class="theme-drop dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><button data-set-theme="" data-act-class="ACTIVECLASS">Default</button></li>
                      <li><button data-set-theme="darktheme" data-act-class="ACTIVECLASS">Dark</button></li>
                      <li><button data-set-theme="luxury" data-act-class="ACTIVECLASS">Luxury </button></li>
                      <li><button data-set-theme="cupcake" data-act-class="ACTIVECLASS">Cupcake</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    {{-- sidebar --}}
    <div class="sidebars">
        <ul class="sidebar-link">
            <h4>
                <span>
                    Manage employees
                </span>
                <div class="line"></div>
            </h4>
            <li>
                <a href="{{ url('/admindashboard') }}">
                    <i class="icon-menu fa-solid fa-house fa-xl"></i>
                    <span class="text-menu pl-1">หน้าหลัก</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/Employees') }}">
                    <i class="icon-menu fa-regular fa-user fa-xl pl-1"></i>
                    <span class="text-menu pl-1">ข้อมูลพนักงาน</span>
                </a>
            </li>
            
            {{-- <li> 
                <details class="menus cursor-pointer">
                    <summary class="pl-2 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลพนักงาน</summary>
                    <ul class="mt-4">
                        <a class="menus  cursor-pointer" href="{{ url('/showtatong') }}">
                            <i class="fa-regular fa-user fa-lg"></i>
                            <span>พนักงานบริษัทตาตง</span>
                        </a>
                        <a class="menus  cursor-pointer" href="{{ url('/showsp') }}">
                            <i class="fa-regular fa-user fa-lg"></i>
                            <span>พนักงานบริษัทSP</span>
                        </a>
                    </ul>
                </details>
            </li>--}}
            <li>
                <a href="{{ url('/OutEmployees') }}">
                    <i class="icon-menu fa-solid fa-arrow-right-from-bracket fa-xl pl-1"></i>
                    <span class="text-menu ">พนักงานที่พ้นสภาพ</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/ShowWaitting') }}">
                    <i class="icon-menu fa-solid fa-hourglass-half fa-xl pl-1"></i>
                    <span class="text-menu ">พนักงานรอสัมภาษณ์</span>
                </a>
            </li>
            <h4>
                <span>
                    Event
                </span>
                <div class="line"></div>
            </h4>
            <li>
                <a href="{{ url('/Calender') }}">
                    <i class="icon-menu fa-solid fa-calendar-days fa-xl pl-1"></i>
                    <span class="text-menu ">ปฏิทิน</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/Meeting') }}">
                    <i class="icon-menu fa-solid fa-handshake fa-xl"></i>
                    <span class="text-menu">ประชุม</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="icon-menu fa-solid fa-truck-pickup fa-xl"></i>
                    <span class="text-menu ">QCรถ</span>
                </a>
            </li>
            <li>
                <a href="{{ route('register') }}">
                    <i class="icon-menu fa-solid fa-registered fa-xl pl-1"></i>
                    <span class="text-menu ">สมัครสมาชิก</span>
                </a>
            </li>
            <li>
                <details class="menus cursor-pointer ">
                    <summary class="pl-2 ">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ:{{ Auth::user()->name }}</summary>
                    <ul class="mt-4 ">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="menus cursor-pointer " :href="route('logout')"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('ออกจากระบบ') }}
                            </li>
                        </form>
                    </ul>
                </details>
            </li>
        </ul>
        
    </div>
    <div class="content">
        @yield('content')
    </div>
    @yield('endscript')
    {{-- เพิ่มบริษัท --}}
    <input type="checkbox" id="my_modal_6" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <form action="{{ url('/AddCompany') }}" method="POST">
                @csrf
                <div class="text-center">
                    <p class="font-semibold">เพิ่มบริษัท</p>
                    <input name="company" type="text" placeholder="ชื่อบริษัท"
                        class="input input-bordered input-md w-full max-w-xs mt-4" />
                    @error('company')
                        <div class="invalid-feedback d-block text-red-700">{{ $errors->first('company') }}</div>
                    @enderror
                </div>
                <div style="--clr:#00A96E" class="button text-center mt-4">
                    <button type="submit" class="btn btnmodify">บันทึก</button>
                    <label style="--clr:#EF4C53;" for="my_modal_6" class="btn btnmodify btn-error">ยกเลิก</label>
                </div>
            </form>
        </div>
    </div>
    
</body>

</html>

