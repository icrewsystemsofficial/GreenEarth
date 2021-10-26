<?php

namespace App\Http\Controllers\Portal\Admin;

use Exception;
use App\Models\User;
use App\Models\Forest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ForestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.forests.index', [
            'forests' => Forest::where('status', 1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.forests.create');
    }

    public function drawPolygon($id = '') {

        if($id == '') {
            throw new Exception('Forest ID must be provided');
        }

        $forest = Forest::find($id);

        return view('pages.forests.polygon', [
            'forest' => $forest
        ]);
    }

    public function savePolygon($id) {
        if($id == '') {
            throw new Exception('Forest ID must be provided');
        }

        $forest = Forest::find($id);

        $forest->geojson_path = request('geojson_path');
        $forest->area = request('area');

        $forest->save();

        activity()->log('Geo-spatial data for '. $forest->name . ' with '. request('area') .' sq.meters was added');
        smilify('success', 'Forest geo-spatial data was added successfully');
        return redirect(route('portal.admin.forests.manage', $forest->id));
    }

    public function manage($id) {
        if($id == '') {
            throw new Exception('Forest ID must be provided');
        }

        $forest = Forest::find($id);

        $volunteers = User::role('volunteer')->get();

        return view('pages.forests.manage', [
            'forest' => $forest,
            'volunteers' => $volunteers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'lat' => 'numeric|required',
            'long' => 'numeric|required',
            'address' => 'nullable',
            'country' => 'required',
            'name' => 'required|max:255|min:5',
            'description' => 'nullable|max:500',
            'status' => 'required',
        ]);

        $forest = Forest::create($validated);
        activity()->log('A new forest called '. request('forest_name') . ' was created');
        smilify('success', 'Forest created successfully, but we need few more information');
        return redirect(route('portal.admin.forests.polygon', $forest->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
        $validated = $request->validate([
            'lat' => 'numeric|required',
            'long' => 'numeric|required',
            'address' => 'nullable',
            'country' => 'required',
            'name' => 'required|max:255|min:5',
            'description' => 'nullable|max:500',
            'status' => 'required',
        ]);

        Forest::find($id)->update($validated);
        activity()->log(''. request('name') . ' was updated');
        smilify('success', 'Forest updated successfully');
        return redirect(route('portal.admin.forests.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forest = Forest::find($id);
        activity()->log(''. $forest->name . ' was updated');
        smilify('success', 'Forest deleted successfully');
        $forest->delete();
        return redirect(route('portal.admin.forests.index'));
    }


    /**
     * geocode - API method, used to fetch reverse location data from API server.
     *
     * @param  mixed $place
     * @return void
     */
    public function geocode($place) {
        $response = array();
        if(!$place) {
            $response['code'] = '500';
            $response['message'] = 'Area must be provided';
        } else {
            $request = Http::get('https://api.opencagedata.com/geocode/v1/json?key=c9c8fa0a795646bab2d41d8c60fdc341&q='.$place.'&pretty=1&no_annotations=1');
            $total = count($request->json()['results']);
            if($total == 0) {
                $response['code'] = 404;
                $response['message'] = $total . ' results loaded for '.$place.'. Try another location';
            } else {
                $data = $request->json()['results'];
                $response['code'] = 200;
                $response['message'] = $total . ' results loaded for '.$place;
                $response['data'] = $data;
            }
        }
        return response($response);
    }
}
