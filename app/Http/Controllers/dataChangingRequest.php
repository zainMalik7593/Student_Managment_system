<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\admin_account;
use App\Models\change_password_request;
use App\Models\Change_profile_request;
use App\Models\student;
use Illuminate\Http\Request;

class dataChangingRequest extends Controller
{
    public function index(){
        if (session()->get('loginStatus') === 'admin') {
            $admin = admin::join('admin_account', function($join) {
                $join->on('admin.id', '=', 'admin_account.id');
            })
            ->where('admin.id', '=', session()->get('id')) 
            ->where('admin_account.email', '=', session()->get('email')) 
            ->select('admin_account.email','admin.image','admin.gender')
            ->get();
            foreach ($admin as $adm) {
                $email = $adm->email;
                $gender = $adm->gender;
                $image = $adm->image;
            }
            $data = compact('email','image','gender');
            return view('user_changing_password')->with($data);
        } 
        elseif (session()->get('loginStatus') === 'student') {
            $student = student::join('student_account', function($join) {
                $join->on('student.id', '=', 'student_account.id');
            })
            ->where('student.id', '=', session()->get('id')) 
            ->where('student_account.email', '=', session()->get('email')) 
            ->select('student_account.email','student.image','student.gender')
            ->get();
            foreach ($student as $adm) {
                $email = $adm->email;
                $gender = $adm->gender;
                $image = $adm->image;
            }
            $data = compact('email','image','gender');
            return view('user_changing_password')->with($data);
        } 
        
    }
    public function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        if (session()->get('loginStatus') === 'admin') {
            $admin = admin::join('admin_account', function($join) {
                $join->on('admin.id', '=', 'admin_account.id');
            })
            ->where('admin.id', '=', session()->get('id')) 
            ->where('admin_account.email', '=', session()->get('email')) 
            ->select('admin_account.email','admin.image','admin_account.password')
            ->get();
            foreach ($admin as $value) {
                if ($request['old_password'] == $value->password) {
                    $checkExistRequest = change_password_request::
                    where('email','=',session()->get('email'))
                    ->where('old_password','=',$request['old_password'])
                    ->where('new_password','=',$request['password'])
                    ->where('request_status','=','Pending')
                    ->get();
                    $dataExist = false;
                    foreach ($checkExistRequest as $existdata) {
                        if ($existdata->email === session()->get('email')) {
                            $dataExist = true;
                        }
                    }
                    if ($dataExist) {
                        $email = $value->email;
                        $image = $value->image;
                        $gender = $value->gender;
                        $msg2 = 'Alert: This Request already exist,';
                        $data = compact('email','image','msg2','gender');
                        return view('user_changing_password')->with($data);
                    } else {
                        $requestchangepass = new change_password_request;
                        $requestchangepass->changeid = session()->get('id');
                        $requestchangepass->email = session()->get('email');
                        $requestchangepass->old_password = $request['old_password'];
                        $requestchangepass->new_password = $request['password'];
                        $requestchangepass->request_status = 'Pending';
                        $requestchangepass->user_type = 'admin';
                        $requestchangepass->save();
                        $email = $value->email;
                        $image = $value->image;
                        $gender = $value->gender;
                        $msg1 = 'Success: Password Changing Request Submit,';
                        $data = compact('email','image','msg1','gender');
                        return view('user_changing_password')->with($data);
                    }
                } else {
                    $email = $value->email;
                    $image = $value->image;
                    $gender = $value->gender;
                    $oldpass = 'Incorrect Password please try agian';
                    $data = compact('email','image','oldpass','gender');
                    return view('user_changing_password')->with($data);
                }
            }
        } elseif (session()->get('loginStatus') === 'student') {
            $student = student::join('student_account', function($join) {
                $join->on('student.id', '=', 'student_account.id');
            })
            ->where('student.id', '=', session()->get('id')) 
            ->where('student_account.email', '=', session()->get('email')) 
            ->select('student_account.email','student.image','student_account.password')
            ->get();
            foreach ($student as $value) {
                if ($request['old_password'] == $value->password) {
                    $checkExistRequest = change_password_request::
                    where('email','=',session()->get('email'))
                    ->where('old_password','=',$request['old_password'])
                    ->where('new_password','=',$request['password'])
                    ->get();
                    $dataExist = false;
                    foreach ($checkExistRequest as $existdata) {
                        if ($existdata->email == session()->get('email')) {
                            $dataExist = true;
                        }
                    }
                    if ($dataExist) {
                        $email = $value->email;
                        $image = $value->image;
                        $gender = $value->gender;
                        $msg2 = 'Alert: This Request already exist,';
                        $data = compact('email','image','msg2','gender');
                        return view('user_changing_password')->with($data);
                    } else {
                        $requestchangepass = new change_password_request;
                        $requestchangepass->changeid = session()->get('id');
                        $requestchangepass->email = session()->get('email');
                        $requestchangepass->old_password = $request['old_password'];
                        $requestchangepass->new_password = $request['password'];
                        $requestchangepass->new_password = $request['password'];
                        $requestchangepass->request_status = 'Pending';
                        $requestchangepass->user_type = 'student';
                        $requestchangepass->save();
                        $email = $value->email;
                        $image = $value->image;
                        $gender = $value->gender;
                        $msg1 = 'Success: Password Changing Request Submit,';
                        $data = compact('email','image','msg1','gender');
                        return view('user_changing_password')->with($data);
                    }
                } else {
                    $email = $value->email;
                    $image = $value->image;
                    $gender = $value->gender;
                    $oldpass = 'Incorrect Password please try agian';
                    $data = compact('email','image','oldpass','gender');
                    return view('user_changing_password')->with($data);
                }
            }
        }
    }
    public function Profile_update_form(){
        if (session()->get('loginStatus') == 'student') {
            $request = student::find(session()->get('id'));
            $name = $request->name;
            $father = $request->father_name;
            $email = $request->email;
            $age = $request->age;
            $PhoneNum = $request->phone_number;
            $cnic = $request->cnic;
            $dob = $request->dob;
            $image = $request->image;
            $address = $request->address;
            $data = compact('name','father','email','age','PhoneNum','cnic','dob','image','address');
            return view('update_student')->with($data);
        } elseif(session()->get('loginStatus') == 'admin') {
            $request = admin::find(session()->get('id'));
            $name = $request->name;
            $father = $request->father_name;
            $email = $request->email;
            $age = $request->age;
            $PhoneNum = $request->phone_number;
            $cnic = $request->cnic;
            $dob = $request->dob;
            $image = $request->image;
            $address = $request->address;
            $data = compact('name','father','email','age','PhoneNum','cnic','dob','image','address');
            return view('update_admin')->with($data);
        }
    }
    public function Profile_update(Request $request){
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
        $usertype = session()->get('loginStatus');
        if ($usertype  == 'admin') {
            $oldData = admin::find(session()->get('id'));
        } elseif ($usertype == 'student') {
            $oldData = student::find(session()->get('id'));
        }
        $name = $oldData->name;
        $father = $oldData->father_name;
        $email = $oldData->email;
        $age = $oldData->age;
        $PhoneNum = $oldData->phone_number;
        $cnic = $oldData->cnic;
        $dob = $oldData->dob;
        $image = $oldData->image;
        $address = $oldData->address;

        $res = new Change_profile_request;
        $res->changeid = $oldData->id;
        $res->from_name = $name;
        $res->from_father = $father;
        $res->from_age = $age;
        $res->from_cnic = $cnic;
        $res->from_email = $email;
        $res->from_phoneNo = $PhoneNum;
        $res->from_dob = $dob;
        $res->from_address = $address;
        $res->from_img = $oldData->image;
        $res->to_name = $request['name'];
        $res->to_father = $request['father'];
        $res->to_age = $request['age'];
        $res->to_cnic = $request['CNIC'];
        $res->to_email = $request['email'];
        $res->to_phoneNo = $request['PhoneNum'];
        $res->to_dob = $request['dob'];
        $res->to_address = $request['address'];
        $res->usertype = $usertype;
        $res->gender = $oldData->gender;
        if ($request['image']) {
            $filename = time() .'_'. $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/uploads',$filename);
            $res->to_img  = $filename;
        }
        $res->save();
        $msg1 = $usertype == 'admin'? 'Success: Admin Information Changing Request Submit,':'Success: Student Information Changing Request Submit,';
        $data = compact('name','father','email','age','PhoneNum','cnic','dob','image','address','msg1');
        return ($usertype == 'admin') ? view('update_admin')->with($data) : view('update_student')->with($data);;
    }
}