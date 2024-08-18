<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\student;
use App\Models\superadmin;
use Illuminate\Http\Request;

class profileDetails extends Controller
{
    public function index() {
        if (session()->get('loginStatus') == 'student') {
            $studentdata = student::join('student_account', function ($join){
                $join->on('student.id','=','student_account.id');
            })
            ->join('timing', function ($join){
                $join->on('student.timeid','=','timing.id');
            })
            ->join('class', function ($join){
                $join->on('student.classid','=','class.id');
            })
            ->join('seat', function ($join){
                $join->on('student.seatid','=','seat.id');
            })
            ->where('student.id','=',session()->get('id'))
            ->select('student.*','student_account.*','timing.time','class.class','seat.seatno')
            ->get();
            foreach ($studentdata as $student) {
                $image = $student->image;
                $grno = $student->grNo;
                $name = $student->name;
                $father_name = $student->father_name;
                $gender = $student->gender;
                $age = $student->age;
                $course = $student->course;
                $dob = $student->dob;
                $cnic = $student->cnic;
                $email = $student->email;
                $phone_number = $student->phone_number;
                $address = $student->address;
                $time = $student->time;
                $class = $student->class;
                $seat = $student->seatno;
                $status = $student->status;
                $data = compact('image','grno','name','father_name','gender','age','course'
                ,'dob','cnic','email','phone_number','address','time','class','seat','status');
                return view('profileDetails')->with($data);
            }
        } elseif (session()->get('loginStatus') == 'admin') {
            $admindata = admin::join('admin_account', function ($join){
                $join->on('admin.id','=','admin_account.id');
            })
            ->where('admin.id','=',session()->get('id'))
            ->select('admin.*','admin_account.*')
            ->get();
            
            foreach ($admindata as $admin) {
                $image = $admin->image;
                $name = $admin->name;
                $father_name = $admin->father_name;
                $gender = $admin->gender;
                $age = $admin->age;
                $dob = $admin->dob;
                $cnic = $admin->cnic;
                $email = $admin->email;
                $phone_number = $admin->phone_number;
                $address = $admin->address;
                $data = compact('image','name','father_name','gender','age','dob','cnic','email','phone_number','address');
                return view('profileDetails')->with($data);
            }
        } elseif (session()->get('loginStatus') == 'superAdmin') {
            $superadmindata = superadmin::find(1);
            
                $image = $superadmindata->image;
                $name = $superadmindata->name;
                $father_name = $superadmindata->father_name;
                $gender = $superadmindata->gender;
                $age = $superadmindata->age;
                $email = $superadmindata->email;
                $data = compact('image','name','father_name','gender','age','email');
                return view('profileDetails')->with($data);
        }
    }
}
