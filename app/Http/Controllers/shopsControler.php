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

    public function addShop(Request $request) {
        $this->validate($request,[
            'name'=> 'required',
            'address'=> 'required',
            'description'=> 'required',
            'img'=> 'required|image',
        ]);
        $shop = Shops::create($request->all());
        $shop->user_id = Auth::user()->id;
        $shop->uploadImg($request->file('img'));
        $shop->save();
        return redirect()->back()->with('status', 'Ваш магазин успешно создан');
    }

    public function ajaxRedactShopDescription (Request $request) {
        $shop = Auth::user()->shop;

        $shop->description = $request->get('data-redact-description');
        $shop->save();
        return $shop;
    }

    public function ajaxUpdateImg(Request $request) {
        $shop = Auth::user()->shop;
        $shop->uploadImg($request->file('img'));
        return $shop->getImage();
    }

    public function removeImg () {
        $shop = Auth::user()->shop;
        $shop->removeImages();
        $shop->img = '';
        $shop->save();
        return $shop->getImage();
    }

    public function removeShop(Request $request) {
        $shop = Auth::user()->shop;
        $shop->removeImages();
        $shop->delete();
        return redirect()->back()->with('status', 'Ваш магазин успешно удалён');
    }

}
