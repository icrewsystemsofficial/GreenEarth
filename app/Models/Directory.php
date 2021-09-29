<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
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
}
