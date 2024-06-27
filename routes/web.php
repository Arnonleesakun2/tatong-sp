<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\OldEmployeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\OutemployeesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMeetingController;
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


//-----------------------แสดงหน้าแรกขอเว็ป
Route::get('/',[AdminController::class,'home'])->name('home');
//----------------------แสดงหน้าแรกขอadmin
Route::get('/admindashboard', [AdminController::class, 'AdminDashboard'])->middleware(['auth', 'admin'])->name('adminlogin');
//----------------------แสดงหน้าuser
Route::get('/dashboard', [AdminController::class, 'UserDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
//---------------------หน้าลงทะเบียน
Route::controller(EmployeesController::class)->group(function () {
    Route::get('/NewRegister', 'NewCreate');//หน้าลงทะเบียน
    Route::post('/StoreNewEmployees','NewStore');//นำข้อมูลเข้า่database
    Route::get('/ShowWaitting', 'NewShow');//หน้าแสดงข้อมูลพนักงานที่สมัคร
    Route::get('/ShowFirst/{id}', 'NewShowFirst');//หน้าแสดงข้อมูลตามไอดีที่ส่ง
    Route::get('/NewEdit/{id}','NewEdit');//หน้าแสดงแก้ไขข้อมูลพนักงานที่สมัคร
    Route::patch('/Newupdate','Newupdate');//แก้ไข
    Route::get('/NewDelete/{id}','NewDelete');//ลบข้อมูลพนักงานไหม่
    Route::get('/NewAdd/{id}','NewAdd');//ไปหน้าสมาชิกเข้าบริษัท ตามแต่ละid
    Route::patch('/NewUpdateEmployees','NewUpdateEmployees');//เพิ่มสมาชิกเข้าบริษัท
});

//---------------------user
Route::middleware(['auth', 'verified'])->group(function(){
    Route::controller(UserController::class)->group(function(){
        //-----------ข้อมูล
            Route::get('/UserInfo','UserInfo');
    });
    Route::controller(UserMeetingController::class)->group(function(){
        //-----------ประชุม
            Route::get('/UserMeeting','UserMeeting');
        //-----------เข้าร่วมการประชุม
            Route::get('/AddUser/{id}','AddUser');
            Route::post('/AddUserUpdate','AddUserUpdate');
    });
});




//---------------------admin
Route::middleware(['auth', 'admin'])->group(function(){
    Route::controller(RegisteredUserController::class)->group(function(){
        Route::get('/register','create');
        Route::post('/register', 'store')->name('register');
    });
    Route::controller(OldEmployeeController::class)->group(function(){
        //----------------------------หน้าสมาชิกทั้งหมด   
            Route::get('/Employees','Employee');//หน้าสมาชิกทั้งหมด
            Route::get('/EmployeeInfo/{id}','EmployeeInfo');//แสดงข้อมูลสมาชิก
            Route::get('/EmployeeEdit/{id}','EmployeeEdit');//หน้าแก้ไขข้อมูล
            Route::patch('/EmployeeUpdate','EmployeeUpdate');//แก้ไข
            Route::get('/EmployeeOut/{id}','EmployeeOut');//เปลี่ยนสถานะไปพ้นสภาพ
        //----------------------------เลือกบริษัท
            Route::get('/select','SelectCompany');//เลือกบริษัท
        //----------------------------ฟังชั่นsearch
            Route::get('/search','search');//ฟังชั่นsearch
        //----------------------------เพิ่มลบบริษัท    
            Route::post('/AddCompany','CreateCompany');
            Route::post('/DeleteCompany','DeleteCompany');
    });
    Route::controller(MeetingController::class)->group(function () {
            Route::get('/Meeting','Meeting');//หน้าประชุม
            Route::post('/CreateMeeting','CreateMeeting');//นำข้อมูลเข้า่database
            Route::get('/DeleteMeeting/{id}','DeleteMeeting');//ลบรายกานประชุม
            Route::get('/Check/{id}','Check');//แสดงรายชื่อผู้เข้าประชุม
            Route::get('/DeleteUser/{id}','DeleteUser');//แสดงรายชื่อผู้เข้าประชุม
    });
    Route::controller(FullCalenderController::class)->group(function () {
            Route::get('/Calender','Calender');//แสดงปฏิทิน
            Route::view('/AddSchedule', 'admin/calenders/add');//ไปหน้าเพิ่มข้อมูลปฏิทิน
            Route::post('/CreateSchedule','Create');//เพิ่มข้อมูลปฏิทิน
            Route::get('/GetEvents', 'GetEvents');//แสดงข้อมูลปฏิทิน
            Route::get('/Delete/{id}', 'DeleteEvent');//ลบข้อมูลปฏิทิน
            Route::post('/UpdateSchedule/{id}', 'Update');//แก้ไข
            Route::post('/Events/{id}/Resize','Resize');//ลดขยายเวลา
    });
    Route::controller(SalaryController::class)->group(function (){
        //----------------------------เพิ่มหมายเลขบัญชี    
            Route::get('/AddAccountnumber/{id}','AddAccountnumber');//แสดงหน้า
            Route::patch('/UpdateAccountnumber','UpdateAccountnumber');//แก้ไข
        //----------------------------คำนวณเงินเดือน
            Route::get('/CalSalary/{id}','CalSalary');//แสดงหน้าคำนวณเงินเดือน
            Route::patch('/Cal','Cal');//คำนวณเงินเดือน
        //----------------------------ออกรายงาน
            Route::get('/ReportSalary','ReportSalary');//แสดงหน้ารายงานเงินเดือน
            Route::get('/SelectMonth','SelectMonth');//เลือกเดือนแสดงผล
            Route::get('/SelectYear','SelectYear');//เลือกปีแสดงผล
            Route::get('/DeleteSalary/{id}','Delete');//ลบ

    });
    Route::controller(OutemployeesController::class)->group(function(){
        //----------------------------หน้าเลือกสถานะพ้นสภาพ
            Route::get('/SelectOut/{id}','SelectOut');
            Route::patch('/Select','Select');
        //----------------------------หน้าพนักงานพ้นสภาพ
            Route::get('/OutEmployees','OutEmployees');
        //----------------------------เลือกสถานะ
            Route::get('/SelectOutdata','SelectOutdata');
        //----------------------------เพิ่มเข้าบริษัท
            Route::get('/BackOut/{id}','BackOut');
        //----------------------------แสดงข้อมูล
            Route::get('/OutInfo/{id}','OutInfo');
        //----------------------------แก้ไข
            Route::get('/OutEdit/{id}','OutEdit');
            Route::patch('/OutUpdate','OutUpdate');
        //----------------------------ลบ
            Route::get('/OutDelete/{id}','OutDelete');
    });
});









