<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); //this will return the auth user data
        //TODO The logged in user can be accessed directly via auth()->user() helper on the blade. No need
        //to pass it as a variable.
        return view('pages.profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.profile.create');
    }

    public function resend_email_verification(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        smilify('success', 'A verification link was sent to your e-mail', 'Update');
        return back();
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
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('portal.profile.index')
            ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.profile.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $id)
    {
        if($id == '') {
            throw new \Exception('ID must be provided to update user records');
        }

        $user = User::find($id);

        $user->name = request('name');
        $user->email = request('email');
        $user->organization = request('organization');
        $user->phone = request('phone');
        $user->save();

        //Logging the activity.
        activity()->log('User: ' .$request->input('name') . '\'s account was updated');
        smilify('success', $request->input('name') .'\'s profile was updated', 'Yay!');
        return redirect(route('portal.myprofile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('portal.profile.index')
            ->with('success','User deleted successfully');
    }
}
