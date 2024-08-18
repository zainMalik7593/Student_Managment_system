<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\admin_account;
use App\Models\student_account;
use App\Models\superadmin;
use Illuminate\Http\Request;

class login extends Controller
{
    public function index() {
        return view('login');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8',
        ]);
        $stu_login = false;
        $student = student_account::all();
        foreach ($student as $rec) {
            if ($request['email'] == $rec->email) {
                if ($request['password'] == $rec->password) {
                    session()->put(['id'=> $rec->id ,'email' => $request['email'] , 'password' => $request['password'], 'loginStatus' => 'student']);
                    $stu_login = true;
                    return redirect('/index');
                } else {
                    $err = 'Incorrect Password please try agian';
                    $oldemail = $request['email'];
                    $res = compact('err' , 'oldemail');
                    return view('login')->with($res);
                }
            }
        }

        if ($stu_login == false) {
            $admin_login = false;
            $admin = admin_account::all();
            foreach ($admin as $rec) {
                if ($request['email'] == $rec->email) {
                    if ($request['password'] == $rec->password) {
                        session()->put(['id'=> $rec->id ,'email' => $request['email'] , 'password' => $request['password'], 'loginStatus' => 'admin']);
                        $admin_login = true;
                        return redirect('/index');
                    } else {
                        $err = 'Incorrect Password please try agian';
                        $oldemail = $request['email'];
                        $res = compact('err' , 'oldemail');
                        return view('login')->with($res);
                    }
                }
            }
        }

        if ($admin_login == false) {
            $superadmin_login = false;
            $superadmin = superadmin::all();
            foreach ($superadmin as $admin) {
                if ($request['email'] == $admin->email) {
                    if ($request['password'] == $admin->password) {
                        session()->put(['email' => $request['email'] , 'password' => $request['password'], 'loginStatus' => 'superAdmin']);
                        $superadmin_login = true;
                        return redirect('/index');
                    } else {
                        $err = 'Incorrect Password please try agian';
                        $oldemail = $request['email'];
                        $res = compact('err' , 'oldemail');
                        return view('login')->with($res);
                    }
                } 
            }
        }
        
        if ($superadmin_login == false) {
            $errEmail = 'Invalid Email address';
            $res = compact('errEmail');
            return view('login')->with($res);
        }
    }
    public function logout(){
        session()->forget('email','password','loginStatus');
        return view('logout');
    }
}
