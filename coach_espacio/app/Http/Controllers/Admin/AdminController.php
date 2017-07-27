<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login(Request $request) 
    {
    	/*$this->validate($request[
    		'clave'=> 'string|max:12'
    		]);*/
    		
    		//verificar clave estatica
    	if ($request->clave==='monarinomimi') {
    		 //redirect
        	return redirect('/admin/products/');   
    	} 
    }
}
