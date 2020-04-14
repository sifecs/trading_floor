<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    protected $fillable = ['title','_lft', '_rgt', 'parent_id'];

    public function products() {
        return $this->hasMany(Product::class);
    }

    static  function add ($fields) {

    }

    public function getSubcategory($id){
       $category= Category::find($id)->children()->get();
       return $category;
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

    use NodeTrait;
}
