@extends('layouts.app')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-2">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Generate Link</h4>
                        </div>
                        <div class="card-body">
                            <form  action="{{route("clients.Referral_Link.store")}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 pr-1">
                                        <div class="form-group">
                                            <input type="url" class="form-control" disabled placeholder="Link" value="{{app('request')->input('link')}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right m-1">Create</button>
                                <a href="{{route("clients.Referral_Link.index")}}" class="btn btn-secondary btn-fill pull-right m-1">back</a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
