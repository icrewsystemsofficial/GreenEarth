<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'certificate_uuid',
        'business_id',
        'storage_path',
        'valid_till',
        'created_at',
        'updated_at',
    ];
}
