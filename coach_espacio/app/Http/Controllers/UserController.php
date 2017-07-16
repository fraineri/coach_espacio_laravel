<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function create_avatar($user, $avatar){
    		$filename = time().'.'.$avatar->getClientOriginalExtension();
    		$avatar->storeAs('avatars', $filename);
    		$user->avatar = $filename;
    		$user->save();
    }

    public function update(Request $request) {
        $user = \Auth::user();
        $user->name = $request->name;
    }
}
