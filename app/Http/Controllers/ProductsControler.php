<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductsControler extends Controller
{
    public function show ($id) {
       $products = Product::paginate(1);
       $product = Product::find($id);

        return view('pages.productCart',['product' => $product, 'products' => $products]);
    }

    public function list () {

        $products = Product::paginate(1);
        return view('pages.products',['products' => $products]);
    }

    public function listCategory ($id) {
        $products = Category::find($id)->products()->paginate(1);
        return view('pages.products',['products' => $products]);
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
