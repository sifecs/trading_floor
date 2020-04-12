<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index () {
        $nodes =  Category:: all()-> toFlatTree();
        return view('pages.index', ['categories' =>$nodes ]);
    }

}
