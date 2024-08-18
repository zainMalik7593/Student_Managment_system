<?php

namespace App\Http\Controllers;

use App\Models\superadmin as ModelsSuperadmin;
use Illuminate\Http\Request;

class SuperAdmin extends Controller
{
    public function index() {
        if (session()->get('loginStatus') == 'superAdmin') {
            $superadmindata = ModelsSuperadmin::all();
            
            foreach ($superadmindata as $admin) {
                $image = $admin->image;
                $name = $admin->name;
                $father_name = $admin->father_name;
                $gender = $admin->gender;
                $age = $admin->age;
                $email = $admin->email;
                $data = compact('image','name','father_name','gender','age','email');
                return view('super_admin_updation')->with($data);
            }
        }
    }
    public function update(Request $request){
        $request->validate([
            'name' => ['required','string'] ,
            'father' => ['required','string'] ,
            'age' => ['required','integer'] ,
            'email' => ['required','email'] ,
            'gender' => ['required', 'in:Male,Female,Other'],
        ]);
        $admin = ModelsSuperadmin::find(1);
        $admin->name = $request['name'];
        $admin->father_name = $request['father'];
        $admin->age = $request['age'];
        $admin->email = $request['email'];
        $admin->gender = $request['gender'];
        if ($request->file('image')) {
            $filename = time() .'_'. $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/uploads',$filename);
            $admin->image = $filename;
        } 
        $admin->save();
        $superadmindata = ModelsSuperadmin::find(1);
            
            $image = $superadmindata->image;
            $name = $superadmindata->name;
            $father_name = $superadmindata->father_name;
            $gender = $superadmindata->gender;
            $age = $superadmindata->age;
            $email = $superadmindata->email;
            $msg1 = 'Success! Your profile data has been updated';
            $data = compact('image','name','father_name','gender','age','email','msg1');
        return view('profileDetails')->with($data);

    }
    public function changePass(){
        if (session()->get('loginStatus') === 'superAdmin') {
            $superAdmin = ModelsSuperadmin::where('super_admin.email', '=', session()->get('email'))->get();
            foreach ($superAdmin as $adm) {
                $email = $adm->email;
                $image = $adm->image;
                $gender = $adm->gender;
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
        if (session()->get('loginStatus') === 'superAdmin') {
            $superAdmin = ModelsSuperadmin::where('super_admin.email', '=', session()->get('email'))->get();
            foreach ($superAdmin as $value) {
                // printArray($value);
                // die;
                    if ($request['old_password'] == $value->password) {
                        $value->password = $request['password'];
                        $value->save();
                        $email = $value->email;
                        $image = $value->image;
                        $msg1 = 'Success: Password Changed Successfully';
                        $data = compact('email','image','msg1');
                        return view('user_changing_password')->with($data);
                    } else {
                        $email = $value->email;
                        $image = $value->image;
                        $oldpass = 'Incorrect Password please try agian';
                        $data = compact('email','image','oldpass');
                        return view('user_changing_password')->with($data);
                    }
            }
        }
    }
};