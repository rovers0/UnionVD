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
                <img src="{{asset('/img/'.Auth::user()->img)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('profile')}}" class="d-block">{{ Auth::user()->name }} </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
               
                <li class="nav-item ">
                    <a href="{{ route('lead.register') }}" class="nav-link">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>
                            ADD User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('lead.notification') }}" class="nav-link">
                <i class="fas fa-bullhorn"></i>
                    <p>
                        &nbsp;&nbsp;Notification
                    </p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('lead.event') }}" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                           Event
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('lead.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                         User
                        </p>
                    </a>
                </li>             
                <li class="nav-item">
                    <a href="{{ route('lead.evaluate') }}" class="nav-link">
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