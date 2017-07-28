<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Shopcart;
use App\Item;

class ShopController extends Controller{
    public function index(){
        DB::select('CALL clearShopcart');
    	$carrito = Shopcart::where('user_id',Auth::User()->id)->first();
	    return view('shop.shop', ['carrito'=>$carrito]);
    }

    public function deleteItem(){ 
    	$id = request()->id;
    	$item = Item::find($id);
    	$producto = Product::find($item->product_id);
    	$producto->stock += $item->qty;
    	$producto->save();
    	$producto = Product::find($item->product_id);
    	$item->delete();
    	return "ok";
    }

    public function shipping(){
        $cart_id = 1;
        $carrito = Shopcart::find($cart_id);
        return view ('shop.shipping', compact("carrito"));
    }

    public function payment(){
        $cart_id = 1;
        $carrito = Shopcart::find($cart_id);
        return view ('shop.payment', compact("carrito"));
    }

     public function buy(){
        $cart_id = 1;
        $carrito = Shopcart::find($cart_id);
        return view ('shop.buy', compact("carrito"));
    }
}
