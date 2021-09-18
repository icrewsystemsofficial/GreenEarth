<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\temp_user;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\User_invite;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        //return view('users');
        //return $users;
        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
