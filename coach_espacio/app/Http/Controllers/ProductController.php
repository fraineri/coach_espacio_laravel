<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Shopcart;
use App\Item;

class ProductController extends Controller{
    public function index($find){
        #$prod = factory(\App\Product::class,15)->create();
        $products = Product::with('category')->where('type',$find)->where('purchable',1)->where('purchable',1)->paginate(5);
        $cat = Category::all();
        return view ('products.productos', ['products'=>$products, 'categories'=>$cat, 'id'=> false]);
    }

    public function products(){
        return $this->index("products");
    }
    public function courses(){
        return $this->index("course");
    }

    public function category($id){
    	if ($id == 1) {
        	$products = Product::all();
        } else{ 
			$products = Category::find($id)->products;
        }

    	$cat = Category::all();
    	return view ('products.productos-category', ['products'=>$products, 'categories'=>$cat,'id'=>$id]);
    }

    public function show($id, $preset = false){
        if ($preset) {
            $product = Product::find($id);
            return view ('products.producto',['product'=>$product, 'success' => $preset]);
        }else{
            $product = Product::find($id);    
            return view ('products.producto',['product'=>$product]);
        }        
    }

    public function shop($id){
        $product = Product::find($id);
        $qty = (int)request()->productqty;

        $success = "si";
        if ($product->stock < $qty) {
            $success  = "no";
        } else{
            $product->stock -= $qty;
            $product->save();
            $this->addToCart($id,$qty);
        }
        return $this->show($id,$success);
    }

    private function sendIndex($value){
        return $this->index($value);
    }

    private function addToCart($id, $qty){
        #Auth
        $cart_id = 1;

        $carrito = Shopcart::find($cart_id);
        
        $found = false;
        foreach ($carrito->items as $curr) {
            if($curr->product_id == $id){
                $found=true;
                $curr->qty += $qty;
                $curr->save();
                break;
            }
        }
        if (!$found) {
            $item = new Item();
            $item->product_id = $id;
            $item->qty = $qty;
            $item->shopcart_id = $cart_id;
            $item->save();
        }
    }

    public function rows(){
        $cart_id = 1;
        return $carrito = Shopcart::find($cart_id)->items->count();
    }
}
