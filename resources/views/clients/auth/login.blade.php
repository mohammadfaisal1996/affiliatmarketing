@extends('layouts.app_auth')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center mb-5">
                        <span class="fa fa-user-o"></span>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Enter Email" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                        <div class="form-group d-flex">
                            <input id="password" type="password" class="form-control  rounded-left @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="current-password">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Remember Me
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="w-50 text-md-right">
                                 <a href="{{Route("register")}}">Register</a>
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded submit p-3 px-5">sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@section('content')



