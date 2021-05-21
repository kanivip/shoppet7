@extends('admin.layout')
@section('page')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Chỉnh sửa thông tin người dùng</h3>
                        </div>
                    </div>
                </div>
                <form class="col-xl-12" method="post" action="{{route('admin.user.doUpdate',$user->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                            value='{{$user->gmail}}' placeholder="name@example.com">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Họ</label>
                        <input type="text" class="form-control" name="firstName" value='{{$user->first_name}}'
                            id="exampleFormControlInput1">
                        @error('firstName')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tên</label>
                        <input type="text" class="form-control" name="lastName" value='{{$user->last_name}}'
                            id="exampleFormControlInput1">
                        @error('lastName')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phoneNumber" value='{{$user->phone_number}}'
                            id="exampleFormControlInput1">
                        @error('phoneNumber')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Xác nhận</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <!-- Footer -->

</div>
@endsection