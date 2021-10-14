<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use http\Env\Response;
use App\Models\Tree;
use App\Models\TreeImages;
use App\Models\TreeM;
use DB;
use DataTables;

class TreeController extends Controller
{
    public function index()
    {
        $trees = Tree::all();
        return view('pages.tree.index', compact('trees'));

    }

    public function create()
    {
        return view('pages.tree.create');
    }

    public function manage($id)
    {
        $trees = Tree::where('id', $id)->first();
        $treeImages = TreeImages::where('tree_id', $id)->get();
        return view('pages.tree.manage', compact('trees', 'treeImages'));
    }

    public function update(Request $request, $id)
    {

            $request->validate([
                'forest_id' => 'required',
                'species_id' => 'required',
                'health' => 'required'
            ]);

            $forest_id = $request->forest_id;
            $species_id = $request->species_id;
            $mission_id = $request->mission_id;
            $lat = $request->lat;
            $long = $request->long;
            $health = $request->health;

            Tree::where('id', $id)->update(['forest_id'=>$forest_id, 'species_id'=>$species_id, 'mission_id'=>$mission_id, 'lat'=>$lat, 'long'=>$long, 'health'=> $health]);

            activity()->log('Updating tree id: '. $id);
            smilify('success', 'Tree updated successfully!');
            return redirect()->route('portal.admin.tree.index');


    }

    public function storeData(Request $request)
	{

            $request->validate([
                'forest_id' => 'required',
                'species_id' => 'required',
                'health' => 'required'
            ]);

			$tree = new Tree;
            $tree->forest_id = $request->forest_id;
            $tree->species_id = $request->species_id;
            $tree->mission_id = $request->mission_id;
            $tree->cluster_id = null;
            $tree->health = $request->health;
            $tree->lat = $request->lat;
            $tree->long = $request->long;
            $tree->planted_by = $request->planted_by;
            $tree->save();

            activity()->log('Creating tree id: '. $tree->id);
            smilify('success', 'Tree added successfully!');
            return redirect()->route('portal.admin.tree.index');


	}

	public function storeImage(Request $request)
	{
		if($request->file('file')){

            $all_images = $request->file('file');

            foreach($all_images as $image){
                $treeid = $request->treeid;

                $imageName = strtotime(now()).rand(11111,99999).'.'.$image->getClientOriginalExtension();

                if(!is_dir(public_path() . '/uploads/images/')){
                    mkdir(public_path() . '/uploads/images/', 0777, true);
                }

               $image->move(public_path() . '/uploads/images/', $imageName);

                $tree = new TreeImages;
                $tree->name = $imageName;
                $tree->tree_id = $treeid;
                $tree->save();
            }

            return redirect()->route('portal.admin.tree.index');
        }

        return redirect()->route('portal.admin.tree.index');

	}

    public function deleteImage(Request $request, $treeid, $id)
    {
        TreeImages::where('id', $id)->delete();
        return back();

    }

    public function destroy(Request $request, $id)
    {

        $tree = Tree::find($id);
        activity()->log('Deleting tree '. $tree->id);
        $tree->delete();
        smilify('success', 'Tree deleted successfully');
        return redirect(route('portal.admin.tree.index'));
    }

}
