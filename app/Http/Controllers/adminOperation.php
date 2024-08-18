<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\admin_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminOperation extends Controller
{
    public function index() {
        return view('add_admin');
    }
    public function create(Request $request){
        $request->validate([
            'name' => ['required','string'] ,
            'father' => ['required','string'] ,
            'age' => ['required','integer'] ,
            'email' => ['required','email'] ,
            'gender' => ['required'],
            'PhoneNum' => ['required','numeric','digits:11'] ,
            'image' => ['required'] ,
            'dob' => ['required','date'] ,
            'CNIC' => ['required','digits:13'] ,
            'address' => ['required','string'] ,
        ]);
        $admin = new admin;
        $admin->name = $request['name'];
        $admin->father_name = $request['father'];
        $admin->age = $request['age'];
        $admin->email = $request['email'];
        $admin->gender = $request['gender'];
        $admin->phone_number = $request['PhoneNum'];
        $admin->dob = $request['dob'];
        $admin->cnic = $request['CNIC'];
        $admin->address = $request['address'];
        $filename = time() .'_'. $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/uploads',$filename);
        $admin->image = $filename;
        $admin->save();

        // nextlogic
        $sturec = admin::latest('id')->first(['id','name','father_name']);
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
        $admin_login = new admin_account;
        $admin_login->id = $sturec->id;
        $admin_login->email = $stuemail;
        $admin_login->password = $stupassword;
        $admin_login->save();

        $msg1 = 'Success: Congratulations add a new Teacher in your Staff';
        $request = DB::table('admin')
        ->join('admin_account','admin.id','=','admin_account.id')
        ->where('status','=',1)
        ->select('admin.*','admin_account.email as gmail_account','admin_account.password')
        ->get();
        $admin = true;
        $data = compact('request','admin','msg1');
        return view('admin_display')->with($data);
    }

}
