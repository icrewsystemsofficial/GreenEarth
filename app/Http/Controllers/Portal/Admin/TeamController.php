<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('pages.teams.index', compact('teams'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.teams.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request;
        $data['userlst'] = json_encode($request->userlst);
        // $data['tags'] = implode(",", $request->tags);
        $team = new Team();
        $team->name = $request->tname;
        $team->desc = $request->tdesc;
        $team->userlst = $data['userlst'];
        $team->save();
        smilify('success', 'team Created successfully');
        activity()
        ->causedBy(Auth::user())
        ->log('team ID: ' .$team->id . ' was created');
        smilify('success', 'Team ID: '.$team->id .' created', 'Yay!');
        return redirect()->route('portal.admin.teams.index');
    }

    public function edit(Request $request, $id)
    {
        $users = User::all();
        $team = Team::find($id);
        return view('pages.teams.edit', compact('team','users'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        $team->name = $request->tname;
        $team->desc = $request->tdesc;
        $data = $request;
        $data['userlst'] = json_encode($request->userlst);
        $team->userlst = $data['userlst'];
        $team->save();
        activity()
        ->causedBy(Auth::user())
        ->log('Team ID: ' .$id . ' status was updated');
        smilify('success', 'ID: '.$request->id .' was updated', 'Yay!');
        smilify('success', 'Team updated successfully');
        return redirect(route('portal.admin.teams.index'));
    }

    public function delete($id)
    {
        $team = Team::find($id);
        $team->delete();
        activity()
        ->causedBy(Auth::user())
        ->log('Team ID: ' .$id . ' was deleted');
        smilify('success', 'Team deleted successfully');
        return redirect(route('portal.admin.teams.index'));
    }
}
