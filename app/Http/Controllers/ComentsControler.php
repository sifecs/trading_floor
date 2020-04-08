<?php

namespace App\Http\Controllers;

use App\coments;
use Illuminate\Http\Request;

class ComentsControler extends Controller
{
    public function store (Request $request) {
        $this->validate($request,[
            'text'=> 'required',
            'product_id'=> 'required|numeric',
        ]);

        $all = $request->all();
        $all['user_id'] = '1';
        coments::create($all);
    }
}
