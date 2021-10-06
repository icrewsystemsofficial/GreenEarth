<?php

namespace App\Http\Controllers\Portal\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Helpers\UserHelper;
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
        $roles = UserHelper::roles();
        return view('pages.announcement.create', compact('roles'));
    }

    public function edit($id)
    {
        $roles = UserHelper::roles();
        $announcements = Announcement::where('id', $id)->first();
        return view('pages.announcement.edit', compact('announcements', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'title' => 'required', 
            'body' => 'required', 
            'role' => 'required',
        ]); 
        $title = $request->input('title');
        $body = $request->input('body');
        Announcement::where('id', $id)->update(['title'=>$title, 'body'=>$body, 'role'=>$request->role]);
        return redirect(route('portal.admin.announcements.index'));
    }

    public function store(Request $request)
    { 
        $request->validate([ 
            'title' => 'required', 
            'body' => 'required', 
            'role' => 'required',
        ]); 
            $user = Auth::user();
            $announcement = new Announcement;
            $announcement->title = $request->title;
            $announcement->body = $request->body;
            $announcement->role = $request->role;
            $announcement->author = $user->name;
            $announcement->save();
    
        return redirect(route('portal.admin.announcements.index'));
    }

    public function view($id)
    {
        $announcements = Announcement::where('id', $id)->first();
        return view('pages.announcement.view', compact('announcements'));
    }

    public function destroy()
    {

    }
}
