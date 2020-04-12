<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coments extends Model
{
    protected $fillable = ['text','product_id'];

    public function comment () {
        return $this->belongsTo(products::class);
    }

    public function author () {
        return $this->belongsTo (User::class, 'user_id');
    }

}
