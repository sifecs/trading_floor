<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Shops extends Model
{
    protected $fillable = [
        'name', 'description', 'address'
    ];

    public function privilege(){
        return $this->belongsTo(privilege::class);
    }

    public function shopReservation() {
        return $this->belongsToMany(
            Product::class,
            'reservation',
            'shop_id',
            'product_id'
        )->withPivot('user_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->hasMany(Product::class,'shop_id');
    }

    public  function edit ($fields) {
        $this->fill($fields);
        $this->save();
    }

    public  function uploadImg ($image) {
        if ($image == null){ return; }

        $this->removeImages();

        $filename = Str::random(30). '.' . $image->extension();
        $image->storeAs('uploads',$filename);

        $this->img = $filename;
        $this->save();
    }

    public function removeImages() {
        if ($this->img !=null) {
            Storage::delete('uploads/' . $this->img);
        }
    }

    public function getImage() {
        if ($this->img == null) {
            return 'uploads/no-shop-image.png';
        }
        return 'uploads/'. $this->img;
    }
}
