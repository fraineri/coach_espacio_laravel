<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /*Display a listing of the resource.*/
    public function index()
    {
        $cats = Category::paginate(5);
        return view('admin.catgories.index');
    }

    /*Show the form for creating a new resource.*/
    public function create()
    {
         return view('admin.categories.create');
    }

    /*Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        //validate
        $this->validate($request,[
            'name'=>'required|unique:products|max:191',
            'description'=>'required|max:500',
            'picture'=>'required|max:191',
            'slug'=>'required|max:191'
        ]);
        //store
        $cat=Category::create(request(['name','description','picture','slug']));
        //hay q hacer $cat->slug=str_slug($cat->name);????
        //guardar la imagen
        $nombre= str_slug($cat->name) . '.' .request()->picture->extension();
        request()->picture->storeAs('products', $nombre);
        //asociar la imagen con la categoria
        $cat->picture = $nombre;         
        $cat->save();

        //redirect
        return redirect('admin.categories.index');   
    }

    /*Show the form for editing the specified resource.*/
    public function edit($id)
    {
        $cat = Category::find($id);
        return view('admin.categories.edit', compact('cat'));
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, $id)
    {
         //validate
        $this->validate($request,[
            'name'=>'required|unique:products|max:191',
            'description'=>'required|max:500',
            'picture'=>'required|max:191',
            'slug'=>'required|max:191'
        ]);
        //recuperar la category de la DB
        $cat= Category::find($id);
        //save
        $cat->name = $request->name;
        $cat->description = $request->description;
        //hay q hacer $cat->slug=str_slug($cat->name);????
        $cat->slug = $request->slug;
        //guardar la imagen
        $nombre= str_slug($cat->name) . '.' .request()->picture->extension();
        request()->picture->storeAs('products', $nombre);
        //asociar la imagen con la categoria
        $cat->picture = $nombre;         
        $cat->save();

         //redirect
        return redirect('admin.categories.index');   
    }

    /*Remove the specified resource from storage.*/
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();             //o tendremos q ponerle un boolean?
        //redirect
        return redirect('admin.categories.index');  
    }
}
