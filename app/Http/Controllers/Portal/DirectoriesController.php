<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Directory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



class DirectoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directory = Directory::all();
        return view('pages.directory.admin.index', compact('directory'));
    }

    public function home_index()
    {
        $directory = Directory::all();
        $business_name_slugs = null;

        foreach ($directory as $business) {
            $name = $business->business_name;
            $business_name_slugs[$name] = Str::slug($name, '-');
        }

        #print_r($brand_name_slugs);

        return view('frontend.directory.index', compact('directory', 'business_name_slugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.directory.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'business_name' => 'required',
                'location' => 'required',
                'business_owner' => 'required',
                'brand_name' => 'nullable',
                'business_about' => 'nullable',
                'total_carbon_emission' => 'nullable',
                'total_trees_in_grove' => 'nullable',
                'total_carbon_offset' => 'nullable',
                'facebook_link' => 'nullable|URL',
                'instagram_link' => 'nullable|URL',
                'linkedin_link' => 'nullable|URL',
                'website_link' => 'nullable|URL',
                'employee_count' => 'integer',
                'business_founding_date' => 'nullable|date',
                'business_name_slug' => 'nullable',
            ]);

            #$request->business_name_slug = 'TEST'; # Doesn't work :(

            #Directory::create($request->all());

            Directory::create([
                'business_name_slug' => Str::slug($request->business_name, '-'),
                'business_name' =>  $request->business_name,
                'business_owner' =>  $request->business_owner,
                'brand_name' =>  $request->brand_name,
                'business_about' =>  $request->business_about,
                'location' =>  $request->location,
                'facebook_link' =>  $request->facebook_link,
                'instagram_link' =>  $request->instagram_link,
                'linkedin_link' =>  $request->linkedin_link,
                'website_link' =>  $request->website_link,
                'employee_count' =>  $request->employee_count,
                'business_founding_date' =>  $request->business_founding_date,
            ]);

            #$name = $request->business_name;
            #$business_name_slug = Str::slug($name, '-');
            #$name_slug = Str::slug($name, '-');
            #print_r($request->id);
            #Directory::where('id', $request->id)->update(['business_name_slug' => $name]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exception', 'msg' => $e->getMessage()]);
        }

        activity()->log('Business: ' . $request->input('business_name') . '\'s record was created.');
        smilify('success', $request->input('business_name') . '\'s account created', 'Yay!');
        return redirect(route('portal.admin.directory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function home_show($business_name_slug)
    {
        $business = Directory::where('business_name_slug', $business_name_slug)->get();
        $business = $business[0];
        return view('frontend.directory.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        if (is_null($id)) {
            smilify('error', 'ID should be passed');
            return redirect()->back();
        }
        $business = Directory::find($id);

        if (!$business) {

            return redirect()->back();
        }

        return view(
            'pages.directory.admin.edit',
            compact('business')
        );
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
        try {
            $request->validate([
                'business_name' => 'required',
                'location' => 'required',
                'business_owner' => 'required',
                'brand_name' => 'nullable',
                'business_about' => 'nullable',
                'total_carbon_emission' => 'nullable',
                'total_trees_in_grove' => 'nullable',
                'total_carbon_offset' => 'nullable',
                'facebook_link' => 'nullable|URL',
                'instagram_link' => 'nullable|URL',
                'linkedin_link' => 'nullable|URL',
                'website_link' => 'nullable|URL',
                'employee_count' => 'integer',
                'business_founding_date' => 'nullable|date',
                'business_name_slug' => 'nullable',
            ]);

            $name = $request->business_name;
            $name_slug = Str::slug($name, '-');

            Directory::where('id', $id)->update([
                'business_name_slug' => $name_slug,
                'business_name' =>  $request->business_name,
                'business_owner' =>  $request->business_owner,
                'brand_name' =>  $request->brand_name,
                'business_about' =>  $request->business_about,
                'location' =>  $request->location,
                'facebook_link' =>  $request->facebook_link,
                'instagram_link' =>  $request->instagram_link,
                'linkedin_link' =>  $request->linkedin_link,
                'website_link' =>  $request->website_link,
                'employee_count' =>  $request->employee_count,
                'business_founding_date' =>  $request->business_founding_date,
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'exception', 'msg' => $e->getMessage()]);
        }

        activity()->log('Business: ' . $request->input('business_name') . '\'s record was updated.');
        smilify('success', $request->input('business_name') . '\'s account updated', 'Yay!');
        return redirect()->back();
        #return redirect(route('portal.admin.directory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business_to_delete = Directory::find($id);
        activity()->log('Deleting business ' . $business_to_delete->business_name);
        smilify('success', $business_to_delete->business_name . '\'s account deleted', 'Yay!');

        $business_to_delete->delete();

        return redirect(route('portal.admin.directory.index'));
    }

    public function owner_index()
    {
        #$business = Directory::find(1);
        #$business = DB::table('directories')->where('business_owner', auth()->user()->name)->get();
        $business = Directory::where('business_owner', auth()->user()->name)->get();
        $business = $business[0];
        #print_r($business[0]->business_name);

        if (!$business) {
            smilify('error', 'You do not own a partnered business.');
            return redirect()->back();
        }

        return view(
            'pages.directory.owner.index',
            compact('business')
        );
    }

    public function owner_edit($id)
    {
        #if (is_null($id)) {
        #    smilify('error', 'Business does not exist.');
        #    return redirect()->back();
        #}
        $business = Directory::find($id); # Work on this query later.

        if (!$business) {
            return redirect()->back();
        }

        return view(
            'pages.directory.owner.edit',
            compact('business')
        );
    }
}
