<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Shopcart;
use App\Item;

class ProductController extends Controller{
    private $pagination = 8;
    public function index($find){
        //$prod = factory(\App\Product::class,15)->create();
        $products = Product::with('category')->where('type',$find)->where('purchable',1)->paginate($this->pagination);
        $cat = Category::all();
        return view ('products.productos', ['products'=>$products, 'categories'=>$cat, 'currCat'=> false]);
    }

    public function products(){
        return $this->index("products");
    }
    public function courses(){
        return $this->index("course");
    }

    public function category($id){
        $currCat = Category::find($id);

    	if ($currCat->name == "Todos") {
        	$products = Product::paginate($this->pagination);
        } else{
			$products = Product::where('category_id',$id)->paginate($this->pagination);
        }

    	$cat = Category::all();
    	return view ('products.productos-category', ['products'=>$products, 'categories'=>$cat,'currCat'=>$currCat]);
    }

    public function show($id){
        $product = Product::find($id);    
        return view ('products.producto',['product'=>$product]);
    }

    public function shop(){
        $id = request()->id;
        $qty = request()->qty;
        $product = Product::find($id);
    
        $success = ["success"=>true];
        if ($product->type == "course") {
            $qty = 1;
            $this->addToCart($id,$qty);
        }else{
            if ($product->stock < $qty) {
                $success  = ["success"=>false];
            } else{
                $product->stock -= $qty;
                $product->save();
                $this->addToCart($id,$qty);
            }
        }      
        return json_encode($success);
    }

    private function addToCart($id, $qty){
        $carrito = Shopcart::where('user_id',Auth::User()->id)->first();
        if (!count($carrito)) {
            $carrito = new shopCart();
            $carrito->user_id = Auth::User()->id;
            $carrito->save();
            $carrito = Shopcart::where('user_id',Auth::User()->id)->first();
        }

        $found = false;
        foreach ($carrito->items as $curr) {
            if($curr->product_id == $id){
                $found=true;
                if ($curr->product->type != "course") {
                    $curr->qty += $qty;
                    $curr->save();
                }
                break;
            }
        }

        if (!$found) {
            //session aca!
            $item = new Item();
            $item->product_id = $id;
            $item->qty = $qty;
            $item->shopcart_id = $carrito->id;
            $item->save();
        }
    }

    public function rows(){
        return $carrito = Shopcart::where('user_id',Auth::User()->id)->items->count();
    }

    private function sendIndex($value){
        return $this->index($value);
    }
}
