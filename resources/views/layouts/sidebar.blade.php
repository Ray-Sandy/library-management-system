<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Admin Dashboard (Hanya untuk Admin) -->
                @if(Auth::check() && Auth::user()->role->name === 'Admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Admin Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/books')}}" class="nav-link {{ request()->is('admin/books') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Book</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url ('/admin/accounts')}}" class="nav-link {{ request()->is('admin/accounts') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Account</p>
                        </a>
                    </li>
                @endif

                <!-- Member Dashboard (Hanya untuk Member) -->
                @if(Auth::check() && Auth::user()->role->name === 'Member')
                    <li class="nav-item">
                        <a href="{{ route('member.dashboard') }}" class="nav-link {{ request()->is('member/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon far fa-solid fa-house"></i>
                            <p>Home</p>
                        </a>
                    </li>
                @endif

                <!-- Search -->
                <li class="nav-item">
                    <a href="{{ url('search') }}" class="nav-link {{ request()->is('search') ? 'active' : '' }}">
                        <i class="nav-icon far fa-solid fa-magnifying-glass"></i>
                        <p>Search</p>
                    </a>
                </li>

                <!-- Explore -->
                <li class="nav-item">
                    <a href="{{ url('explore') }}" class="nav-link {{ request()->is('explore') ? 'active' : '' }}">
                        <i class="nav-icon far fa-solid fa-compass"></i>
                        <p>Explore</p>
                    </a>
                </li>

                <!-- My Shelves -->
                <li class="nav-header">MY SHELVES</li>

                <!-- My Library -->
                <li class="nav-item">
                    <a href="{{ url('my-library') }}" class="nav-link {{ request()->is('my-library') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>My Library</p>
                    </a>
                </li>

                <!-- Borrowing -->
                <li class="nav-item">
                    <a href="{{ url('borrow') }}" class="nav-link {{ request()->is('borrowing') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Borrowing</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>