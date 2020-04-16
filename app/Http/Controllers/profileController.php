<?php

namespace App\Http\Controllers;

use App\Category;
use App\chat;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class profileController extends Controller
{
    public function index () {
        $nodes =  Category:: all()-> toFlatTree();
        $user = Auth::user();
        $messageToUser = $user->messageToUser->groupBy('user_id');

        if ($user->shop != null) {
            $products = $user->shop->products()->paginate(1);
            $shopReservation = $user->shop->shopReservation()->paginate(1);
            return view('pages.profile',['user'=>$user, 'products' => $products, 'categories' => $nodes,
                'shopReservation' => $shopReservation, 'messageToUser' => $messageToUser]);
        }
        return view('pages.profile',['user'=>$user, 'categories' => $nodes,
        ]);
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
