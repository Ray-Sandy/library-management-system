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
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Admin Dashboard</p>
                    </a>
                </li> --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Admin Dashboard
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('admin.stocks.index')}}" class="nav-link {{ request()->is('admin/stocks') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Stock </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.accounts.index')}}" class="nav-link {{ request()->is('admin/accounts') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Account</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.history.index') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>History</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.stocks.index')}}" class="nav-link {{ request()->is('admin/stocks') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Stock</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.accounts.index')}}" class="nav-link {{ request()->is('admin/accounts') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Account</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>