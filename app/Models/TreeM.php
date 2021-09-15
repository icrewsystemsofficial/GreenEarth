<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeM extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'tree_id',
        'description',
        'health',
        'suggestions',
    ];

    //public $timestamps = ["created_at"]; //only want to use created_at column
    //const UPDATED_AT = null; //and updated by default null set
}
