<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function registerOrLoginUser()
    {
        $data = Socialite::driver('google')->user();

        // Find the user with that Google ID
        $user = User::where('email', $data->email)->first();
        if($user) {
            Auth::login($user);
            return redirect(route('portal.index'));
        } else {
            return view('auth.register')->with([
                'error' => 'No users associated with that e-mail ID',
                'oauth' => array(
                    'name' => $data->name,
                    'email' => $data->email,
                ),
            ]);
        }

        Auth::login($user);
    }
}
