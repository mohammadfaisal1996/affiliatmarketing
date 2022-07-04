@extends('layouts.app_auth')
@section('content')

    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">{{ __('Register') }}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center mb-5">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <form method="POST" action="{{ route('clients.create') }}">
                            @csrf


                            <div class="form-group">
                                <input id="name" type="text" class="form-control rounded-left @error('name') is-invalid @enderror" name="name" placeholder="Enter Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input type="hidden" name="link_id" value="{{app('request')->input('link_id')}}">

                            <div class="form-group">
                                <input id="email" type="email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="email">
                            </div>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group">
                                <input id="email" type="text" class="form-control rounded-left @error('phone_Number') is-invalid @enderror" name="phone_number" placeholder="Enter Phone Number" value="{{ old('Phone_Number') }}" required autocomplete="Phone_Number">
                            </div>

                            @error('Phone Number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="form-group">
                                <input id="email" type="date" class="form-control rounded-left @error('birthdate') is-invalid @enderror" name="birthdate"  value="{{ old('Birthdate') }}" required autocomplete="Birthdate">
                            </div>

                            @error('Birthdate')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                            <div class="form-group">
                               <input id="password" type="password" class="form-control rounded-left @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required autocomplete="new-password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control rounded-left" name="cpassword" placeholder="Enter password Confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <input id="email" type="file" class="form-control rounded-left @error('user_image') is-invalid @enderror" name="User_image" placeholder="Enter User image" value="{{ old('User_image') }}"  autocomplete="User_image">
                            </div>

                            @error('User_image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@section('content')



