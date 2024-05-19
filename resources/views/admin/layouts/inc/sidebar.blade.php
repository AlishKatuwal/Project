<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
        {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">NepalWonders</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                {{-- if logged in  --}}
                @auth
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                @endauth
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/province') ? 'active' : '' }} || {{ request()->is('admin/province/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>
                            Province
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/province/create"
                                class="nav-link {{ request()->is('admin/province/create') ? 'active' : '' }}">
                                <i class="fa-solid fa-plus"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/province"
                                class="nav-link {{ request()->is('admin/province') ? 'active' : '' }}">
                                <i class="fa-solid fa-table"></i>
                                <p>
                                    Province List
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/city') ? 'active' : '' }} || {{ request()->is('admin/city/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>
                            Cities
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/city/create"
                                class="nav-link {{ request()->is('admin/city/create') ? 'active' : '' }}">
                                <i class="fa-solid fa-plus"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/city" class="nav-link {{ request()->is('admin/city') ? 'active' : '' }}">
                                <i class="fa-solid fa-table"></i>
                                <p>
                                    Cities List
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/facility') ? 'active' : '' }} || {{ request()->is('admin/facility/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>
                            Facility
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/facility/create"
                                class="nav-link {{ request()->is('admin/facility/create') ? 'active' : '' }}">
                                <i class="fa-solid fa-plus"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/facility"
                                class="nav-link {{ request()->is('admin/facility') ? 'active' : '' }}">
                                <i class="fa-solid fa-table"></i>
                                <p>
                                    Facilities
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/destination') ? 'active' : '' }} || {{ request()->is('admin/destination/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>
                            Destination
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/destination/create"
                                class="nav-link {{ request()->is('admin/destination/create') ? 'active' : '' }}">
                                <i class="fa-solid fa-plus"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/destination"
                                class="nav-link {{ request()->is('admin/destination') ? 'active' : '' }}">
                                <i class="fa-solid fa-table"></i>
                                <p>
                                    Destinations
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/guide') ? 'active' : '' }} || {{ request()->is('admin/guide/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>
                            Guide
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/guide/create"
                                class="nav-link {{ request()->is('admin/guide/create') ? 'active' : '' }}">
                                <i class="fa-solid fa-plus"></i>
                                <p>
                                    Add Guide
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/guide"
                                class="nav-link {{ request()->is('admin/guide') ? 'active' : '' }}">
                                <i class="fa-solid fa-table"></i>
                                <p>
                                    All Guide
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/hotel') ? 'active' : '' }} || {{ request()->is('admin/hotel/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>
                            Hotel
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/hotel/create"
                                class="nav-link {{ request()->is('admin/hotel/create') ? 'active' : '' }}">
                                <i class="fa-solid fa-plus"></i>
                                <p>
                                    Add Hotel
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/hotel"
                                class="nav-link {{ request()->is('admin/hotel') ? 'active' : '' }}">
                                <i class="fa-solid fa-table"></i>
                                <p>
                                    All Hotels
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/package') ? 'active' : '' }} || {{ request()->is('admin/package/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>
                            package
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/package/create"
                                class="nav-link {{ request()->is('admin/package/create') ? 'active' : '' }}">
                                <i class="fa-solid fa-plus"></i>
                                <p>
                                    Add package
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/package"
                                class="nav-link {{ request()->is('admin/package') ? 'active' : '' }}">
                                <i class="fa-solid fa-table"></i>
                                <p>
                                    All Packages
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/room') ? 'active' : '' }} || {{ request()->is('admin/room/create') ? 'active' : '' }}">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>
                            Rooms
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/room/create"
                                class="nav-link {{ request()->is('admin/room/create') ? 'active' : '' }}">
                                <i class="fa-solid fa-plus"></i>
                                <p>
                                    Add Rooms
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/room"
                                class="nav-link {{ request()->is('admin/room') ? 'active' : '' }}">
                                <i class="fa-solid fa-table"></i>
                                <p>
                                    All Rooms
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-block btn-danger">logout</button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
