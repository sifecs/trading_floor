<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    protected $fillable = ['title','_lft', '_rgt', 'parent_id'];
    static  function add ($fields) {
        dd($fields);
        $a = Category::find('14');
        Category::create($fields,$a);
//        $category = new static;
//        $category->fill($fields);
//        $category->save();

//        return $category;
    }
    public function getSubcategory($id){
       $category= Category::find($id)->children()->get();
       return $category;
    }
    use NodeTrait;
}
