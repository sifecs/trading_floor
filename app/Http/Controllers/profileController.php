<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class profileController extends Controller
{
    public function index () {
        $user = Auth::user();
//        dd($user->shop);
        return view('pages.profile',['user'=>$user]);
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
