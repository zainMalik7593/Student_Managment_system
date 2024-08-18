<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\DB;

class display_and_Update_Admin extends Controller
{
    public function index(){
        $request = DB::table('admin')
        ->join('admin_account','admin.id','=','admin_account.id')
        ->where('status','=',1)
        ->select('admin.*','admin_account.email as gmail_account','admin_account.password')
        ->get();
        $admin = true;
        $data = compact('request','admin');
        return view('admin_display')->with($data);
    }
    public function updateform($id){
        $request = admin::find($id);
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
        return view('update_admin')->with($data);
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
        $updateadmin = admin::find($request['id']);
        $updateadmin->name = $request['name'];
        $updateadmin->father_name = $request['father'];
        $updateadmin->email = $request['email'];
        $updateadmin->age = $request['age'];
        $updateadmin->cnic = $request['CNIC'];
        $updateadmin->phone_number = $request['PhoneNum'];
        $updateadmin->dob = $request['dob'];
        $updateadmin->address = $request['address'];
        if ($request->hasFile('image')) {
            $filename = time() .'_'. $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/uploads',$filename);
            $updateadmin->image = $filename;
        }
        $updateadmin->save();
        $msg1 = 'Success: Admin Profile Updated Seccessfully';
        $request = DB::table('admin')
        ->join('admin_account','admin.id','=','admin_account.id')
        ->where('status','=',1)
        ->select('admin.*','admin_account.email as gmail_account','admin_account.password')
        ->get();
        $admin = true;
        $data = compact('request','msg1','admin');
        return view('admin_display')->with($data);
    }
    public function pictureDlt($id){
        $ProfileDlt = admin::find($id);
        $ProfileDlt->image = "";
        $ProfileDlt->save();
        $request = DB::table('admin')
        ->join('admin_account','admin.id','=','admin_account.id')
        ->where('status','=',1)
        ->select('admin.*','admin_account.email as gmail_account','admin_account.password')
        ->get();
        $msg1 = 'Success: Profile Picture Removed Successfully';
        $admin = true;
        $data = compact('request','msg1','admin');
        return view('admin_display')->with($data);
    }
    public function admin_inactive(){
        $request = DB::table('admin')
        ->join('admin_account','admin.id','=','admin_account.id')
        ->where('status','=',0)
        ->select( 'admin.*','admin_account.email as gmail_account','admin_account.password')
        ->get();
        $admin = false;
        $data = compact('request','admin');
        return view('admin_display')->with($data);
    }
    public function inactive($id){
        $admin_inactive = admin::find($id);
        $admin_inactive->status = 0;
        $admin_inactive->save();
        $request = DB::table('admin')
        ->join('admin_account','admin.id','=','admin_account.id')
        ->where('status','=',1)
        ->select('admin.*','admin_account.email as gmail_account','admin_account.password')
        ->get();
        $msg1 = 'Success: This Admin was Inactivated Successfully';
        $admin = true;
        $data = compact('request','msg1','admin');
        return view('admin_display')->with($data);
    }
    public function active($id){
        $admin_active = admin::find($id);
        $admin_active->status = 1;
        $admin_active->save();
        $request = DB::table('admin')
        ->join('admin_account','admin.id','=','admin_account.id')
        ->where('status','=',0)
        ->select('admin.*','admin_account.email as gmail_account','admin_account.password')
        ->get();
        $msg1 = 'Success: This Admin was Activated Successfully';
        $admin = false;
        $data = compact('request','msg1','admin');
        return view('admin_display')->with($data);
    }
}
