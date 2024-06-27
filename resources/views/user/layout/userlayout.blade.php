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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-----------------------------------------------------------jquery----------------------------------------------------------------}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    {{-----------------------------------------------------------toastr----------------------------------------------------------------}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    {{---------------------------------------------------------switchtheme-------------------------------------------------------------}}
    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>

    {{---------------------------------------------------------signature-------------------------------------------------------------}}
    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">  --}}
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
            <div class=" dropdown dropdown-bottom dropdown-end mr-1">
                <div tabindex="0" role="button" class="btn m-1 theme-con">Theme</div>
                <ul tabindex="0" class="theme-drop dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li><button data-set-theme="" data-act-class="ACTIVECLASS">Default</button></li>
                  <li><button data-set-theme="darktheme" data-act-class="ACTIVECLASS">Dark</button></li>
                  <li><button data-set-theme="luxury" data-act-class="ACTIVECLASS">Luxury</button></li>
                  <li><button data-set-theme="cupcake" data-act-class="ACTIVECLASS">Cupcake</button></li>
                </ul>
              </div>
        </div>
    </div>
    <div class="sidebars">
        <ul class="sidebar-link">
            <h4>
                <span>
                    User
                </span>
                <div class="line"></div>
            </h4>
            <li>
                <a href="{{url('/dashboard')}}">
                    <i class="icon-menu fa-solid fa-house fa-xl"></i>
                    <span class="text-menu pl-1">หน้าหลัก</span>
                </a>
            </li>
            <li>
                <a href="{{url('/UserInfo')}}">
                    <i class="icon-menu fa-solid fa-user fa-xl pl-1"></i>
                    <span class="text-menu pl-1">ข้อมูล</span>
                </a>
            </li>
            <h4>
                <span>
                    Event
                </span>
                <div class="line"></div>
            </h4>
            <li>
                <a href="{{ url('/UserMeeting') }}">
                    <i class="icon-menu fa-solid fa-handshake fa-xl"></i>
                    <span class="text-menu">ประชุม</span>
                </a>
            </li>
            <li>
                <details class="menus cursor-pointer">
                    <summary class="pl-2 ">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ:{{ Auth::user()->name }}</summary>
                    <ul class="mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="menus cursor-pointer" :href="route('logout')"
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
</body>

</html>
