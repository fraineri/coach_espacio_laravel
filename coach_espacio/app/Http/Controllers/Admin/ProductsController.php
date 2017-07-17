<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function index()
    {   //$products=Product::all();
        $products=Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        //validate
        $this->validate($request,[
            'name'=>'required|unique:products|max:191',
            'description'=>'required|max:500',
            'price'=>'required|numeric',
            'category_id'=>'required|integer',
            'stock'=>'required|integer',
            'picture'=>'required|max:191',
            'purchable'=>'required|boolean'
        ]);
        //store
        $prod=Product::create(request(['name','description','price', 'category_id','stock','picture','purchable']));
        //guardar la imagen
        $nombre= str_slug($prod->name) . '.' .request()->picture->extension();
        request()->picture->storeAs('products', $nombre);
        //asociar la imagen con el prod
        $prod->picture = $nombre;         
        $prod->save();

        //redirect
        return redirect('admin.products.index');   //view (‘/admin/products’)
    }

    /*creo q no la voy a usar*/
    public function show($id)
    {
        $prod = Product::find($id);
        return view('admin.products.show', compact('prod'));
    }

    /*Show the form for editing the specified resource.*/
    public function edit($id)
    {
        $prod = Product::find($id);
        return view('admin.products.edit', compact('prod'));
    }

    /*Update the specified resource in storage.*/
    public function update(Request $request, $id)
    {
        //validate
        $this->validate($request,[
            'name'=>'required|unique:products|max:191',
            'description'=>'required|max:500',
            'price'=>'required|numeric',
            'category_id'=>'required|integer',
            'stock'=>'required|integer',
            'picture'=>'required|max:191',
            'purchable'=>'required|boolean'
        ]);
        //recuperar el producto de la DB
        $prod= Product::find($id);
        //save
        $prod->name = $request->name;
        $prod->description = $request->description;
        $prod->price = $request->price;
        $prod->category_id = $request->category_id;
        $prod->stock = $request->stock;
        $prod->purchable = $request->purchable;
         //guardar la imagen
        $nombre= str_slug($prod->name) . '.' .request()->picture->extension();
        request()->picture->storeAs('products', $nombre);
        //asociar la imagen con el prod
        $prod->picture = $nombre;         
        $prod->save();

        //redirect
        return redirect('admin.products.index');
    }

    /* Remove the specified resource from storage.*/
    public function destroy($id)
    {   //recuperar el producto de la DB
        $prod= Product::find($id);
        //cambiar el estado del boolean
        $prod->purchable = false;
        //save
        $prod->save();
        //redirect
        return redirect('admin.products.index');
    }
}
