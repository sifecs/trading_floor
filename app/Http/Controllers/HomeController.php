<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index () {
//        Category::add(['title'=>'одежда3 дочерняя3']);
        $nodes =  Category:: all()-> toFlatTree();
        return view('pages.index', ['categories' =>$nodes ]);
    }

    function createCategory() {
        dd('2');
    }
}
