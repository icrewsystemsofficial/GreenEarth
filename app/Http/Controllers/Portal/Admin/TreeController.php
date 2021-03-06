<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Helpers\TreesHealthHelper;
use App\Http\Controllers\Controller;
use App\Models\Tree;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TreeController extends Controller
{
    public function index()
    {
        $trees = Tree::all();
        return view('pages.tree.index', compact('trees'));
    }

    public function create()
    {
        $treeHealth = TreesHealthHelper::health();
        return view('pages.tree.create', compact('treeHealth'));
    }

    public function edit($id)
    {
        $treeHealth = TreesHealthHelper::health();
        $tree = Tree::where('id', $id)->first();
        $user = User::where('id', $tree->planted_by)->first();
        $planted_by = $user->name;
        return view('pages.tree.manage', compact('tree', 'treeHealth', 'planted_by'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'forest_id' => 'required',
            'species_id' => 'required',
            'health' => 'required',
        ]);

        $forest_id = $request->forest_id;
        $species_id = $request->species_id;
        $mission_id = $request->mission_id;
        $lat = $request->lat;
        $long = $request->long;
        $health = $request->health;

        Tree::where('id', $id)->update(['forest_id' => $forest_id, 'species_id' => $species_id, 'mission_id' => $mission_id, 'lat' => $lat, 'long' => $long, 'health' => $health]);

        activity()
            ->causedBy(Auth::user())
            ->log('Tree ' . $id . ' details were updated');
        smilify('success', 'Tree updated successfully!');
        return redirect(route('portal.admin.tree.index'));
    }

    public function storeData(Request $request)
    {
        $request->validate([
            'forest_id' => 'required',
            'species_id' => 'required',
            'health' => 'required',
        ]);

        $tree = new Tree();
        $tree->forest_id = $request->forest_id;
        $tree->species_id = $request->species_id;
        $tree->mission_id = $request->mission_id;
        $tree->cluster_id = null;
        $tree->health = $request->health;
        $tree->lat = $request->lat;
        $tree->long = $request->long;
        $tree->planted_by = $request->planted_by;
        $tree->save();

        activity()
        ->causedBy(Auth::user())
        ->log('Tree ' . $tree->id . ' was created');
        smilify('success', 'Tree added successfully!');
        return redirect(route('portal.admin.tree.index'));
    }

    public function destroy($id)
    {
        Tree::where('id', $id)->delete();
        activity()
        ->causedBy(Auth::user())
        ->log('Tree ' . $id . ' was deleted');
        smilify('success', 'Tree deleted successfully!');
        return redirect(route('portal.admin.tree.index'));
    }
}
