<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateAdnTimeController extends Controller
{
    public function date_and_time(){
        return view('admin.dateandtime');
    }
}
