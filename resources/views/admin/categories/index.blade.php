@extends('admin.layout')
@section('page')
<div class="container-fluid mt--6">
    @include('admin.header')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
            <div>
            <a href="{{route('admin.categories.create') }}" class="btn btn-sm btn-neutral">New Parent category</a>
            <a href="{{route('admin.categories.createChild') }}" class="btn btn-sm btn-neutral">New category</a>
            </div>
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Users Management</h3>
                        </div>
                    </div>
                </div>
                @if(Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
                @if(Session::has('success'))
                    <p class="alert alert-danger">{{ Session::get('success') }}</p>
                @endif
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Name_parent</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Ngày chỉnh sửa</th>
                                <th scope="col">Chỉnh sửa</th>
                            </tr>
                        </thead>



                        <tbody>
                            
                        @foreach ($parentcategories as $parentCategory)
                            <tr>
                                <td>
                                    {{ $parentCategory->name }}
                                </td>
                                <td>
                                    {{ $parentCategory->created_at }}
                                </td>
                                <td>
                                    {{ $parentCategory->updated_at }}
                                </td>
                                <td>
                                    <div class="d-inline-flex">
                                        <form method="post" action="#">
                                            @csrf
                                            <button type="submit" class="btn "><i
                                                    class="ni ni-settings text-primary"></i></button>
                                        </form>

                                        <form onsubmit="return confirm('Do you really want to delete this?');" method="post" action="#">
                                            @csrf
                                            <button type="submit" class="btn "><i
                                                    class="ni ni-fat-remove text-primary"></i></button>
                                        </form>
                                    </div>
                                </td>


                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">{{ $parentcategories->links() }}</div>
            </div>
        </div>

    </div>
    <!-- Footer -->
    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
                <div class="copyright text-center  text-lg-left  text-muted">
                    &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                        target="_blank">Creative Tim</a>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                            Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                            class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>
@endsection