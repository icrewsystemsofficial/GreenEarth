<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use DB;
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

    public function edit($id)
    {
        $announcements = DB::select('select * from announcements where id = ?',[$id]);
        return view('pages.announcement.edit', ['announcements'=>$announcements]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'title' => 'required', 
            'body' => 'required', 
        ]); 
        $title = $request->input('title');
        $body = $request->input('body');
        DB::update('update announcements set title = ? where id = ?',[$title,$id]);
        DB::update('update announcements set body = ? where id = ?',[$body,$id]);
        return redirect(route('announcement.index'));
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
