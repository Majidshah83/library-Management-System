<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }

    public function adminLogin(){
        return view('admin.login');
    }


    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect("admin/login")->withs('succes','Login details are not valid');
    }


    public function customLogout(){

      Auth::logout();
      return redirect('admin/login');
    }


}
