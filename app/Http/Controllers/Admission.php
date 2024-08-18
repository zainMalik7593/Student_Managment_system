<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\student_account;
use App\Models\reserved_seats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admission extends Controller
{
    public function index(){
        return view('admission');
    }
    public function create(Request $request){
        $request->validate([
            'name' => ['required','string'] ,
            'father' => ['required','string'] ,
            'age' => ['required','integer'] ,
            'course' => ['required','string'] ,
            'email' => ['required','email'] ,
            'gender' => 'required|in:Male,Female,Other',
            'PhoneNum' => ['required','numeric','digits:11'] ,
            'image' => ['required'] ,
            'dob' => ['required','date'] ,
            'CNIC' => ['required','digits:13'] ,
            'time' => ['required','integer'] ,
            'class' => ['required','integer'] ,
            'seat' => ['required','integer'] ,
            'address' => ['required','string'] ,
        ]);
        $student = new student;
        $gr = student::latest('id')->value('grNo');
        if ($gr != null) {
            $grpart = explode('-',$gr);
            $student->grNo = 'BB-'. $grpart[1] + 1;
        } else {
            $student->grNo = 'BB-'. 4000;
        }
        $crs = $request['course'];
        $explode_course = str_replace('_',' ',$crs);
        $student->course = ucwords($explode_course);
        $student->name = $request['name'];
        $student->father_name = $request['father'];
        $student->age = $request['age'];
        $student->email = $request['email'];
        $student->gender = $request['gender'];
        $student->phone_number = $request['PhoneNum'];
        $student->dob = $request['dob'];
        $student->cnic = $request['CNIC'];
        $student->address = $request['address'];
        $student->timeid = $request['time'];
        $student->classid = $request['class'];
        $student->seatid = $request['seat'];
        $filename = time() .'_'. $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/uploads',$filename);
        $student->image = $filename;
        $student->save();
        // nextlogic
        $sturec = student::latest('id')->first(['id','grNo','name','father_name']);
        $stuemail = str_replace(' ','', strtolower($sturec->name) . $sturec->father_name . random_int(1,2000) .'@simsatedu.com') ;
        function passGen($name,$father_name) {
            $specialCharacters = ['!','@','#','$','%','&','*'];
            $randomNumChar1 = random_int(1,6);
            $randomNumChar2 = random_int(1,6);
            $password = str_replace(' ', '',strtolower($name) . $specialCharacters[$randomNumChar1] . strtolower($father_name) . strtoupper(substr($name,0,1)) . strtoupper(substr($father_name,1,1)) .  $specialCharacters[$randomNumChar2]);
            if ($password < 10) {
                $countNum = 5;
            } else {
                $countNum = 3;
            }
            
            for ($i=0; $i < $countNum; $i++) { 
                $password .= random_int(0,9);
            }
            return $password;
        }
        $stupassword = passGen($sturec->name , $sturec->father_name);
        $student_login = new student_account;
        $student_login->id = $sturec->id;
        $student_login->email = $stuemail;
        $student_login->password = $stupassword;
        $student_login->save();

        // nextUnreservedSeat
        $results = Student::join('reserved_seat', function($join) {
            $join->on('student.timeid', '=', 'reserved_seat.timeid')
                 ->on('student.classid', '=', 'reserved_seat.classid')
                 ->on('student.seatid', '=', 'reserved_seat.seatid');
        })
        ->where('reserved_seat.reserved', '=', 0) 
        ->where('student.status', '=', 1) 
        ->where('student.timeid', '=', $request['time']) 
        ->where('student.classid', '=', $request['class']) 
        ->where('student.seatid', '=', $request['seat']) 
        ->select('reserved_seat.id')
        ->get();
        foreach ($results as $value) {
            $id = $value->id;
        }
        if (isset($id)) {
            $reserved_seat = reserved_seats::find($id);
            $reserved_seat->reserved = 1;
            $reserved_seat->save();
            $msg1 = 'Successfully Admission Submit,';
            $request = DB::table('student')
            ->join('student_account','student.id','=','student_account.id')
            ->join('timing','student.timeid','=','timing.id')
            ->join('class','student.classid','=','class.id')
            ->join('seat','student.seatid','=','seat.id')
            ->select('student.*','timing.time','class.class','seat.seatno','student_account.email as gmail_account','student_account.password')
            ->get();
            $data = compact('request','msg1');
            return view('students_display')->with($data);
        } else {
            $msg2 = 'This Admission is aleady Submit,';
            $request = DB::table('student')
            ->join('student_account','student.id','=','student_account.id')
            ->join('timing','student.timeid','=','timing.id')
            ->join('class','student.classid','=','class.id')
            ->join('seat','student.seatid','=','seat.id')
            ->select('student.*','timing.time','class.class','seat.seatno','student_account.email as gmail_account','student_account.password')
            ->get();
            $data = compact('request','msg2');
            return view('students_display')->with($data);
        }
    }

}
