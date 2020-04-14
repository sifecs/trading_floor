<?php

namespace App;

use Guzzle\Http\Message\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'title', 'price', 'discounts','description', 'category_id',
    ];

    public function privilege(){
        return $this->belongsTo(privilege::class);
    }

    public function reservation() {
        return $this->belongsToMany(
            User::class,
            'reservation',
            'product_id',
            'user_id'
        );
    }

    public function comments () {
        return $this->hasMany(coments::class,'product_id');
    }

    public function author () {
        return $this->belongsTo(User::class,'user_id');
    }

    public function shop () {
        return $this->belongsTo(Shops::class,'shop_id');
    }

    public  function uploadImg ($image) {
        $this->removeImages();
        $names = [];
        if ($image == null){ return; }
        foreach ($image as $img) {
            $filename = Str::random(30). '.' . $img->extension();
            $img->storeAs('uploads',$filename);
            array_push($names, $filename);
        }
        $this->img = implode(',', $names );
        $this->save();
    }

    public function removeImages() {
        if ($this->img !=null) {
            Storage::delete('uploads/' . $this->img);
            $this->img = null;
            $this->save();
        }
    }


    public function getImages() {
        if ($this->img == null) {
            return ['/uploads/no-product-image.png'];
        }
        $imgArr = explode(',' , $this->img);
        $images = [];
        foreach ($imgArr as $img) {
            array_push($images,'/uploads/'.$img);
        }
        return $images;
    }

    public function getPrice($price, $percent) {
        return $price - ($price * ($percent / 100));
    }

    public function getComments() {
        return $this->comments()->paginate(4);
    }

    public function removeProduct (){
        $coments = $this->comments()->get();
        foreach ($this->reservation as $reservation) {
            $reservation->pivot->delete();
        }
        foreach ($coments as $coment) {
           $coment->delete();
        }
        $this->removeImages();
        return $this->delete();
    }

    public function getReservationUser($id){
        return User::find($id);
    }


}
