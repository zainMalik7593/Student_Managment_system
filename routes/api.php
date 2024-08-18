<?php

use App\Models\reserved_seats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/user/unreserved_seats',function () {
    $api = reserved_seats::with(['time'])->where('reserved' , 0)->get();
    return response()->json($api->unique('timeid'),200);
});
Route::get('/user/unreserved_seats/{timeid}',function ($timeid) {
    $api = reserved_seats::select('timeid','classid','seatid')->with(['class'])->where('timeid',$timeid)->Where('reserved' , 0)->get();
    return response()->json($api->unique(['classid']),200);
});
Route::get('/user/unreserved_seats/{timeid}/{classid}',function ($timeid,$classid) {
    $api = reserved_seats::select('timeid','classid','seatid')->with(['seat'])->where('timeid',$timeid)->where('classid',$classid)->Where('reserved' , 0)->get();
    return response()->json($api->unique(['seatid']),200);
});