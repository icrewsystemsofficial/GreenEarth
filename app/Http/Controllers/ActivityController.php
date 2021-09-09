<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;


class ActivityController extends Controller
{
    //
    function disp(){

        $activities = Activity::all();
        
        
        return view ("pages.activity.index",compact('activities'));
    }
}
