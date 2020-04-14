<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\shareEmail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class ProductsControler extends Controller
{
    public function show ($id) {
       $products = Product::paginate(1);
       $product = Product::where('id',$id)->firstOrFail();

        return view('pages.productCart',['product' => $product, 'products' => $products]);
    }

    public function list () {

        $products = Product::paginate(1);
        return view('pages.products',['products' => $products]);
    }

    public function AddProduct(Request $request) {
        $this->validate($request,[
            'title'=> 'required',
            'price'=> 'required',
            'discounts'=> 'nullable',
            'description'=> 'required',
            'img'=> 'required',
        ]);
        $uset = Auth::user();
        $product = Product::create($request->all());
        if ($request->file('img')) {
            $product->uploadImg($request->file('img'));
        }
        $product->user_id = $uset->id;
        $product->shop_id = $uset->shop->id;
        $product->save();
        return redirect()->back()->with('status', 'Товар успешно добавлен');
    }

    public function ajaxRemoveProduct(Request $request){
        $user = Auth::user();
        $shop = $user->shop;
        if ($shop != null ){
            $product = $shop->products->find($request->get('idProduct'));
            $productId = $product->id;
            $product->removeProduct();
            return $productId;
        }
        return 'Тут пусто';
    }

    public function productsCategory ($id) {
        $products = Category::where('id',$id)->firstOrFail()->products()->paginate(1);
        return view('pages.products',['products' => $products]);
    }

    public function ajaxComents ($id) {
        $product = Product::find($id);
        return view('ajax.AjaxComentsProduct',['product' => $product]);
    }

    public function ajaxProducts () {
        $products = Product::paginate(1);
        return view('ajax.AjaxProductsMine',['products' => $products]);
    }

    public function AjaxUserShopProducts(Request $request){
        $user = Auth::user();
        $products = $user->shop->products()->paginate(1);
        return view('ajax.AjaxUserShopProducts',['products' => $products]);
    }

    public function ajaxProductReservation(Request $request){
        $user = Auth::user();
        $shopReservation = $user->shop->shopReservation()->paginate(1);
        return view('ajax.ajaxProductReservation',['shopReservation' => $shopReservation]);
    }

    public function getAjaxPaginate(Request $request) {
        $user = Auth::user();
        $products = $user->shop->products()->paginate(1);
        return view('ajax.ajaxPaginate',['products' => $products]);
    }

    public function ajaxSetPrivileges(Request $request){
        $product = Auth::user()->shop->products->find($request->get('idProduct'));
        if ($product) {
            $product->privilege_id = $request->get('idPrivileges');
            $product->save();
            $privilegeClass = $product->privilege->class;
            return $privilegeClass;
        }
    }


    public function share(Request $request){
        $this->validate($request, [
            'email' => ['required','email'],
            'name_friend' =>'required',
            'email_friend' => ['required','email'],
        ]);

        $emailFriend = $request->get('email_friend');
        $product = Product::find($request->get('product_id'))->firstOrFail();

        Mail::to($emailFriend)->send(new shareEmail(['request' => $request->all(), 'product' => $product ]));
        return redirect()->back()->with('status', 'Вы успешно поделились продуктом');
    }

}
