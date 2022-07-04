<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Referral_link;
use App\Models\Register_Referral_Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ReferralLinkController extends Controller
{
    public function index(){
        $data["ReferralLink"]=Referral_link::all();
        return view("clients.referral-link.index",$data);
    }
    public function create(){
        return view("clients.referral-link.create");
    }
    public function showRegister(Request $request){
        $link_id=$request->link_id;
        $data["RegisterLink"]=Register_Referral_Link::where("referral_link_id",$link_id)->get();
        return view("clients.referral-link.show_register_user",$data);

    }
    public function store(){
        $user_id=Auth::user()->id;
        $link=  new Referral_link();
        $link->user_id=$user_id;
        $link->number_of_visitors =0;
        $link->number_of_registered=0;
        $link->link="";
        $link->status=1;
        if($link->save()){
            $savelink=Referral_link::find($link->id);
            $savelink->link=$this->generate_url($link->id);
            $savelink->save();
        }
        return redirect()->route("clients.Referral_Link.create",["link"=>$savelink->link]);
    }
    public function destroy($id){
        $link= Referral_link::find($id);
        $link->delete();
        return redirect()->back();
    }
    public function generate_url($id){
        return URL::signedRoute('clients.register',["link_id"=>$id], now()->addMinutes(30));
    }
}
