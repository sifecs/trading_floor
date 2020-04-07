<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsControler extends Controller
{
    public function index ($id) {

       $products = Product::paginate(15);
//       dd($products);
       $product = Product::find($id);
//       dd($product->getPrice('1000', '10'));
        return view('pages.productCart',['product' => $product, 'products' => $products]);
    }
}
