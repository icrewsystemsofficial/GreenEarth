<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloudProviders extends Model
{
    use HasFactory;

    protected $table = 'cloudproviders';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'url',
        'description',
        'datacenters',
        'enabled',
        'whitelisted',
        'timestamps',
    ];
}
