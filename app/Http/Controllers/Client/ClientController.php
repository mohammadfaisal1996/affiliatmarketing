<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Referral_link;
use App\Models\Register_Referral_Link;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Client\WalletController;

class ClientController extends Controller
{

    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required',
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:8|max:30',
              'cpassword'=>'required|min:8|max:30|same:password',
              'phone_number'=>'required|unique:users',
              'user_image'=>'max:50240',
          ]);



          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->birthdate = $request->birthdate;
          $user->phone_number = $request->phone_number;
          $user->password = \Hash::make($request->password);
          $user->user_image ='dddd';
          if($save = $user->save()){
              if(isset($request->link_id)){
                  $this->addUserRegister($request->link_id,$user->id);
              }
          }

          if( $save ){
              return redirect()->route("clients.login");
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    public function login(){
        return view('clients.auth.login');
    }

    public function register(Request $request){
        if(isset($request->link_id)){
            $link_id=$request->link_id;
            $this->addvisitor($link_id);
        }
        return view('clients.auth.register');
    }
    public function ShowDashboard(){
        return view('clients.home');
    }


    public function addvisitor($link_id){
        $add=Referral_link::find($link_id);
        $add->number_of_visitors=$add->number_of_visitors+1;
        $add->save();
    }

    public function addUserRegister($link_id,$user_id){
        $register = new Register_Referral_Link();
        $register->referral_link_id=$link_id;
        $register->user_id=$user_id;
        if($register->save())
        {
            $link =Referral_link::find($link_id);
            $link->number_of_registered=$link->number_of_registered+1;
            $link->save();
        }

    }

    public  function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }



}
