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
                                <th>name</th>
                                <th>Email</th>
                                <th>phone number</th>
                                <th>created at</th>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
