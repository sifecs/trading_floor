<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $fillable = [
        'user_id', 'shop_id', 'product_id'
    ];
    protected $table = 'reservation';
}
