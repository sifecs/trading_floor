<?php

namespace App\Http\Controllers;

use App\coments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentsControler extends Controller
{
    public function store (Request $request) {
        $this->validate($request,[
            'text'=> 'required',
            'product_id'=> 'required|numeric',
        ]);

       $coments = coments::create($request->all());
       $coments->user_id = Auth::user()->id;
       $coments->date = date('d-m-Y');
       $coments->save();
    }
}
