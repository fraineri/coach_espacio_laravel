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
        //devolver solo los que sean purchable
        $products=Product::where('purchable', true)->orderBy('name', 'asc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories= Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {   //dd($request);
        //validate
        $this->validate($request,[
            'name'=>'required|unique:products|max:100',
            'description'=>'required|max:500',
            'price'=>'required|numeric',
            'category_id'=>'required|integer',
            'stock'=>'required|integer',
            'purchable'=>'required|boolean'
        ]);
        //store
        $prod=Product::create(request(['name','description','price', 'category_id','stock','purchable']));
        //guardar la imagen
        $nombre= str_slug($prod->name) . '.' .request()->picture->extension();
        request()->picture->storeAs('/products/', $nombre);
        //asociar la imagen con el prod
        $prod->picture = $nombre;         
        $prod->save();

        //redirect
        return redirect('/admin/products/');   
    }

    /*creo q no la voy a usar*/
    public function show($id)
    {
        $prod = Product::find($id);
        return view('admin.products.edit2', compact('prod'));
    }

    /*Show the form for editing the specified resource.*/
    public function edit($id)
    {
        $prod = Product::find($id);
        $prodCat= $prod->category_id;
        $cat= Category::find($prodCat);
        $nomCat= $cat->name;
        $categories= Category::all();
        return view('admin.products.edit2', compact('prod', 'nomCat','categories'));
    }

    /*Update the specified resource in storage.*/
    public function update(Request $request, $id)
    {  //dd($request);
       //validate
      $this->validate($request,[
            'name'=>'required|max:100',
            //unique:products no me deja regrabar
            'description'=>'required|max:500',
            'price'=>'required|numeric',
            'category_id'=>'required|integer',
            'stock'=>'required|integer',
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
        request()->picture->storeAs('/products/', $nombre);
        //revisar el path de la img!!!!!
        //asociar la imagen con el prod
        $prod->picture = $nombre;         
        $prod->save();

        //redirect
        return redirect('/admin/products/');
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
        return redirect('/admin/products/');
    }
}

