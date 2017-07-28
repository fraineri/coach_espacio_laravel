<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function create_avatar($user, $avatar){
    		$filename = time().'.'.$avatar->getClientOriginalExtension();
    		$avatar->storeAs('public/avatars', $filename);
    		$user->avatar = $filename;
    		$user->save();
    }

    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function edit(){
        return view('user.user-profile');
    }

    public function update(Request $request) {
        $user = \Auth::user();

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->has('password')) $user->password = bcrypt($request->password);
        
        $user->save();
    }
}
