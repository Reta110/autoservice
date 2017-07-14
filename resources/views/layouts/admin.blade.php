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
    <link href="{{ asset ('AdminLTE/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
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
                            <li class="text-center">
                                <img alt="User Image" src="{{asset("images/logo2.png")}}">

                                </img>

                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                {{--<div class="pull-left">--}}
                                {{--<a class="btn btn-default btn-flat" href="#">--}}
                                {{--Profile--}}
                                {{--</a>--}}
                                {{--</div>--}}
                                <div class="text-center">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">{{ csrf_field() }}</form>
                                </div>
                            </li>
                        </ul>
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

                    <a href="{{route('orders.index')}}">
                        <i class="fa fa-car">
                        </i>
                        <span>
                                    Trabajos
                                </span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('clients.index')}}">
                        <i class="fa fa-user">
                        </i>
                        <span>
                                    Clientes
                                </span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                    </a>
                </li>
                <li class="active treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Productos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('products.index')}}"><i class="fa fa-circle-o"></i>Listado</a>
                        </li>
                        <li>
                            <a href="{{route('categories.index')}}"><i class="fa fa-circle-o"></i>Categorias</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="{{route('services.index')}}">
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
                </li>
                <li class="treeview">
                    <a href="{{route('vehicles.index')}}">
                        <i class="fa fa-car">
                        </i>
                        <span>
                                    Vehículos
                                </span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                    </a>
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
<script type="text/javascript" src="{{ asset('AdminLTE/plugins/select2/select2.js') }}"></script>

<script type="text/javascript" src="{{ asset('AdminLTE/plugins/datatables/datatables.min.js') }}"></script>

<script src="{{ asset('js/autoNumeric.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-confirmation.min.js')}}"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $('.money').autoNumeric('init', {aSep: '.', aDec: ',', aSign: '$ ', mDec: '0'});
    });

    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        container: 'body'
    });
</script>

@yield('js')
</body>
</html>