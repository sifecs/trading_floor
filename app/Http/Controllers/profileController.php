<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class profileController extends Controller
{
    public function index () {
        $nodes =  Category:: all()-> toFlatTree();
        $user = Auth::user();
        if ($user->shop != null) {
            $products = $user->shop->products()->paginate(1);
            $shopReservation = $user->shop->shopReservation()->paginate(1);


//            dd($user->shop->products->find(1)->reservation); // этот продукт в избаранов у n - пользователям

            //dd($user->shop->shopReservation); //список всех избраных товаров данного магазина

//            dd($user->shop->shopReservation->find(1)->reservation);

            return view('pages.profile',['user'=>$user, 'products' => $products, 'categories' => $nodes, 'shopReservation' => $shopReservation]);
        }
        return view('pages.profile',['user'=>$user, 'categories' => $nodes ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' =>'required',
            'email' => ['required','email',Rule::unique('users')->ignore(Auth::user()->id),],
        ]);
        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        return response($user);
    }
}
