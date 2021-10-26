<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'organization',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile_picture()
    {
        if (Auth::user()->avatar === null) {
            $url = 'https://ui-avatars.com/api/?background=4dc242&color=ffffff&name=' . auth()->user()->name[0];
            $contents = file_get_contents($url);
            $name = uniqid() . '-' . now()->timestamp . '.png';
            Storage::put('public/avatars/' . $name, $contents);
            $user = User::where('id', Auth::user()->id)->first();
            $user->avatar = 'storage/avatars/' . $name;
            $user->save();
            return $url;
        }
        return Auth::user()->avatar;
    }
}
