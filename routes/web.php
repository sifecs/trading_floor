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
Route::get('/product/{id}', 'ProductsControler@show')->name('product.show');
Route::get('/products', 'ProductsControler@list')->name('products.list');
Route::get('/shops', 'shopsControler@list')->name('shops.list');
Route::get('/shop/{id}', 'shopsControler@shop')->name('shop');
Route::get('/products/category/{id}', 'ProductsControler@productsCategory')->name('category.list');



Route::post('/share', 'ProductsControler@share');


Route::group(['prefix'=>'ajax'], function (){
    Route::get('Products', 'ProductsControler@ajaxProducts');
    Route::get('paginate', 'ProductsControler@getAjaxPaginate');
    Route::get('Coments/{id}', 'ProductsControler@ajaxComents');
    Route::group(['middleware' =>'auth'], function (){
        Route::get('userShopProducts', 'ProductsControler@AjaxUserShopProducts');
        Route::get('productReservation', 'ProductsControler@ajaxProductReservation');
        Route::post('removeProduct', 'ProductsControler@ajaxRemoveProduct');
        Route::post('setPrivileges', 'ProductsControler@ajaxSetPrivileges');
        Route::post('redactShopDescription', 'shopsControler@ajaxRedactShopDescription');
        Route::post('shopSetPrivileges', 'shopsControler@shopSetPrivileges');
        Route::post('removeImg', 'shopsControler@removeImg');
        Route::post('UpdateImg', 'shopsControler@ajaxUpdateImg');
        Route::post('addReservation', 'reservationCantroler@addReservation');
        Route::post('cancellationReservation', 'reservationCantroler@ajaxCancellationReservation');
        Route::get('ProductsFavorite', 'favoriteControler@ajaxProductsFavorite');
        Route::Post('favoriteAdd', 'favoriteControler@ajaxAddFavorite');
        Route::Post('favoriteRemove', 'favoriteControler@ajaxRemoveFavorite');
    });

});

Route::group(['middleware' =>'guest'], function (){
    Route::get('/register', 'AuthControler@registrForm')->name('register');
    Route::post('/register', 'AuthControler@register');
    Route::get('/login', 'AuthControler@loginForm')->name('login');
    Route::post('/login', 'AuthControler@login');
});

Route::group(['middleware' =>'auth'], function (){
    Route::get('/loguot', 'AuthControler@loguot')->name('loguot');
    Route::get('/profile', 'profileController@index')->name('profile');
    Route::post('/profile', 'profileController@store');
    Route::post('/addShop', 'shopsControler@addShop');
    Route::delete('/removeShop', 'shopsControler@removeShop');
    Route::post('/coment', 'ComentsControler@store');
    Route::post('/addProduct', 'ProductsControler@AddProduct');

    Route::get('/favorites', 'favoriteControler@list')->name('favorite.list');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin'], function (){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/currencies', 'CurrenciesController');
    Route::resource('/users', 'UsersController');
    Route::resource('/finance', 'FinanceController');
});

