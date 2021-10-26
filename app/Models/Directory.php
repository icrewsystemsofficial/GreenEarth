<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Directory extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_owner',
        'business_name',
        'brand_name',
        'business_about',
        'location',
        'total_carbon_emission',
        'total_trees_in_grove',
        'total_carbon_offset',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'website_link',
        'employee_count',
        'business_founding_date',
        'business_name_slug',
        'logo',
        'organization_name'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'carbon_neutral_since' => 'datetime',
        #'business_founding_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function business_logo() {
        // if($business_id == null) {
        //     throw new \Exception('Business ID must be provided to fetch logo');
        // }

        $business = self::find($this->id);
        if(!is_null($business->logo)) {

            if(Storage::exists('public/uploads/logos/'.$business->logo)) {
                $image_link = asset(Storage::url('public/uploads/logos/'.$business->logo));
            } else {
                $image_link = asset('img/logo_placeholder.png');
            }
        } else {
            $image_link = asset('img/logo_placeholder.png');
        }

        return $image_link;
    }

    public function getUsers() {
        return $this->hasMany(User::class, 'organization', 'organization_name');
    }
}
