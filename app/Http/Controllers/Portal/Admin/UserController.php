<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Models\User;
use App\Mail\User_invite;
use App\Models\temp_user;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SendWelcomeMail;

use App\Mail\SendWelcomeEmail;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Directory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // $adminnum = User::role('admin')->where('temporary', '0')->count();
        // $superadminnum = User::role('superadmin')->where('temporary', '0')->count();
        // $totaladminnum = $adminnum + $superadminnum;
        // $usernum = User::role('user')->where('temporary', '0')->count();
        // $volunteernum = User::role('volunteer')->where('temporary', '0')->count();
        $pending = User::where('temporary', '1')->count();
        return view('pages.user.index', compact('users',  'pending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function create() {
         return view('pages.user.create', [
             'roles' => Role::all(), 'organisations' => Directory::all(), 'count_org' => count(Directory::all())
         ]);
     }


    public function mailSend($data) {
        $email = $data->email;
        $uuid = $data->unique_id;
        $name = $data->name;

        $url= "http://127.0.0.1:8000/users/setup/".$uuid;

        $mailInfo = [
            'title' => 'Welcome to Project GreenEarth..!',
            'name' => $name,
            'url' => $url
        ];

        Mail::to($email)->send(new User_invite($mailInfo));

        return response()->json([
            'message' => 'Mail has sent.'
        ], Response::HTTP_OK);
    }

    public function create_temp(Request $request)
    {

        $tempuser= new temp_user;
        #$tempuser->uuid('id');

        $tempuser->name = $request->name;
        $tempuser->email = $request->email;
        $tempuser->role = $request->role;
        $uuid = Str::uuid();
        $tempuser->unique_id = $uuid;
        $tempuser -> save();

        $this->mailsend($tempuser);
        return(redirect('/users/create'));

    }


    public function setup($id)
    {
        $data=temp_user::where('unique_id',$id) -> first();
        return view('pages.user.setup',compact('data'));

        /* $list= temp_user::all();
        foreach($list as $item) {
            if ($item['unique_id']==$id){
                $name=$item['name'];
                $email=$item['email'];


            }
        }
        $tempuser= new temp_user;




        return view ('pages.user.setup',compact('name','email')); */

    }

    public function create_user(Request $req)
    {
        $req -> validate([

            'password'=>'confirmed'
        ]);


        $user = new User;
        $user->name=$req->input('name');
        $user->email= $req->input('email');
        $user->password= Hash::make($req->input('password'));
        $user->role= $req->input('role');
        #$user->givePermissionTo($role);
        #$user->assignRole($role);

        $user->save();

        $data=temp_user::where('email',$req->input('email')) -> first();
        $data->delete();

        return view('/home');


        # Codes for Reference and upgradation:

        /* $pass = $req->input('password')
        $user->password= Hash::make($pass); */

       /*  $delete_user_temp = temp_user::find($req->input('email'));
        return($delete_user_temp); */


        /* activity()
        ->causedBy($user)
        ->log('Created a new user called '.$user->name.''); */
       // notify()->success("Successfully Created","created");


        /* $user= new user;
        #$tempuser->uuid('id');

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $uuid = Str::uuid();
        $user->unique_id = $uuid;
        $user -> save();
        return(redirect('/users/create')); */

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //TODO Check if email already exists in DB, then proceed.
        if(User::where('email', request('email'))->first()) {
            // throw new \Exception('A user with that e-mail ('.request('email').') already exists in the database.');
            smilify('error', 'A user with that email already exists in our database', 'Whooops');
            return back();
        }

        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Str::uuid();
        $user->temporary = 1; // Setting the account as temporary account
        $user->organization = (request('organization') != null) ? request('organization') : null;
        $user->phone = (request('phone') != null) ? request('phone') : null;

        $user->save();

        $user->roles()->detach();
        // $newrole = Role::findByName($request->input('role'));
        // $user->assignRole($newrole->name);

        if(request('send_welcome_email') == null) {
            $data = array(
                'name' => request('name'),
                'url' => route('home.users.verify', $user->password),
            );

            Mail::to(request('email'))->send(new SendWelcomeMail($data));
        }

        activity()->log('User: ' .$request->input('name') . '\'s temporary account was created');
        smilify('success', $request->input('name') .'\'s account created', 'Yay!');
        return redirect(route('portal.admin.users.index'));
    }

    public function verify($uuid) {

        if($uuid == '') {
            throw new \Exception('UUID is required');
        }

        $user = User::where('password', $uuid)->first();
        if($user) {
            return view('pages.user.verify', [
                'user' => $user,
            ]);
        } else {
          // Show error
        }
    }

    public function process(Request $request, $id) {
        if($id == '') {
            throw new \Exception('ID must be provided to update user records');
        }

        $user = User::find($id);

        $request->validate([
            'password' => 'required|string|confirmed|min:8',
            'organization' => 'string|max:255',
            'phone' => 'string|max:15',
        ]);


        $user->password = Hash::make(request('password'));
        $user->organization = request('organization');
        $user->phone = request('phone');
        $user->temporary = 0;
        $user->email_verified_at = now();

        $user->save();
        //Logging the activity.
        activity()->log('User: ' .$request->input('name') . '\'s account was activated');
        smilify('success', $request->input('name') .'\'s profile was updated', 'Yay!');
        return redirect(route('login'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        if(is_null($id)) {
            smilify('error', 'ID should be passed');
            return redirect()->back();
        }
        $user = User::find($id);

        if(!$user) {

            return redirect()->back();
        }

        return view('pages.user.manage', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
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

        if($id == '') {
            throw new \Exception('ID must be provided to update user records');
        }

        $user = User::find($id);

        $user->name = request('name');
        $user->email = request('email');
        $user->organization = request('organization');
        $user->phone = request('phone');

        $user->save();

        //Detaching existing roles and reattaching the new one.
        $user->roles()->detach();
        $newrole = Role::findByName($request->input('role'));
        $user->assignRole($newrole->name);

        //Logging the activity.
        activity()->log('User: ' .$request->input('name') . '\'s account was updated');
        smilify('success', $request->input('name') .'\'s profile was updated', 'Yay!');
        return redirect(route('portal.admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        activity()->log('Deleting user '. $user->name);
        $user->delete();
        smilify('success', 'User deleted successfully');
        return redirect(route('portal.admin.users.index'));
    }
}
