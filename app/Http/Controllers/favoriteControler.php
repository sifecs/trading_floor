<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class favoriteControler extends Controller
{
    public function list() {
       $favorites = Auth::user()->favorites()->paginate(1);
        return view('pages.favorites',['favorites' => $favorites]);
    }

    public function ajaxProductsFavorite(){
        $favorites = Auth::user()->favorites()->paginate(1);
        return view('ajax.productsFavorites',['favorites' => $favorites]);
    }

    public function ajaxAddFavorite(Request $request) {
        $this->validate($request, [
            'id_product' => 'Numeric'
        ]);

        $data = ['product_id' => $request->get('id_product'), 'user_id' => Auth::user()->id ];

        Favorite::create($data);

        return $data;
    }

    public function ajaxRemoveFavorite(Request $request) {
        $this->validate($request, [
            'idProduct' => 'Numeric'
        ]);
        $favorite = Favorite::where([
            ['user_id', '=', Auth::user()->id],
            ['product_id', '=', $request->get('idProduct')]
        ])->first();

        $favoriteId = $favorite->product_id;
        $favorite->delete();
        return $favoriteId ;
    }

}
