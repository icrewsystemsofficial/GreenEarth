<?php

namespace App\Http\Controllers;

use App\Models\PlantSpecies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantSpeciesController extends Controller
{
    public function index()
    {
        $plantspecies = PlantSpecies::all();
        return view('pages.plant_species.index', compact('plantspecies'));
    }

    public function create()
    {
        return view('pages.plant_species.create');
    }

    public function save(Request $request)
    {
        $plantspecie = new PlantSpecies();
        $plantspecie->common_name = $request->name;
        $plantspecie->price_per_plant = $request->ppplant;
        $plantspecie->h2o_requirement_per_plant = $request->h2oreq;
        $plantspecie->o2_production = $request->o2pro;
        $plantspecie->co2_absorption = $request->co2abs;
        $plantspecie->save();
        activity()
        ->causedBy(Auth::user())
        ->log('Plant Specie ' .  $plantspecie->common_name . ' was created');
        smilify('Yay', 'We have created a new plant specie, Happy GreenEarth');
        return redirect()->route('portal.admin.forests.trees-species.index');
    }

    public function manage($id)
    {
        $plantspecie = PlantSpecies::where('id', $id)->first();
        return view('pages.plant_species.manage', compact('plantspecie'));
    }

    public function update(Request $request, $id)
    {
        $common_name = $request->name;
        // $scientific_name = $request->scname;
        $price_per_plant = $request->ppplant;
        $h2o_requirement_per_plant = $request->h2oreq;
        $o2_production = $request->o2pro;
        $co2_absorption = $request->co2abs;
        PlantSpecies::where('id', $id)
            ->update([
            'common_name' => $common_name,
            // 'scientific_name'=>$scientific_name,
            'price_per_plant' => $price_per_plant,
            'h2o_requirement_per_plant' => $h2o_requirement_per_plant,
            'o2_production' => $o2_production,
            'co2_absorption' => $co2_absorption,
        ]);
        activity()
        ->causedBy(Auth::user())
        ->log('Plant Specie ' .  $common_name . ' was updated');
        return redirect()->route('portal.admin.forests.trees-species.index');
    }
}
