<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class staticController extends Controller{
    public function home(){
    	return view('/static/home');
    }

    public function contact(){
    	return view('/static/contact');
    }

    public function faq(){
    	return view('/static/faq');
    }

    public function tienda(){
    	return view('/static/tienda');
    }

    public function login(){
    	return view('login');
    }

    public function register(){
    	return view ('register');
    }

    public function recuperar(){
    	return view ('/password/user');
    }

    public function countUsers(){
    	return User::count();
    }
}
