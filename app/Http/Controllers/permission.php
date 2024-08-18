<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\admin_account;
use App\Models\change_password_request;
use App\Models\Change_profile_request;
use App\Models\student;
use App\Models\student_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class permission extends Controller
{
    public function index (){
        $requestPassword = change_password_request::where('request_status','Pending')->get();
        $requestProfile = Change_profile_request::where('request_status','Pending')->get();
        $data = compact('requestPassword','requestProfile');
        return view('permission_password_changing')->with($data);
    }
    public function permission_accepted ($updateid){
        $requests = change_password_request::find($updateid);
        $userid = $requests->changeid;
        $email = $requests->email;
        $newPassword = $requests->new_password;
        $usertype = $requests->user_type;
        
        if ($usertype == 'student') {
            $updation = student_account::find($userid);
            $updation->email = $email;
            $updation->password = $newPassword;
            $updation->save();
            $requests->request_status = 'Accept';
            $requests->save();
            $msg1 = 'Success: This request was Accepted';
            $requestPassword = change_password_request::where('request_status','Pending')->get();
            $requestProfile = Change_profile_request::where('request_status','Pending')->get();
            $data = compact('requestPassword','requestProfile','msg1');
            return view('permission_password_changing')->with($data);
        } elseif($usertype == 'admin') {
            $updation = admin_account::find($userid);
            $updation->email = $email;
            $updation->password = $newPassword;
            $updation->save();
            $requests->request_status = 'Accept';
            $requests->save();
            $msg1 = 'Success: This request was Accepted';
            $requestPassword = change_password_request::where('request_status','Pending')->get();
            $requestProfile = Change_profile_request::where('request_status','Pending')->get();
            $data = compact('requestPassword','requestProfile','msg1');
            return view('permission_password_changing')->with($data);
        }
        
    }
    public function permission_rejected ($updateid){
        $requests = change_password_request::find($updateid);
        $requests->request_status = 'Reject';
        $requests->save();
        $msg1 = 'Success: This request was Rejected';
        $requestPassword = change_password_request::where('request_status','Pending')->get();
        $requestProfile = Change_profile_request::where('request_status','Pending')->get();
        $data = compact('requestPassword','requestProfile','msg1');
        return view('permission_password_changing')->with($data);
    }

    public function permission_profile_accept ($id){
        $profileAccept = Change_profile_request::find($id);
        $usertype = $profileAccept->usertype;
        $changeid = $profileAccept->changeid;
        if ($usertype == 'student') {
            $changing = student::find($changeid);
        }elseif ($usertype == 'admin') {
            $changing = admin::find($changeid);
        }
        $changing->name = $profileAccept->to_name;
        $changing->father_name = $profileAccept->to_father;
        $changing->email = $profileAccept->to_email;
        $changing->age = $profileAccept->to_age;
        $changing->cnic = $profileAccept->to_cnic;
        $changing->dob = $profileAccept->to_dob;
        $changing->phone_number = $profileAccept->to_phoneNo;
        $changing->address = $profileAccept->to_address;
        if (!$profileAccept->to_img == null) {
            $changing->image = $profileAccept->to_img;
        }
        $changing->save();
        $requests = Change_profile_request::find($id);
        $requests->request_status = 'Accept';
        $requests->save();
        $requestPassword = change_password_request::where('request_status','Pending')->get();
        $requestProfile = Change_profile_request::where('request_status','Pending')->get();
        $msg1 = 'Success: This request was Accepted';
        $data = compact('requestPassword','requestProfile','msg1');
        return view('permission_password_changing')->with($data);
    }
    public function permission_profile_reject ($id){
        $requests = Change_profile_request::find($id);
        $filepath = $requests->to_img;
        $path = 'public/uploads/' . $filepath;

        if (Storage::exists($path)) {
            Storage::delete($path);
            $requests = Change_profile_request::find($id);
            $requests->request_status = 'Reject';
            $requests->save();
            $requestPassword = change_password_request::where('request_status','Pending')->get();
            $requestProfile = Change_profile_request::where('request_status','Pending')->get();
            $msg1 = 'Success: This request was Rejected';
            $data = compact('requestPassword','requestProfile','msg1');
            return view('permission_password_changing')->with($data);
        } else {
            $requests = Change_profile_request::find($id);
            $requests->request_status = 'Reject';
            $requests->save();
            $requestPassword = change_password_request::where('request_status','Pending')->get();
            $requestProfile = Change_profile_request::where('request_status','Pending')->get();
            $msg1 = 'Success: This request was Rejected';
            $data = compact('requestPassword','requestProfile','msg1');
            return view('permission_password_changing')->with($data);
        }
    }
}
