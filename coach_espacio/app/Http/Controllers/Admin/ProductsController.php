<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $products=Product::paginate(3);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        //crear el nuevo producto

        //guardar la foto

        //save el producto con referencia a su imagen
    }

    
   /* public function show($id)
    {
        $prod = Product::find($id);
        return view('admin.products.show', compact('prod'));
    }*/

    /*Show the form for editing the specified resource.*/
    public function edit($id)
    {
         $prod = Product::find($id);

        return view('admin.products.edit', compact('prod'));
    }

    /*Update the specified resource in storage.*/
    public function update(Request $request, $id)
    {
        //
    }

    /* Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }*/
}
