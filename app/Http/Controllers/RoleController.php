<?php

namespace App\Http\Controllers;

use App\Mail\CreatedRole;
use App\Mail\DeletedRole;
use App\Mail\UpdatedRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('pages.roles.index', compact('roles'));
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->get()->first();
        return view('pages.roles.edit', compact('role'));
    }

    public function create()
    {
        return view('pages.roles.create');
    }

    public function save(Request $request)
    {
        Role::create(['name' => $request->role]);
        Mail::to('engineering@icrewsystems.com')->send(new CreatedRole($request->role));
        return redirect()->route('portal.admin.roles.index')->with('status', 'A new role has been created successfully.');
    }

    public function update(Request $request, $id)
    {
        $role = Role::where('id', $id);
        $existingRole = Role::where('name', $request->role)->get()->first();
        if (!$existingRole) {
            $role->update(['name' => $request->role]);
        }
        else{
            return redirect()->route('portal.admin.roles.edit', $id)->with('status', 'Cannot rename the role with the name specified, as a role with the name aldready exists.');
        }
        Mail::to('engineering@icrewsystems.com')->send(new UpdatedRole($request->role));
        return redirect()->route('portal.admin.roles.index')->with('status', 'Role successfully edited.');
    }

    public function delete($id)
    {
        $role = Role::where('id', $id)->get()->first();
        $rolename = $role->name;
        $role->delete();
        Mail::to('engineering@icrewsystems.com')->send(new DeletedRole($rolename));
        return redirect()->route('portal.admin.roles.index')->with('status', 'Role deleted successfully.');
    }
}
