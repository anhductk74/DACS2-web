<?php

namespace App\Http\Controllers;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function loginAdmin(){
        return view('admin.login');
    }
    public function logOut(){
        Auth::logout();
        return redirect('/admin');
    }

    public function registerAdmin(){
        return view('admin.register');
    }
    public function postloginAdmin(Request $request){
        Auth::logout();
        $remember = $request->has('remember-me') ? true : false;
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'permission' => 'admin'
        ], $remember)){
            return redirect('admin/home');
        }
        return back()->with('error','Error!!');
    }

    public function postregisterAdmin(Request $request){
        if(User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'permission' => 'admin'
        ])) {
            return redirect('/admin');
        } else {
            return back()->with('error','Error!!');
        }

    }
}
