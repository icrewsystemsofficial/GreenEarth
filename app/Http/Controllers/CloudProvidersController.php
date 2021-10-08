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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        CloudProviders::create($request->all());

        return redirect()->route('pages.cloudproviders.index');
        smilify('success', 'Providers were successfully stored');

        activity()->log('Providers were stored');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CloudProviders  $cloudProviders
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
     * @return \Illuminate\Http\Response
     */
    public function edit(CloudProviders $cloudProviders)
    {
        return view('pages.cloudproviders.edit', compact('cloudProviders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CloudProviders  $cloudProviders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CloudProviders $cloudProviders)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $cloudProviders->update($request->all());

        return redirect()->route('pages.cloudproviders.index');
        smilify('success', 'Providers were successfully updated');

        activity()->log('Providers were updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CloudProviders  $cloudProviders
     * @return \Illuminate\Http\Response
     */
    public function destroy(CloudProviders $cloudProviders)
    {
        $cloudProviders->delete();

        return redirect()->route('pages.cloudproviders.index');
        smilify('success', 'Providers were successfully destroyed');

        activity()->log('Providers were deleted');
    }
}
