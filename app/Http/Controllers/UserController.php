<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $email = $request->email;
        $pass = $request->password;
        if(Auth::attempt(['email'=>$email, 'password'=>$pass, 'permission' => 'user'])){
            return redirect('/');
        }
        return back()->with('error','Your credentials are incorrect');
    }

    public function register(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'permission' => 'user'
        ]);
        return back();
    }

    public function logout(){
        Auth::logout();
        return redirect('/Account');
    }
}
