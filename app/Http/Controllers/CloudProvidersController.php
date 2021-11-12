<?php

namespace App\Http\Controllers;

use App\Models\CloudProviders;
use Illuminate\Http\Request;

class CloudProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cloudProviders = CloudProviders::all();

        return view('pages.cloudproviders.index', compact('cloudProviders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cloudproviders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        CloudProviders::create($request->all());

        smilify('success', 'Providers were successfully stored');
        return redirect()->route('home.cloud-providers.index');

        activity()->log('Providers were stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CloudProviders  $cloudProviders
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CloudProviders $cloudProviders)
    {
        return view('pages.cloudproviders.show', compact('cloudProviders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CloudProviders  $cloudProviders
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cloudProviders = CloudProviders::where('id', $id)->first();
        return view('pages.cloudproviders.edit', compact('cloudProviders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CloudProviders  $cloudProviders
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $cloudProviders = CloudProviders::where('id', $id)->first();

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $cloudProviders->fill($input)->save();

        smilify('success', 'Providers were successfully updated');
        return redirect()->route('home.cloud-providers.index');

        activity()->log('Providers were updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CloudProviders  $cloudProviders
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CloudProviders::where('id', $id)->delete();

        smilify('success', 'Providers were successfully destroyed');
        return redirect()->route('home.cloud-providers.index');

        activity()->log('Providers were deleted');
    }
}
