<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'health',
        'last_maintained',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'planted_by', 'id');
    }
}
