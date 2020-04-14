<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class searchControler extends Controller
{
    public function result(Request $request) {
      $products = Product::where('title', 'LIKE', '%' . $request->get('textSearch') . '%')->paginate(1);
      return view('pages.searchResult',['products' => $products]);
    }

    public function resultAjax(Request $request) {
        $products = Product::where('title', 'LIKE', '%' . $request->get('textSearch') . '%')->paginate(1);
        return view('ajax.searchResult',['products' => $products]);
    }
}
