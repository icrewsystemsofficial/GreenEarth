<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        // Add "if" logic here".
        if (Auth::user()->avatar == null) {
            return "https://ui-avatars.com/api/?background=4dc242&color=ffffff&name=" . auth()->user()->name[0];
            // $data = file_get_contents($url);
            // echo $data;
            // $ds = DIRECTORY_SEPARATOR;
            // $hashed_name = base64_encode('abcd');
            // $img_dp = 'public'.$ds.'storage'.$ds.'avatars'.$ds;
            // file_put_contents(public_path($hashed_name), $data);
            // echo $img;
            // $ds = DIRECTORY_SEPARATOR;
            // $img_dp = 'public'.$ds.'storage'.$ds.'avatars'.$ds;
            // $hashed_name = base64_encode($filename);
            // $img->file->move(public_path($img_dp), $fileName);
        } else {
            $ds = DIRECTORY_SEPARATOR;
            $img_dp = 'public' . $ds . 'storage' . $ds . 'avatars' . $ds . Auth::user()->avatar;
            return $img_dp;
        }
    }
}
