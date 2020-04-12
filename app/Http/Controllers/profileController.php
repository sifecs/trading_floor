<?php

namespace App\Http\Controllers;

use App\Category;
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
            return view('pages.profile',['user'=>$user, 'products' => $products, 'categories' => $nodes ]);
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
