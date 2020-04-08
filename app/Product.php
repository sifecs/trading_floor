<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function comments () {
        return $this->hasMany(coments::class,'product_id');
    }
    public function author () {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getImages() {
        if ($this->img == null) {
            return '/img/no-image.png';
        }
       $imgArr = explode(',' , $this->img);
        return $imgArr;
    }

    public function getPrice($price, $percent) {
        return $price - ($price * ($percent / 100));
    }

    public function getComments() {

        return $this->comments()->paginate(4);
    }


}
