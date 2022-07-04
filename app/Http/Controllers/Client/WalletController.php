<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Referral_link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class WalletController extends Controller
{
    public function index(){
        return view("index");
    }
    public function create(){
        return view("create");
    }

    public function store(){
        $user_id=Auth::user()->id;
        $link=  new Referral_link();
        $link->user_id=$user_id;
        $link->number_of_visitors =0;
        $link->number_of_registered=0;
        $link->link=URL::current();
        $link->status=1;
        $link->save();
        return redirect()->route("index");
    }
    public function destroy($id){
        $link= Referral_link::find($id);
        $link->delete();
        return redirect()->route("index");
    }
}
