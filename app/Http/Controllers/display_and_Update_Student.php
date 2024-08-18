<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\student_account;
use Illuminate\Http\Request;
// use App\Models\student;
use Illuminate\Support\Facades\DB;

class display_and_Update_Student extends Controller
{
    public function index(){
        $request = DB::table('student')
        ->join('student_account','student.id','=','student_account.id')
        ->join('timing','student.timeid','=','timing.id')
        ->join('class','student.classid','=','class.id')
        ->join('seat','student.seatid','=','seat.id')
        ->where('student.status','=',1)
        ->select('student.*','timing.time','class.class','seat.seatno','student_account.email as gmail_account','student_account.password')
        ->get();
        $data = compact('request');
        return view('students_display')->with($data);
    }
    public function updateform($id){
        $request = student::find($id);
        $name = $request->name;
        $father = $request->father_name;
        $email = $request->email;
        $age = $request->age;
        $PhoneNum = $request->phone_number;
        $cnic = $request->cnic;
        $dob = $request->dob;
        $image = $request->image;
        $address = $request->address;
        $data = compact('name','father','email','age','PhoneNum','cnic','dob','image','address','id');
        return view('update_student')->with($data);
    }
    public function update(Request $request) {
        $request->validate([
            'name' => ['required','string'] ,
            'father' => ['required','string'] ,
            'age' => ['required','integer'] ,
            'email' => ['required','email'] ,
            'PhoneNum' => ['required','numeric','digits:11'] ,
            'dob' => ['required','date'] ,
            'CNIC' => ['required','digits:13'] ,
            'address' => ['required','string'] ,
        ]);
        $updateStudent = student::find($request['id']);
        $updateStudent->name = $request['name'];
        $updateStudent->father_name = $request['father'];
        $updateStudent->email = $request['email'];
        $updateStudent->age = $request['age'];
        $updateStudent->cnic = $request['CNIC'];
        $updateStudent->phone_number = $request['PhoneNum'];
        $updateStudent->dob = $request['dob'];
        $updateStudent->address = $request['address'];
        if ($request->hasFile('image')) {
            $filename = time() .'_'. $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/uploads',$filename);
            $updateStudent->image = $filename;
        }
        $updateStudent->save();
        $msg1 = 'Success: Student Profile Updated Seccessfully';
        $request = DB::table('student')
        ->join('student_account','student.id','=','student_account.id')
        ->join('timing','student.timeid','=','timing.id')
        ->join('class','student.classid','=','class.id')
        ->join('seat','student.seatid','=','seat.id')
        ->where('student.status','=',1)
        ->select('student.*','timing.time','class.class','seat.seatno','student_account.email as gmail_account','student_account.password')
        ->get();
        $data = compact('request','msg1');
        return view('students_display')->with($data);
    }
    public function pictureDlt($id){
        $ProfileDlt = student::find($id);
        $ProfileDlt->image = "";
        $ProfileDlt->save();
        $request = DB::table('student')
        ->join('student_account','student.id','=','student_account.id')
        ->join('timing','student.timeid','=','timing.id')
        ->join('class','student.classid','=','class.id')
        ->join('seat','student.seatid','=','seat.id')
        ->where('student.status','=',1)
        ->select('student.*','timing.time','class.class','seat.seatno','student_account.email as gmail_account','student_account.password')
        ->get();
        $msg1 = 'Success: Profile Picture Removed Successfully';
        $data = compact('request','msg1');
        return view('students_display')->with($data);
    }
}
