@extends('layouts.layout')
@section('page')
<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10" style="margin:auto">
                <form action="{{route('doRegister')}}" method="post">
                    @csrf
                    <div class="register-form">
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="First Name"
                                    value="{{old('firstName')}}" name="firstName">
                                @error('firstName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Last Name"</label>
                                <input class="form-control" type="text" placeholder="Last Name" name="lastName"
                                    value="{{old('lastName')}}">
                                @error('lastName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="E-mail" name="email"
                                    value="{{old('email')}}">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="Mobile No" name="phoneNumber"
                                    value="{{old('phoneNumber')}}">
                                @error('phoneNumber')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input id="input-password" class="form-control" type="text" placeholder="password"
                                    name="password">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Retype Password</label>
                                <input id="input-repassword" class="form-control" type="text" placeholder="Password"
                                    name="rePassword">
                                <p id="warm"></p>
                                @error('rePassword')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" id="check" class="btn">Submit</button>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Login End -->
    @endsection