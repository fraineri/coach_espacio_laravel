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

Route::get('/', 'staticController@home');

Route::get('/contact', 'staticController@contact');

Route::post('/contact/send', 'ContactController@send');

Route::get('/faq', 'staticController@faq');

Route::get('/tienda', 'staticController@tienda');

Route::get('/login', 'staticController@login');

Route::get('/register', 'staticController@register');

Route::get('/recuperar', 'staticController@recuperar');

Route::get('/countUsers', 'staticController@countUsers');


/*
Route::get('user-profile', function (){
	$activePage = 'user-profile';
	return view('auth/user-profile', compact('activePage'));
})->middleware('auth');
*/
//Route::post('/user-profile','UserController@update');

Route::get('/user/edit', 'UserController@edit');
Route::post('/user/update', 'UserController@update');


/*Admin products & categories*/
Route::get ('/admin/products', 'Admin\ProductsController@index')->middleware('lulu');
Route::get('/admin/products/create','Admin\ProductsController@create')->middleware('lulu');
Route::post('/admin/products/create','Admin\ProductsController@store');
Route::get('/admin/products/{id}/update','Admin\ProductsController@edit')->middleware('lulu');
Route::post('/admin/products/{id}/update','Admin\ProductsController@update');
Route::get('/admin/products/zombies', 'Admin\ProductsController@zombies')->middleware('lulu');

Route::get ('/admin/categories', 'Admin\CategoriesController@index')->middleware('lulu');
Route::get('/admin/categories/create','Admin\CategoriesController@create')->middleware('lulu');
Route::post('/admin/categories/create','Admin\CategoriesController@store');
Route::get('/admin/categories/{id}/update','Admin\CategoriesController@edit')->middleware('lulu');
Route::post('/admin/categories/{id}/update','Admin\CategoriesController@update');
Route::get('/admin/categories/zombies', 'Admin\CategoriesController@zombies')->middleware('lulu');
/*Admin sales*/
Route::get ('/admin/sales', 'Admin\SalesController@index')->middleware('lulu');
Route::get('/admin/sales/{id}/fordeliver','Admin\SalesController@edit')->middleware('lulu');
Route::post('/admin/sales/{id}/fordeliver','Admin\SalesController@delivered');
Route::get('/admin/sales/{id}/sale','Admin\SalesController@show')->middleware('lulu');

/*Productos*/
Route::get('productos/', 'ProductController@products')->middleware('auth');
Route::get('cursos/', 'ProductController@courses')->middleware('auth');

Route::get('categoria/{cat}', 'ProductController@category')->middleware('auth');
Route::get('categoria/{cat}/buscar', 'ProductController@find');
Route::get('producto/{id}', 'ProductController@show')->middleware('auth');
Route::post('producto/{id}', 'ProductController@shop');

/*Shop cart*/
Route::get('shop/', 'ShopController@index')->middleware('auth');
Route::post('shop/', 'ShopController@sendShip');
Route::post('shop/delete', 'ShopController@deleteItem')->middleware('auth');

Route::get('shop/shipping','ShopController@shipping')->middleware('auth');
Route::post('shop/shipping', 'ShopController@saveShip');

Route::get('shop/payment','ShopController@payment')->middleware('auth');
Route::post('shop/payment', 'ShopController@savePay');

Route::get('shop/buy','ShopController@buy')->middleware('auth');
Route::post('shop/buy','ShopController@finish');

Route::get('shop/compra-finalizada', 'ShopController@success');
Route::get('shop/historic','ShopController@historic')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
