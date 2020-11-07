<!DOCTYPE html>
<html>
<head>
    @include('cpadmin.blocks.head')
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('cpadmin.blocks.navbar')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('cpadmin.blocks.aside')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('cpadmin.blocks.header')
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('cpadmin.blocks.footer')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('cpadmin.blocks.foot')
</body>
</html>