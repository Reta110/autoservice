@extends('layouts.admin')

@section('title', 'Listado de productos menos que stock deseado')

@section('contenido')

    <style type="text/css">
        .btn-sq-lg {
            width: 150px !important;
            height: 150px !important;
            margin: 50px;
        }
    </style>

    <div class="content">
        <div class="box">

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-xs-6 col-md-4">
                        <a href="{{route('export.orders')}}" class="btn btn-sq-lg btn-primary">
                            <i class="fa fa-book fa-5x"></i><br/>
                            Exportar todos las <br>Ordenes
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <a href="{{route('export.clients')}}" class="btn btn-sq-lg btn-success">
                            <i class="fa fa-address-book-o fa-5x"></i><br/>
                            Exportar todos los <br>Clientes
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <a href="{{route('export.debts')}}" class="btn btn-sq-lg btn-warning">
                            <i class="fa fa-user-secret fa-5x"></i><br/>
                            Exportar todos los <br>Deudores
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <a href="{{route('export.products')}}" class="btn btn-sq-lg btn-warning">
                            <i class="fa fa-dashboard fa-5x"></i><br/>
                            Exportar todos los <br>Productos
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <a href="{{route('export.services')}}" class="btn btn-sq-lg btn-info">
                            <i class="fa fa-server fa-5x"></i><br/>
                            Exportar todos los <br>Servicios
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <a href="{{route('export.vehicles')}}" class="btn btn-sq-lg btn-primary">
                            <i class="fa fa-car fa-5x"></i><br/>
                            Exportar todos los <br>Vehículos
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-4">
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <a href="{{route('export.all')}}" class="btn btn-sq-lg btn-primary">
                            <i class="fa fa-folder-open-o fa-5x"></i><br/>
                            Exportar<br>Todo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
