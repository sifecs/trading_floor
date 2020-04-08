<?php

use App\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/createCategory', 'HomeController@createCategory');

Route::get('/product/{id}', 'ProductsControler@show')->name('product.show');
Route::get('/products', 'ProductsControler@list')->name('products.list');
Route::get('/products/category/{id}', 'ProductsControler@listCategory')->name('category.list');
Route::post('/coment', 'ComentsControler@store');


Route::group(['prefix'=>'ajax'], function (){
    Route::get('Coments/{id}', 'ProductsControler@ajaxComents');
    Route::get('Products', 'ProductsControler@ajaxProducts');
});

//
//Route::get('/ajax/Coments',function () {
//    $products = Product::paginate('2')->render();
//    return view::make('index')->with('coments')->render();
//});

//Route::group(['middleware' =>'auth'], function (){
//    Route::get('/loguot', 'AuthControler@loguot');
//    Route::get('/profile', 'profileController@index');
//    Route::post('/profile', 'profileController@store');
//});
//
//Route::group(['middleware' =>'guest'], function (){
//    Route::get('/register', 'AuthControler@registrForm');
//    Route::post('/register', 'AuthControler@register');
//    Route::get('/login', 'AuthControler@loginForm')->name('login');
//    Route::post('/login', 'AuthControler@login');
//});
//
Route::group(['prefix'=>'admin','namespace'=>'Admin'], function (){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/currencies', 'CurrenciesController');
    Route::resource('/users', 'UsersController');
    Route::resource('/finance', 'FinanceController');
});

