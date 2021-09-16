<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TreeM;
use App\Models\Tree;

class TreeMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$id = 5;
        //return $id;
        $maintenance_log = TreeM::where('tree_id', $id)->get();
        $tree = Tree::where('id', $id)->first();
        //$maintenance_log = TreeM::all();
        //return $maintenance_log;
        //return view('users');
        //return $users;
        return view('pages.tree.history_maintenance', compact('maintenance_log', 'tree'));
        //$builder->where('created_at', '<', now()->subYears(2000));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //return $id;
        $tree = Tree::where('id', $id)->first();
        return view('pages.tree.add_maintenance', compact('tree'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'title' => 'required', 
            'description' => 'required', 
        ]); 
    
        TreeM::create($request->all());
        return redirect(route('tree.index'));

        //TreeM::create([
          //  'id' => $request->id,
            //'tree_id'=> $request->
        //]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
