<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use http\Env\Response;
use App\Models\Tree;
use App\Models\TreeImages;
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

    public function edit($id)
    {
        $trees = Tree::where('id', $id)->first();
        $treeImages = TreeImages::where('tree_id', $id)->get();
        //return dd($treeImages);
        return view('pages.tree.edit', compact('trees', 'treeImages'));
    }

    public function update(Request $request, $id)
    {
        
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
            
            
            return redirect(route('announcement.index'));
        }
	}

    public function destroy()
    {

    }
}
