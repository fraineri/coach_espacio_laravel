<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller{

    public function index($id=false){
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

    public function show($id){
        $product = Product::find($id);
        return view ('products.producto',compact("product"));
    }
}
