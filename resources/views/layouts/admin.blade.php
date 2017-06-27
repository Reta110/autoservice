<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title>
        @yield('title')
    </title>
    <link rel="icon" type="image/png" href="{{asset("images/icon.png")}}/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=" width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link href="{{asset('AdminLTE/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="{{asset('AdminLTE/dist/css/AdminLTE.min.css')}}" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('AdminLTE/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset ('AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
    {{--<link href="{{ asset ('AdminLTE/plugins/datepicker/bootstrap-datepicker.standalone.css') }}" rel="stylesheet"--}}
    {{--type="text/css">--}}
    <link rel="stylesheet" href="{{ asset ('chosen/chosen.css') }}">

       <!-- icheck
<link href="AdminLTE/plugins/iCheck/square/red.css" rel="stylesheet">
<script src="AdminLTE/plugins/iCheck/icheck.js"></script>-->
    @yield('top')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a class="logo" href="../../index2.html">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">
                        <b>
                            A
                        </b>
                        LT
                    </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                        <b>
                            Automec
                        </b>
                    </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a class="sidebar-toggle" data-toggle="offcanvas" href="#" role="button">
                        <span class="sr-only">
                            Toggle navigation
                        </span>
                <span class="icon-bar">
                        </span>
                <span class="icon-bar">
                        </span>
                <span class="icon-bar">
                        </span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope-o">
                            </i>
                            <span class="label label-success">
                                        4
                                    </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                You have 4 messages
                            </li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                {{--<img alt="User Image" class="img-circle"
                                                     src="../../dist/img/user2-160x160.jpg">
                                                </img>--}}
                                            </div>
                                            <h4>
                                                Support Team
                                                <small>
                                                    <i class="fa fa-clock-o">
                                                    </i>
                                                    5 mins
                                                </small>
                                            </h4>
                                            <p>
                                                Why not buy a new awesome theme?
                                            </p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">
                                    See All Messages
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell-o">
                            </i>
                            <span class="label label-warning">
                                        10
                                    </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                You have 10 notifications
                            </li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua">
                                            </i>
                                            5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">
                                    View all
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-flag-o">
                            </i>
                            <span class="label label-danger">
                                        9
                                    </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                You have 9 tasks
                            </li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">
                                                    20%
                                                </small>
                                            </h3>
                                            <div class="progress xs">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20"
                                                     class="progress-bar progress-bar-aqua" role="progressbar"
                                                     style="width: 20%">
                                                            <span class="sr-only">
                                                                20% Complete
                                                            </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">
                                    View all tasks
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            {{--<img alt="User Image" class="user-image" src="../../dist/img/user2-160x160.jpg">
                             </img>--}}
                            <span class="hidden-xs">
                                            Automec
                                        </span>

                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                {{--<img alt="User Image" class="img-circle" src="../../dist/img/user2-160x160.jpg">

                                </img>--}}

                                <p>
                                    <small>
                                    </small>
                                </p>

                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">
                                            Followers
                                        </a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">
                                            Sales
                                        </a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">
                                            Friends
                                        </a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a class="btn btn-default btn-flat" href="#">
                                        Profile
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="#">
                                        Sign out
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a data-toggle="control-sidebar" href="#">
                            <i class="fa fa-gears">
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    {{--<img alt="User Image" class="img-circle" src="../../dist/img/user2-160x160.jpg">
                    </img>--}}
                    <br><br>
                </div>
                <div class="pull-left info">
                    <p>
                        Automec
                    </p>
                    <a href="#">
                        <i class="fa fa-circle text-success">
                        </i>
                        Online
                    </a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" class="sidebar-form" method="get">
                <div class="input-group">
                    <input class="form-control" name="q" placeholder="Buscar..." type="text">
                    <span class="input-group-btn">
                                    <button class="btn btn-flat" id="search-btn" name="search" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                    </input>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">
                    MENU
                </li>
                <li class="treeview">
                    <a href="{{route('stadistics.index')}}">
                        <i class="fa fa-line-chart">
                        </i>
                        <span>
                Estadísticas
                </span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                </li>
                <li class="treeview">

                    <a href="#">
                        <i class="fa fa-car">
                        </i>
                        <span>
                                    Trabajos
                                </span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('select-client')}}">
                                <i class="fa fa-circle-o"> </i>
                                Nuevo
                            </a>
                        </li>
                        <li>
                            <a href="{{route('orders.index')}}">
                                <i class="fa fa-circle-o"></i>
                                Listado
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user">
                        </i>
                        <span>
                                    Clientes
                                </span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('clients.create')}}">
                                <i class="fa fa-circle-o"></i>
                                Nuevo
                            </a>
                        </li>
                        <li>
                            <a href="{{route('clients.index')}}">
                                <i class="fa fa-circle-o"></i>
                                Listado
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-navicon">
                        </i>
                        <span>
                                    Productos
                                </span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('products.create') }}">
                                <i class="fa fa-circle-o"></i>
                                Nuevo
                            </a>
                        </li>
                        <li>
                            <a href="{{route('products.index')}}">
                                <i class="fa fa-circle-o"></i>
                                Listado
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-server">
                        </i>
                        <span>
                                    Servicios
                                </span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('services.create')}}">
                                <i class="fa fa-circle-o">
                                </i>
                                Nuevo
                            </a>
                        </li>
                        <li>
                            <a href="{{route('services.index')}}">
                                <i class="fa fa-circle-o">
                                </i>
                                Listado
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('configurations.index')}}">
                        <i class="fa fa-gear">
                        </i>
                        <span>
                                    Configuración
                                </span>
                        <span class="pull-right-container">

                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

    @yield('contenido')

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer no-print">
        <div class="pull-right hidden-xs">
            <b>
            </b>
            AUTOMEC
        </div>
        <strong>
            Copyright © 2017
            <a href="http://http://automec.cl/">
                Automec
            </a>
        </strong>
        All rights
        reserved.
    </footer>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
 immediately after the control sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="{{asset('AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('chosen/chosen.jquery.js') }} "></script>
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
<script src="{{asset('chosen/chosen.jquery.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('AdminLTE/plugins/datatables/datatables.min.js') }}"></script>


@yield('js')
</body>
</html>