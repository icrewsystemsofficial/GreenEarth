<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloudProviders extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'cloudproviders';

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
