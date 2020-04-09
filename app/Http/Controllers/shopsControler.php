<?php

namespace App\Http\Controllers;

use App\Shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function ajaxRedactShopDescription (Request $request) {
        $shop = Auth::user()->shop;
        $shop->description = $request->get('data-redact-description');
        $shop->save();
        return $shop;
    }

}
