<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{asset('admin/assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users')}}">

                            <i class="ni ni-single-02 text-orange"></i>
                            <span class="nav-link-text">Users Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">

                            <i class="ni ni-single-02 text-orange"></i>
                            <span class="nav-link-text">Categories</span>
                        </a>
                    </li>

                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->

            </div>
        </div>
    </div>
</nav>