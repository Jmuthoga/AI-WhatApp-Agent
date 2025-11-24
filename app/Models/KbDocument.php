<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KbDocument extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'url',
        'content',
    ];
}
