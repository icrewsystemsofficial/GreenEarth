<?php

namespace App\Http\Controllers;

use App\Mail\SettingChangedMail;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();

        return view('pages.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.settings.create');
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
            'key' => 'required',
            'value' => 'required',
        ]);

        Settings::create($request->all());

        $data = array(
            'id'      =>  $request->id,
            'key'      => $request->key,
            'value'   =>   $request->value,
            'url' => 'greenearth.test',
        );

        Mail::to('hafizmutalib01@gmail.com')->send(new SettingChangedMail($data));

        smilify('success', 'Settings were successfully stored');
        return redirect()->route('portal.admin.settings.index');

        activity()->log('Settings were stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
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
        $settings = Settings::where('id', $id)->first();
        return view('pages.settings.edit', compact('settings'));
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
        $settings = Settings::where('id', $id)->first();

        $this->validate($request, [
            'key' => 'required',
            'value' => 'required',
        ]);

        $input = $request->all();

        $settings->fill($input)->save();

        $data = array(
            'id'      =>  $request->id,
            'key'      => $request->key,
            'value'   =>   $request->value,
            'url' => 'greenearth.test',
        );

        Mail::to('hafizmutalib01@gmail.com')->send(new SettingChangedMail($data));

        smilify('success', 'Settings were successfully updated');
        return redirect()->route('portal.admin.settings.index');

        activity()->log('Settings were updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Settings::where('id', $id)->first();

        $data = array(
            'id'      =>  $request->id,
            'key'      => $request->key,
            'value'   =>   $request->value,
            'url' => 'greenearth.test',
        );

        $deleted = array(
            'id'      =>  '',
            'key'      => '',
            'value'   =>   '',
            'url' => 'greenearth.test',
        );

        Settings::where('id', $id)->delete();

        $deleted = Settings::withTrashed()
        ->where('id', $id)
        ->first();
        
        Mail::to('engineering@icrewsystems.com')->send(new SettingChangedMail($deleted));


        smilify('success', 'Settings were successfully deleted');
        return redirect()->route('portal.admin.settings.index');

        activity()->log('Settings were deleted');
    }


    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'id'     =>  'required',
            'key'  =>  'required|email',
            'value' =>  'required'
        ]);

        $data = array(
            'id'      =>  $request->id,
            'key'      => $request->key,
            'value'   =>   $request->value
        );

        Mail::to('hafizmutalib01@gmail.com')->send(new SettingChangedMail($data));
        return back()->with('success', 'Settings are changed!');
    }
}
