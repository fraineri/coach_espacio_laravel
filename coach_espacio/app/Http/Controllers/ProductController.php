<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Shopcart;
use App\Item;

class ProductController extends Controller{
    private $pagination = 8;
    public function index($find){
        $products = Product::with('category')->where('type',$find)->where('purchable',1)->paginate($this->pagination);
        $cat = Category::where('active',1)->get();
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

        $keyword = Input::get('keyword');

        /*Si se usó el buscador*/
        if($keyword != null){
            if ($currCat->name == "Todos") {
                /*Si no hay que filtrar por categoría*/
                $products = Product::where('name', 'like', "%".$keyword."%")->paginate($this->pagination);
            } else{
                /*Hay una categoría seleccionada*/
                $products = Product::where('category_id',$id)->where('name', 'like', "%".$keyword."%")->paginate($this->pagination);
            }
        }else
            /*No se usó el buscador*/ 
            if ($currCat->name == "Todos") {
                /*Sin filtrar por categóría*/
            	$products = Product::paginate($this->pagination);
            } else{
                /*Categoría seleccionada*/
    			$products = Product::where('category_id',$id)->paginate($this->pagination);
            }

    	$cat = Category::where('active',1)->get();
    	return view ('products.productos-category', ['products'=>$products, 'categories'=>$cat,'currCat'=>$currCat]);
    }

    public function show($id){
        $product = Product::find($id);    
        return view ('products.producto',['product'=>$product]);
    }

    public function find(){
        $keyword = Input::get('keyword');
        //$products = Product::with('category')->where('type',$find)->where('purchable',1)->where('name', 'like', "%".$keyword."%")->paginate($this->pagination);

        return $this->index("products",$keyword);
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
