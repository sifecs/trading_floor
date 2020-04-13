<?php

namespace App\Http\Controllers;

use App\Product;
use App\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reservationCantroler extends Controller
{
    public function addReservation(Request $request) {
        $userId = Auth::user()->id;
        $product = Product::find( $request->get('id_product') );
        $productId = $product->id;
        $shopId = $product->shop->id;

        $checkDuplicate = Reservation::where([
            ['user_id', '=', $userId],
            ['product_id', '=', $productId],
            ['shop_id', '=', $shopId]
        ]);

        if ($checkDuplicate->exists() ){
            return 'Есть тако элемент';
        } else {
            $data = ['user_id' => $userId, 'product_id' => $productId, 'shop_id' => $shopId];
            $reservation = reservation::create($data);

            return $reservation;
        }

    }

    public function ajaxCancellationReservation(Request $request) {
       $reservation = Reservation::where([
            ['user_id', '=', $request->get('idUser')],
            ['product_id', '=', $request->get('idProduct')],
        ])->first();
       $productId = $reservation->product_id;
       $reservation->delete();
       //тут должен быть код уведомления пользователя о удаление его броне продавцом но мне лень делать простите
       return $productId;
    }
}
