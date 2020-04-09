<?php

namespace App\Http\Controllers;

use App\Shops;
use Illuminate\Http\Request;

class shopsControler extends Controller
{
    public function list () {
        $shops = Shops::paginate(1);
        return view('pages.shops',['shops' => $shops]);
    }

    public function shop ($id) {
        $shop = Shops::find($id);
        $products = $shop->products()->paginate(1);
        return view('pages.shop',['shop' => $shop, 'products' => $products]);
    }

}
