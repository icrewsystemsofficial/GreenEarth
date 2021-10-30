<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.profile.create');
    }

    public function resend_email_verification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        smilify('success', 'A verification link was sent to your e-mail', 'Update');
        return back();
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
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('portal.profile.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, $id)
    {
        if ($id === '') {
            throw new \Exception('ID must be provided to update user records');
        }

        $user = User::find($id);

        $user->name = request('name');
        $user->email = request('email');
        $user->organization = request('organization');
        $user->phone = request('phone');
        $user->save();

        //Logging the activity.
        activity()->log('User: ' . $request->input('name') . '\'s account was updated');
        smilify('success', $request->input('name') . '\'s profile was updated', 'Yay!');
        return redirect(route('portal.myprofile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('portal.profile.index')
            ->with('success', 'User deleted successfully');
    }

    public function store_avatar(Request $req)
    {
        if ($req->hasFile('avatar')) {
            $file = $req->file('avatar');
            $folder = $file->getClientOriginalName();
            $filename = uniqid() . '-' . now()->timestamp . '.png';

            if (TemporaryFile::exists()) {
                $path = 'avatars';
                $files = Storage::allFiles($path);
                Storage::delete($files);
                TemporaryFile::truncate();
            }
            $file->storeAs('avatars/', $filename);
            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'user_id' => Auth::user()->id,
            ]);
            return $filename;
        }
    }

    public function store_avatar_in_database($id)
    {
        $temporaryFile = TemporaryFile::first();
        $user = User::where('id', $id)->first();
        $ds = DIRECTORY_SEPARATOR;
        File::delete(public_path($user->avatar));
        $user->avatar = 'storage/avatars/' . $temporaryFile->filename;
        $user->save();
        $path_to = 'public/avatars' . $ds . $temporaryFile->filename;
        $path_from = 'avatars' . $ds . $temporaryFile->filename;
        Storage::copy($path_from, $path_to);
        $files = Storage::allFiles('avatars');
        Storage::delete($files);
        activity()
        ->causedBy(Auth::user())
        ->log($user->name . "'s profile photo was updated");
        return redirect()->back();
    }
}
