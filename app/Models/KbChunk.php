<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KbChunk extends Model
{
    protected $fillable = [
        'kb_document_id',
        'chunk_text',
    ];
}
