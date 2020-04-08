<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
    use NodeTrait;
}
