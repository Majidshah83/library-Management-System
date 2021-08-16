<?php

namespace App\Http\Controllers;
use\App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //show all user
    public function showadmins()
    {
       $user=User::all();
       return view('admin.users')->with('user',$user);
    }

public function addAdmins(Request $request)
{   

 $request->validate([
 'name' => 'required|max:25',
 'email' => 'required|email|unique:users',
 'password' => 'required|min:8',
 'role'=>'required',

    ]);
   $data=['name'=>$request->name,'email'=>$request->email,'password' => Hash::make($request->password),'role'=>$request->role];
   $data=User::create($data);
   if($data)
   {
    return redirect()->back()->with('message','Add Succesfullly');
   }
   else{
       return redirect()->back()->with('message','Add not Succesfullly');
   }
}

}
