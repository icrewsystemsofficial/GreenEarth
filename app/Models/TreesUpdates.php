<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreesUpdates extends Model
{
    use HasFactory;

    protected $fillable = [
        'tree_id',
        'remarks',
        'health',
        'image_path',
        'updated_by',
    ];
}
