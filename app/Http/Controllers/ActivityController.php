<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function disp()
    {
        $activities = Activity::orderBy('updated_at', 'DESC')->get();
        return view('pages.activity.index', compact('activities'));
    }
}
