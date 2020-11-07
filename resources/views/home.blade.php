<!DOCTYPE html>
<html>
<head>
    @include('cpadmin.blocks.head')
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('cpadmin.blocks.userasside')
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0px;">
            <!-- Content Header (Page header) -->
            @include('cpadmin.blocks.header')
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        @include('cpadmin.blocks.pffooter')
    </div>
    @include('cpadmin.blocks.foot')
</body>
</html>