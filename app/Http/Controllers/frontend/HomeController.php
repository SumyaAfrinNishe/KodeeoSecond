<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourierRecord;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // $courierrecordlist=CourierRecord::all();
        // return view('frontend.pages.home',compact('courierrecordlist'));

        return view('frontend.pages.home');
    }

    public function 
}