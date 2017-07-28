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
Route::get('/camisetaverde', function(){
	return view('/admin/categories/admin');
});
Route::post('/admin/login', 'Admin\AdminController@login');
Route::get ('/admin/products', 'Admin\ProductsController@index');
Route::get('/admin/products/create','Admin\ProductsController@create');
Route::post('/admin/products/create','Admin\ProductsController@store');
Route::get('/admin/products/{id}/update','Admin\ProductsController@edit');
Route::post('/admin/products/{id}/update','Admin\ProductsController@update');
Route::get('/admin/products/zombies', 'Admin\ProductsController@zombies');

Route::get ('/admin/categories', 'Admin\CategoriesController@index');
Route::get('/admin/categories/create','Admin\CategoriesController@create');
Route::post('/admin/categories/create','Admin\CategoriesController@store');
Route::get('/admin/categories/{id}/update','Admin\CategoriesController@edit');
Route::post('/admin/categories/{id}/update','Admin\CategoriesController@update');
Route::get('/admin/categories/zombies', 'Admin\CategoriesController@zombies');

/*Productos*/
Route::get('productos/', 'ProductController@products')->middleware('auth');
Route::get('cursos/', 'ProductController@courses')->middleware('auth');

Route::get('categoria/{cat}', 'ProductController@category')->middleware('auth');
Route::get('producto/{id}', 'ProductController@show')->middleware('auth');
Route::post('producto/{id}', 'ProductController@shop');

/*Shop cart*/
Route::get('shop/', 'ShopController@index')->middleware('auth');
Route::post('shop/delete', 'ShopController@deleteItem')->middleware('auth');
Route::get('shop/shipping','ShopController@shipping')->middleware('auth');
Route::get('shop/payment','ShopController@payment')->middleware('auth');
Route::get('shop/buy','ShopController@buy')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
