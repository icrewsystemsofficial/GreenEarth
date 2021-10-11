<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\TreesHealthHelper;
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
        $treeHealth = TreesHealthHelper::health();
        return view('pages.tree.create', compact('treeHealth'));
    }

    public function edit($id)
    {
        $treeHealth = TreesHealthHelper::health();
        $trees = Tree::where('id', $id)->first();
        $treeImages = TreeImages::where('tree_id', $id)->get();
        return view('pages.tree.edit', compact('trees', 'treeImages', 'treeHealth'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'health' => 'required',
                'location' => 'required',
            ]);

            $name = $request->name;
            $description = $request->description;
            $health = $request->health;
            $location = $request->location;

            Tree::where('id', $id)->update(['name'=>$name, 'description'=>$description, 'health'=> $health, 'location'=>$location]);
		}
		catch (\Exception $e) {
			return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
		}
        smilify('success','Tree updated successfully!');
        return response()->json(['status'=>"success",'tree_id'=>$id]);
    }

    public function storeData(Request $request)
	{
		try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'health' => 'required',
                'location' => 'required',
            ]);

			$tree = new Tree;
            $tree->name = $request->name;
            $tree->description = $request->description;
            $tree->health = $request->health;
            $tree->location = $request->location;
            $tree->save();
            $tree_id = $tree->id;
		}
		catch (\Exception $e) {
			return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
		}
        smilify('success','Tree created successfully!');
        return response()->json(['status'=>"success",'tree_id'=>$tree_id]);
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
            return redirect(route('portal.admin.tree.index'));
        }
        return redirect(route('portal.admin.tree.index'));

	}

    public function deleteImage($treeid, $id)
    {
        TreeImages::where('id', $id)->delete();
        smilify('success','Image deleted successfully!');

        return back();
    }

    public function destroy(Request $request, $id)
    {
        TreeImages::where('tree_id', $id)->delete();
        Tree::where('id', $id)->delete();
        smilify('success','Tree deleted successfully!');
        return redirect(route('portal.admin.tree.index'));
    }

}
