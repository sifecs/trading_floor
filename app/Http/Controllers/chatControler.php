<?php

namespace App\Http\Controllers;

use App\chat;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chatControler extends Controller
{
    public function chat(Request $request) {

        $authUser = Auth::user()->id ?? 'null';
        $user = Product::find($request->get('product_id'))->author->id;
        $text = $request->get('text');
        $phone = $request->get('phone') ?? Auth::user()->phone;
        $data = ['user_id' => $authUser, 'messageToUser_id' => $user, 'text' => $text, 'phone' => $phone];
        chat::create($data);
        return redirect()->back()->with('status', 'Вы отправили сообщение');
    }

    public function ajaxRemoveMessage(Request $request){

        $chat = chat::find($request->get('idMessage'));
        $te = [];
        if ($chat->user_id != 'null') {
            $user = User::find($chat->user_id)->message;
            foreach ($user as $a) {
                $a->delete();
            }
        } else{
            $chat->delete();
        }


        return $request->get('idMessage');
    }
}
