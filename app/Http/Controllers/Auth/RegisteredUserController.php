<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employees;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        $employees = Employees::where('status',2)->get();
        return view('auth/register',compact('employees'));
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',  'min:8','confirmed'],
            'employee_id' => ['required'],
        ],[
            'employee_id.required' => 'กรุณาเลือก',
            'name.required' => 'กรุกรอกชื่อ',
            'email.required' => 'กรุณากรอกอีเมล',
            'password.min' => 'กรุณากรอกข้อมูลมากกว่า 8 ตัว',
            'password.confirmed' => 'กรุณาใส่passwordให้ตรงกัน'
            
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'employee_id' => $request->employee_id,
        ]);

        

        return redirect()->back()->with('message','สมัครไอดีเสร็จสมบูรณ์');
        
    }
}
