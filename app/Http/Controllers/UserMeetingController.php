<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meetings;
use App\Models\Employees;
use App\Models\User;
use App\Models\Employee_Meetings;
use Illuminate\Support\Facades\Auth;

class UserMeetingController extends Controller
{
    public function UserMeeting ()
    {
        $meetings = Meetings::where('status',1)->paginate(20);
        return view ('user/meeting/meeting',compact('meetings'));
    }
    public function AddUser ($id)
    {   
        $id = $id;
        return view('/user/meeting/signature',compact('id'));
    }

   public function AddUserUpdate(Request $request)
   {
        $iduser = Auth::user();
        $check = Employee_Meetings::Where('employee_id',$iduser->employee_id)->where('meeting_id',$request->id)->first();
        if(is_null($check )){
            $folderPath = public_path('signature/');


            $image_parts = explode(";base64,", $request->signature);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            
            $file = $iduser->employee_id.'.'.$image_type;
            $employee_meeting = new Employee_Meetings;
            $employee_meeting->meeting_id = $request->id;
            $employee_meeting->employee_id = $iduser->employee_id;
            $employee_meeting->image = $file;
            $employee_meeting->save(); 
            $filesavepath = $folderPath . $iduser->employee_id. '.'.$image_type;
            file_put_contents($filesavepath, $image_base64);
            return redirect('/UserMeeting')->with('message','เช้าร่วมประชุมเสร็จสิ้น');
        }else{
            return redirect('/UserMeeting')->with('warning','ท่านเข้าร่วมประชุมไปแล้ว');
        } 
   }
}
