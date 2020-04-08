<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsControler extends Controller
{
    public function index ($id) {
       $products = Product::paginate(1);
       $product = Product::find($id);

        return view('pages.productCart',['product' => $product, 'products' => $products]);
    }

    public function ajaxComents ($id) {
        $product = Product::find($id);
        return view('ajax.AjaxComentsProduct',['product' => $product]);
    }

    public function ajaxProducts () {
        $products = Product::paginate(1);
        return view('ajax.AjaxProductsMine',['products' => $products]);
    }
}
