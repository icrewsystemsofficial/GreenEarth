<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use DataTables;


class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('pages.announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view('pages.announcement.create');
    }

    public function edit()
    {
        return view('pages.announcement.edit');
    }

    public function update()
    {
        
    }

    public function store(Request $request)
    { 
        $request->validate([ 
            'title' => 'required', 
            'body' => 'required', 
        ]); 
    
        Announcement::create($request->all());
        return redirect(route('announcement.index'));
    }

    public function destroy()
    {

    }
}
