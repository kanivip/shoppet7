 @extends('layouts.layout')
 @section('page')
 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
     <div class="container-fluid">
         <ul class="breadcrumb">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item"><a href="#">Products</a></li>
             <li class="breadcrumb-item active">Login & Register</li>
         </ul>
     </div>
 </div>
 <!-- Breadcrumb End -->

 <!-- Login Start -->
 <div class="login">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-10 " style="margin:auto">
                 <div class="login-form">
                     <form action="{{route('doLogin')}}" method="post">
                         @csrf
                         <div class="col">
                             <div class="col-md-6">
                                 <label>E-mail / Username</label>
                                 <input class="form-control" name="email" type="text" placeholder="E-mail / Username">
                                 @error('email')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                             </div>
                             <div class="col-md-6">
                                 <label>Password</label>
                                 <input class="form-control" name="password" type="text" placeholder="Password">
                                 @error('password')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                             </div>
                             <div class="col-md-12">
                                 <div class="custom-control custom-checkbox">
                                     <input type="checkbox" class="custom-control-input" id="newaccount">
                                     <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                 </div>
                             </div>

                             @if(session('warm'))
                             <div class="alert alert-danger">{{ session('warm') }}</div>
                             @endif
                             <div class="col-md-12">
                                 <button class="btn">Submit</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Login End -->
 @endsection