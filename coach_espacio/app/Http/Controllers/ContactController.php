<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUs;


class ContactController extends Controller
{
	public function send(Request $request){
        $this->validate($request,[
            'name'      => 'required|string|max:255',
            'surname'   => 'required|string|max:255',
            'email'   	=> 'required|string|max:255',
            'message'   => 'required|string|max:1000',
        ]);

        \Mail::to("fraineri@outlook.com")->send(new ContactUs($request));

        return redirect('/');
	}
}
