<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use App\Models\TreesUpdates;
use App\Models\Tree;
use App\Models\User;
use App\Helpers\TreesHealthHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
Use \Carbon\Carbon;

class TreesUpdatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $maintenance_log = TreesUpdates::where('tree_id', $id)->get();
        $tree = Tree::where('id', $id)->first();
        return view('pages.tree.history', compact('maintenance_log', 'tree'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $treeHealth = TreesHealthHelper::health();
        $tree = Tree::where('id', $id)->first();
        $user = User::where('id', $tree->planted_by)->first();
        $planted_by = $user->name;
        return view('pages.tree.update', compact('treeHealth', 'tree', 'planted_by'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $request->validate([
            'remarks' => 'required',
            'health' => 'required',
            'logo' => 'required',
            ]);

            $user = Auth::user();
            $update = TreesUpdates::create([
                'tree_id' => $id,
                'remarks' => $request->remarks,
                'health' => $request->health,
                'image_path' => $request->logo,
                'updated_by' => $user->name,
            ]);

            $last_maintained = Carbon::now();
            Tree::where('id', $id)->update(['health'=> $request->health, 'last_maintained'=>$last_maintained]);
         } catch (\Exception $e) {
            return response()->json(['status' => 'exception', 'msg' => $e->getMessage()]);
         }
         smilify('success','Updated for tree #'. $id, 'Yay!');
         return redirect(route('portal.admin.tree.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TreesUpdates  $treesUpdates
     * @return \Illuminate\Http\Response
     */
    public function show(TreesUpdates $treesUpdates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TreesUpdates  $treesUpdates
     * @return \Illuminate\Http\Response
     */
    public function edit(TreesUpdates $treesUpdates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TreesUpdates  $treesUpdates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TreesUpdates $treesUpdates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreesUpdates  $treesUpdates
     * @return \Illuminate\Http\Response
     */
    public function destroy(TreesUpdates $treesUpdates)
    {
        //
    }

    public function upload_image(Request $request)
    {
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = 'update'.strtotime(now()) . rand(11111, 99999) . '.' . $image->getClientOriginalExtension();

            if (!is_dir(storage_path('app/public/uploads/tree-updates/'))) {
                Storage::makeDirectory(storage_path('app/public/uploads/tree-updates/'));
            }

            $image->move(storage_path('/app/public/uploads/tree-updates/'), $imageName);
            return $imageName;
        }
    }
}
