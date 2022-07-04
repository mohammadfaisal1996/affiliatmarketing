<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:8|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);


         $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
             return view('admin.home');
         }else{
             return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
    }


    public function login(){
        return view('admin.login');
    }

    public function ShowDashboard(){
        return view('admin.home');
    }

    public function showUsers(){
        $data["Users"]=User::all();
        return view('admin.show_users',$data);
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
