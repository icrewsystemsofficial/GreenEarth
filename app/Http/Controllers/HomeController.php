<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Tree;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = explode(" ", Auth::user()->name)[0];
        $total_trees = Tree::all()->count();
        $user_id = Auth::user()->id;
        $users_trees = Tree::where('planted_by', $user_id)->count();
        
        //graph 
        $tree_details = Tree::select(
            DB::raw('count(id) as `data`'),
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as new_date")
        )->groupBy('new_date')->orderBy('new_date')->get();
        
        $details = Tree::select(
            DB::raw('count(id) as `data`'),
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as new_date"),
        )->where('planted_by', $user_id)
        ->groupBy('new_date')->orderBy('new_date')->get();

        $data1 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $data2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach($tree_details as $detail){
            $month = explode("-", $detail->new_date)[1];
            $data1[$month-1] = $detail->data;
        }

        foreach($details as $detail){
            $month = explode("-", $detail->new_date)[1];
            $data2[$month-1] = $detail->data;
        }

        $data1 = implode(" ", $data1);
        $data2 = implode(" ", $data2);
        $data1 = str_replace(' ', ',' , $data1);
        $data2 = str_replace(' ', ',' , $data2);
        
        return view('home', compact('user','total_trees','users_trees','data1', 'data2'));
    }

    public function my_profile()
    {
        return view('my-profile');
    }
}
