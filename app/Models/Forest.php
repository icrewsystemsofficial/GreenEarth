<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forest extends Model
{
    use HasFactory;
    protected $fillable = [
        'lat',
        'long',
        'name',
        'location',
        'country',
        'geojson_path',
        'area',
        'description',
        'irrigation_type',
        'soil_type',
        'user_incharge',
        'status',
    ];
}
