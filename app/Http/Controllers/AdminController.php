<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Http\Requests\UpdateEmployeesRequest;
use App\Models\Prefixs;
use App\Models\Positions;
use App\Models\Psts;
use App\Models\Typemilitarys;
use App\Models\Divingcards;
use App\Models\Cartypes;
use App\Models\TypeEducations;
use App\Models\Nationalitys;
use App\Models\Races;
use App\Models\Religions;
use App\Models\Childens;
use App\Models\Militarys;
use App\Models\AgeDivingcards;
use App\Models\Jopps;
use App\Models\Cases;
use App\Models\Vaccines;
use App\Models\Diseases;
use App\Models\Addicteds;
use App\Models\Educations;
use App\Models\Acquaintances;
use App\Models\Companys;
use App\Models\Maimlines;
use App\Models\Accountnumbers;
use App\Models\Salarys;

class AdminController extends Controller
{
    //_________________________________________________________แสดงหน้าแรกของเว็ป________________________________________________________//
    function home(){
        return view('auth/login');
    }
    //_________________________________________________________หน้าแอดมิน______________________________________________________//
    function AdminDashboard()
    {

        $outmember = Employees::where('status',0)->get();
        $totalout = $outmember->count();

        $waitingmember = Employees::where('status',1)->get();
        $totalwaiting = $waitingmember->count();

        $totalemployee = Employees::where('status',2)->get();
        $total = $totalemployee->count();
        return view('admin/admindashboard',compact('totalout','totalwaiting','total'));
    }
    //_________________________________________________________นับจำนวนคนหน้าuser_______________________________________________________//
    function UserDashboard()
    {
        return view('user/user');
    }
    
}
