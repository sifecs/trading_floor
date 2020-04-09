<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControler extends Controller
{
    public function registrForm () {
        return view('pages.register');
    }

    public function register(Request $request) {
        $this->validate($request, [
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' =>'required'
        ]);
        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }

    public function loginForm() {
    return view('pages.login');
}

    public  function login (Request $request) {
        $this->validate($request, [
            'email' =>'required|email',
            'password' =>'required'
        ]);

        if( Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]) ){
            return redirect('/');
        }
        return redirect()->back()->with('status', 'Не правильный логин или пороль');
    }

    public function loguot() {
        Auth::logout();
        return redirect('/login');
    }
}
