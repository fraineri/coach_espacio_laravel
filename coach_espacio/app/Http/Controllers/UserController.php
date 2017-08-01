<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	public function create_avatar($user, $avatar){
        if(filesize($avatar)){
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $filename);
            $user->avatar = $filename;
            $user->save();
        }else{
            session()->flash('file','Tamaño de archivo muy grande.');
            return redirect()->back();
        }
    		
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
        $this->validate($request,[
            'name' => 'required|string|alpha|max:255',
            'surname' => 'required|string|alpha|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $user = \Auth::user();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;         

        if(isset($request->avatar)){
            $this->create_avatar($user,$request->avatar);
        }

        if ($request->has('password')){
            $usrPass = \Auth::user()->password;
            $equal = \Hash::check($request->password,$usrPass);
            if($equal){
                $this->validate($request,[
                    'new_password' => 'required|string|min:6|confirmed',
                ]);
                $user->password = \Hash::make($request->new_password);
            }else{
                session()->flash('password','Contraseña incorrecta.');
            }
        }

        $user->save();

        return redirect('/user/edit');
    }
}
