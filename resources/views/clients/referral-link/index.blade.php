@extends('layouts.app')
@section('content')


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <a class="btn btn-primary m-2 p-2" href="{{route("clients.Referral_Link.create")}}">{{__("Generate new link")}}</a>
                    <div class="col-md-12">
                        <div class="card strpied-tabled-with-hover">
                            <div class="card-header ">
                                <h4 class="card-title">Referral link Table</h4>
                            </div>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>#</th>
                                    <th>link</th>
                                    <th>number of visitors</th>
                                    <th>number of registered user</th>
                                    <th>status</th>
                                    <th>show register user</th>
                                    <th>delete</th>
                                    </thead>
                                    <tbody>
                                       @foreach($ReferralLink as $link)
                                           <tr>
                                               <td>{{$link->id}}</td>
                                               <td>{{$link->link}}</td>
                                               <td>{{$link->number_of_visitors}}</td>
                                               <td>{{$link->number_of_registered}}</td>
                                               <td>{{$link->status == 1 ? "Active" : "InActive"}}</td>
                                               <td><a href="{{route("clients.Referral_Link.showRegister",["link_id"=>$link->id])}}" class="btn btn-primary">show</a></td>
                                               <td>
                                                   <form  id="delete-form" action="{{route("clients.Referral_Link.destroy", $link->id)}}" method="POST">
                                                       @csrf
                                                       @method("delete")
                                                       <button class="btn btn-danger" type="submit"><i class="nc-icon nc-simple-remove"></i></button>
                                                   </form>
                                               </td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
