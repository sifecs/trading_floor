<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsControler extends Controller
{
    public function index ($id) {
//        Product::find($id);
        return view('pages.productCart');
    }
}
