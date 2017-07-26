<?php

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

Route::get('/', function () {
    return view('/static/home');
});

Route::get('/contact', function () {
    return view('/static/contact');
});

Route::get('/faq', function () {
    return view('/static/faq');
});

Route::get('/tienda', function () {
    return view('/static/tienda');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/recuperar', function(){
	return view('/password/user');
});

Route::get('user-profile', function (){
	$activePage = 'user-profile';
	return view('auth/user-profile', compact('activePage'));
})->middleware('auth');
//Route::post('/user-profile','UserController@update');

/*Admin products & categories*/
Route::get ('/admin/products', 'Admin\ProductsController@index');
//Route::get('/admin/products/{id}', 'Admin\ProductsController@show');
Route::get('/admin/products/create','Admin\ProductsController@create');
Route::post('/admin/products/create','Admin\ProductsController@store');
Route::get('/admin/products/{id}/update','Admin\ProductsController@edit');
Route::post('/admin/products/{id}/update','Admin\ProductsController@update');
//Route::post('/admin/products/destroy', 'Admin\ProductsController@destroy');

Route::get ('/admin/categories', 'Admin\CategoriesController@index');
Route::get('/admin/categories/create','Admin\CategoriesController@create');
Route::post('/admin/categories/create','Admin\CategoriesController@store');
Route::get('/admin/categories/{id}/update','Admin\CategoriesController@edit');
Route::post('/admin/categories/{id}/update','Admin\CategoriesController@update');
Route::post('/admin/categories/destroy', 'Admin\CategoriesController@destroy');

/*Productos*/
Route::get('productos/', 'ProductController@products');
Route::get('cursos/', 'ProductController@courses');

Route::get('categoria/{cat}', 'ProductController@category');
Route::get('producto/{id}', 'ProductController@show');
Route::post('producto/{id}', 'ProductController@shop');

/*Shop cart*/
Route::get('shop/', 'ShopController@index');
Route::post('shop/delete', 'ShopController@deleteItem');
Route::get('shop/shipping','ShopController@shipping');
Route::get('shop/payment','ShopController@payment');
Route::get('shop/buy','ShopController@buy');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
