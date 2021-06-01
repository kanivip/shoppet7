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
                <form class="col-xl-12" method="post" action="{{route('admin.categories.updateChild',$category->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" value="{{old('name',$category->name)}}" class="form-control" name="name"
                            id="exampleFormControlInput1">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Parent</label>
                        <select class="form-control" name="parent" id="exampleFormControlSelect1">
                            @foreach($parentcategories as $parentcategory)
                            <option value="{{$parentcategory->id}}"
                                {{ $parentcategory->id == old('parent',$category->parent_id) ? "selected" : "" }}>
                                {{$parentcategory->name}}</option>
                            @endforeach
                        </select>
                        @error('parent')
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
</div>

@endsection
