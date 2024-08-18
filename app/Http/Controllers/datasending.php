<?php

namespace App\Http\Controllers;

use App\Models\Timing;
use App\Models\ClassName;
use App\Models\reserved_seats;
use App\Models\Seat;
use App\Models\superadmin;
use Illuminate\Http\Request;

class datasending extends Controller
{
    public function index () {
        $B = 15;
        for ($x=3; $x < 10; $x++) { 
            $y = $x;
            $y++;
            $B;
            $timing = new Timing;
            $timing->time = "$x to $y" ;
            $timing->start_time = "$B:00:00";
            $B++;
            $timing->end_time = "$B:00:00";
            $timing->save();
        }
        $arr = ['A','B','C','D'];
        for ($i=0; $i < 4; $i++) { 
            
            $class = new ClassName;
            $class->class = $arr["$i"];
            $class->save();
        }
        for ($i=1; $i < 9; $i++) { 
            $seat = new Seat;
            $seat->seatno = "No # $i";
            $seat->save();
        }
        $timeCount = 8;
        $classCount = 5;
        $seatCount = 9;
        for ($t=1; $t < $timeCount; $t++) { 
            for ($i=1; $i < $classCount; $i++) { 
                for ($j=1; $j < $seatCount; $j++) { 
                    $reservedseat = new reserved_seats;
                    $reservedseat->timeid = $t;
                    $reservedseat->classid = $i;
                    $reservedseat->seatid = $j;
                    $reservedseat->save();
                }
            }
        }
        
        $CreateSuperAdmin = new superadmin;
        $CreateSuperAdmin->name = "super admin";
        $CreateSuperAdmin->father_name = 'demo admin';
        $CreateSuperAdmin->gender = 'Male';
        $CreateSuperAdmin->age = 30;
        $CreateSuperAdmin->email = 'demoSuperAdmin@simsatedu.com';
        $CreateSuperAdmin->password = 'demo@super';
        $CreateSuperAdmin->save();
    }
}
