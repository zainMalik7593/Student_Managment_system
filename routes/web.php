<?php

use App\Http\Controllers\adminOperation;
use App\Http\Controllers\Admission;
use App\Http\Controllers\dataChangingRequest;
use App\Http\Controllers\profileDetails;
use App\Http\Controllers\datasending;
use App\Http\Controllers\display_and_Update_Admin;
use App\Http\Controllers\display_and_Update_Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\index;
use App\Http\Controllers\frontend\googlemap;
use App\Http\Controllers\frontend\login;
use App\Http\Controllers\frontend\charts;
use App\Http\Controllers\permission;
use App\Http\Controllers\SuperAdmin;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// database management system setup;
Route::get('/important/data',[datasending::class,'index']);

Route::get('/',[login::class,'index'])->middleware('login');
Route::post('/login',[login::class,'login'])->middleware('login');
Route::get('/logout',[login::class,'logout'])->middleware('logout');
Route::get('/super',[SuperAdmin::class,'index'])->middleware('superAccessories');
Route::post('/super',[SuperAdmin::class,'update'])->middleware('superAccessories');
Route::get('/passwordChange',[dataChangingRequest::class,'index'])->middleware('userAccessories');
Route::post('/passwordChange',[dataChangingRequest::class,'changePassword'])->middleware('userAccessories');

//change users profile
Route::get('/personalInfoChange',[dataChangingRequest::class,'Profile_update_form'])->middleware('userAccessories')->name('profileInfoChange');
Route::post('/personalInfoChange',[dataChangingRequest::class,'Profile_update'])->middleware('userAccessories');

//super admin change password
Route::get('/Change_password',[SuperAdmin::class,'changePass'])->middleware('superAccessories')->name('superAdminChangePassword');
Route::post('/Change_password',[SuperAdmin::class,'changePassword'])->middleware('superAccessories');

Route::prefix('/permission')->group(function () {
    Route::get('/',[permission::class,'index'])->middleware('superAccessories')->name('permission');
    Route::get('/accept/{id}',[permission::class,'permission_accepted'])->middleware('superAccessories')->name('pass_permit_accept');
    Route::get('/reject/{id}',[permission::class,'permission_rejected'])->middleware('superAccessories')->name('pass_permit_reject');
    Route::get('/profile_accept/{id}',[permission::class,'permission_profile_accept'])->middleware('superAccessories')->name('profile_permit_accept');
    Route::get('/profile_reject/{id}',[permission::class,'permission_profile_reject'])->middleware('superAccessories')->name('profile_permit_reject');
});
Route::prefix('/student')->group(function () {
    Route::get('/admission',[Admission::class,'index'])->middleware('superAccessories')->name('student_admission');
    Route::post('/admission',[Admission::class,'create'])->middleware('superAccessories');
    Route::get('/display',[display_and_Update_Student::class,'index'])->middleware('superAccessories')->name('studentData');
    Route::get('/update/{id}',[display_and_Update_Student::class,'updateform'])->middleware('superAccessories')->name('updateform');
    Route::get('/dlt/{id}',[display_and_Update_Student::class,'pictureDlt'])->middleware('superAccessories')->name('profileDlt');
    Route::post('/update',[display_and_Update_Student::class,'update'])->middleware('superAccessories')->name('update');
});
Route::prefix('/admin')->group(function () {
    Route::get('/add',[adminOperation::class,'index'])->middleware('superAccessories')->name('add_admin');
    Route::post('/add',[adminOperation::class,'create'])->middleware('superAccessories');
    Route::get('/display',[display_and_Update_Admin::class,'index'])->middleware('superAccessories')->name('admin_Data');
    Route::get('/admins_inactive',[display_and_Update_Admin::class,'admin_inactive'])->middleware('superAccessories')->name('Deactive_admin_Data');
    Route::get('/update/{id}',[display_and_Update_Admin::class,'updateform'])->middleware('superAccessories')->name('admin_update_form');
    Route::get('/dlt/{id}',[display_and_Update_Admin::class,'pictureDlt'])->middleware('superAccessories')->name('admin_profile_Dlt');
    Route::get('/inactive/{id}',[display_and_Update_Admin::class,'inactive'])->middleware('superAccessories')->name('admin_inactive');
    Route::get('/active/{id}',[display_and_Update_Admin::class,'active'])->middleware('superAccessories')->name('admin_active');
    Route::post('/update',[display_and_Update_Admin::class,'update'])->middleware('superAccessories')->name('admin_update');
});
Route::get('/profile',[profileDetails::class,'index'])->middleware('logout');
Route::get('/index',[index::class,'index']);
Route::get('/map',[googlemap::class,'index']);
Route::get('/charts',[charts::class,'index']);