<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller{
    private $carrito;
    public function index(){
        #$prod = factory(\App\Product::class,15)->create();
        $products = Product::with('category')->get();
        $cat = Category::all();
        return view ('products.productos', ['products'=>$products, 'categories'=>$cat, 'id'=> false]);
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
        $qty =  (int)request()->productqty;
        $success = true;
        if ($product->stock < $qty) {
            $success  = false;
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

    private function addToCart($id,$qty){
        $carrito = session('carrito');
            
        $found = false;
        $i = 0; 
        while ($i < count($carrito) && !$found) {
            $curr=$carrito[$i];
            if ($curr['id'] == $id) {
                $found = true;
            }else{
                $i++;                
            }
        }
        if($found){
            $carrito[$i]['qty'] += $qty;
        }else{
            $carrito[] = ['id' => $id, 'qty' => $qty];
        }
        session(["carrito" => $carrito]);
    }
}
