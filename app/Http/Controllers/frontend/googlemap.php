<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class googlemap extends Controller
{
    public function index() {
        return view('frontend.maps-google');
    }
}
