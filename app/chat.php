<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $fillable = [
        'user_id', 'messageToUser_id', 'text', 'phone'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
