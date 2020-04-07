<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsControler extends Controller
{
    public function index ($id) {

       $products = Product::paginate(15);
       $product = Product::find($id);
//       $user = $product->author->name;
//       dd($product->author->name);

        return view('pages.productCart',['product' => $product, 'products' => $products]);
    }
}
