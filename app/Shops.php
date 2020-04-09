<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    public function user() {
        return $this->hasMany(User::class);
    }

    public function products() {
        return $this->hasMany(Product::class,'shop_id');
    }
}
