{{-- indexlayout --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


    {{---------------------------------------------------------switchtheme-------------------------------------------------------------}}
    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>    

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
    <div class="sidehome">     
    </div>
    <div class="content">
        @yield('content')
    </div>
    @yield('script')
</body>
