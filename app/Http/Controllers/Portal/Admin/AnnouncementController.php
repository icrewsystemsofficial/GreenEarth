<?php

namespace App\Http\Controllers\Portal\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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
        $announcement = Announcement::where('id', $id)->first();
        $this->validate($request, [
            'title' => 'required','max:255',Rule::unique('announcements', 'title')->ignore($announcement),
            'body' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);

        $slug = Str::lower($request->title);
        $slug = str_replace(' ', '-', $slug);

        $title = $request->title;
        $body = $request->body;
        $role = $request->role;
        $status = $request->status;
        Announcement::where('id', $id)->update(['title'=>$title, 'body'=>$body, 'role'=>$role, 'status'=>$status, 'slug'=>$slug]);
        notify()->success('Announcement updated successfully!');
        return redirect(route('portal.admin.announcements.index'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:announcements|max:255',
            'body' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);

        $slug = Str::lower($request->title);
        $slug = str_replace(' ', '-', $slug);

        $user = Auth::user();
        $announcement = new Announcement();
        $announcement->title = $request->title;
        $announcement->body = $request->body;
        $announcement->role = $request->role;
        $announcement->status = $request->status;
        $announcement->slug = $slug;
        $announcement->author = $user->name;
        $announcement->save();
        notify()->success('Announcement created successfully!');
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
