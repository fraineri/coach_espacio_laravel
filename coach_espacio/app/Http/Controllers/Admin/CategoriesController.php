<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class CategoriesController extends Controller
{
    /*Display a listing of the resource.*/
    public function index()
    {
        $categories = Category::where('active', true)->orderBy('name', 'asc')->paginate(5);
        return view('admin/categories/index-cat', compact('categories'));
    }

    /*Show the form for creating a new resource.*/
    public function create()
    {
         return view('admin.categories.create-cat');
    }

    /*Store a newly created resource in storage.*/
    public function store(Request $request)
    {   $file=Request()->file('picture');
        //validate
        $this->validate($request,[
            'name'=>'required|unique:products|max:100',
            'description'=>'required|max:500'
            //'picture'=>'required|max:191'
        ]);
        //store
        $cat=Category::create(request(['name','description', 'active','picture']));
        //guardar la imagen
        $nombre= str_slug($cat->name) . '.' .request()->file('picture')->extension();
        $file->storeAs('/public/categories/', $nombre);
        //asociar la imagen con la categoria
        $cat->picture = $nombre;         
        $cat->save();
        //redirect
        return redirect('admin/categories/');   
    }

    /*Show the form for editing the specified resource.*/
    public function edit($id)
    {
        $cat = Category::find($id);
        return view('admin.categories.edit-cat', compact('cat'));
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, $id)
    {    $file=Request()->file('picture');
       // dd($request,$file);
         //validate
        $this->validate($request,[
            'name'=>'required|unique:products|max:100',
            'description'=>'required|max:500',
            //'picture'=>'required|max:191'
        ]);
        //recuperar la category de la DB
        $cat= Category::find($id);
        //save
        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->active = $request->active;
        //guardar la imagen
       if($request->hasFile('picture')){
            $nombre= str_slug($cat->name) . '.' .request()->file('picture')->extension();
            $file->storeAs('/public/categories/', $nombre);
            //asociar la imagen con la categoria
            $cat->picture = $nombre; 
            }        
        $cat->save();
         //redirect
        return redirect('admin/categories/');    
    }

    /*public function show($id){
        $cat=Category::find($id);
        return view('admin/categories/destroy-cat', compact('cat'));
    }/*
    /*Remove the specified resource from storage.*/
    /*public function destroy(Request $request, $id)
    {   //dd($id);
        $cat = Category::find($id);
        $cat->delete();             
        //redirect
        return redirect('admin/categories/');  
    }*/
}

