<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Item;

class ShopController extends Controller{
    public function index(){
    	$carrito = session('carrito');
    	$items=[];
    	if(count($carrito)){
	    	foreach ($carrito as $compra) {
	    		$product = Product::find($compra['id']);
	    		$item = new Item($product, $compra['qty']);
	    		$items[] = $item;
	    	}
	    }
    	return view('shop.shop', compact('items'));
    }
}
