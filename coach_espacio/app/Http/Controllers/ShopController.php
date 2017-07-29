<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Shopcart;
use App\Item;
use App\Sale;
use App\Saledetail;

class ShopController extends Controller{
    public function index(){
        //DB::select('CALL clearShopcart');
    	$carrito = Shopcart::where('user_id',Auth::User()->id)->first();
	    return view('shop.shop', ['carrito' => $carrito]);
    }

    public function sendShip(){
        return redirect()->action('ShopController@shipping');
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
        $carrito = Shopcart::where('user_id',Auth::User()->id)->first();
        return view ('shop.shipping', compact("carrito"));
    }

    public function saveShip(){
        $sale = Sale::where('user_id', Auth::user()->id)->orderBy('id','desc')->first();
        if(!$sale || $sale->status != 'pending'){
            $sale = new Sale();
        }
        $sale->user_id = Auth::user()->id;
        $sale->status = 'pending';
        $sale->name = request()->name;
        $sale->surname = request()->surname;
        $sale->address = request()->address;
        $sale->city = request()->city;
        $sale->province = request()->province;
        $sale->cp = request()->cp;
        $sale->phone = request()->phone;
        $sale->save();
        return redirect()->action('ShopController@payment');
    }

    public function payment(){
        $carrito = Shopcart::where('user_id',Auth::User()->id)->first();
        return view ('shop.payment', compact("carrito"));
    }

    public function savePay(){
        $expire = (request()->card_month);
        if (strlen ($expire) == 1) {
            $expire = '0'.$expire;
        } 
        $expire .= '-'.request()->card_year;
        $sale = Sale::where('user_id', Auth::user()->id)->orderBy('id','desc')->first();
        $sale->card_name = request()->card_name; 
        $sale->card_number = request()->card_number;
        $sale->card_code = request()->card_code;
        $sale->card_expire = $expire;
        $sale->save();
        return redirect()->action('ShopController@buy');
    }

     public function buy(){
        $resume = Sale::where('user_id', Auth::user()->id)->orderBy('id','desc')->first();
        $carrito = Shopcart::where('user_id',Auth::User()->id)->first();
        return view ('shop.buy',['carrito'=> $carrito, 'resume'=> $resume]);
    }

    public function finish(){
        $order = Sale::where('user_id', Auth::user()->id)->orderBy('id','desc')->first();
        $carrito = Shopcart::where('user_id',Auth::User()->id)->first();

        $order->total = $carrito->getTotal();
        foreach ($carrito->items as $item) {
            $prod = new Saledetail();
            $prod->sale_id = $order->id;
            $prod->product_id = $item->product_id;
            $prod->qty = $item->qty;
            $prod->price_unit = $item->product->price;
            $prod->save();
            $item->delete();
        }
        $carrito->delete();
        $order->status = 'finished';
        $order->save();
        return redirect()->action('ShopController@success');
    }

    public function success(){
        return view('shop.compra-finalizada');
    }

    public function historic(){
        $historic = Sale::where('user_id', Auth::user()->id)->where('status','finished')->get();
        return view ('shop.historic', compact("historic"));
    }
}
