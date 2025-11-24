<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Conversation extends Model
{
    protected $fillable = ['client_phone', 'last_message_at'];

    public function isNewConversation()
    {
        if (!$this->last_message_at) return true;
        return $this->last_message_at->isBefore(Carbon::today());
    }
}
