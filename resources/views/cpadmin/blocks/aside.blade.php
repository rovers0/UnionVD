<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
    <img src="{{ asset('cpadmin/dist/img/AdminLTELogo.png') }}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Union VD</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('cpadmin/dist/img/123.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }} </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="/admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>
                            ADD MORE
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.event.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Event </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.noti.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Notification </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.class.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Class</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.register') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{ route('admin.evaluate.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Evaluate</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('admin.event.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                           Event
                        </p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{ route('admin.noti.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Notification
                        </p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{ route('admin.class.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            class
                        </p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                         User
                        </p>
                    </a>
                </li>             
                <li class="nav-item">
                    <a href="{{ route('admin.evaluate.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Evaluate
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>