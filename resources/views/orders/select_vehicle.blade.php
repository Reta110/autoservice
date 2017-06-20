@extends('layouts.admin')

@section('title', 'Seleccionar vehiculo')

@section('contenido')
    <section class="content-header">
        <h1>
            Nuevo trabajo
            <small>
                <span class="text-blue">Cliente:</span> {{$client->name.' '.$client->lastname}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard">
                    </i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">
                    Examples
                </a>
            </li>
            <li class="active">
                Blank page
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('common.success')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title text-green">Seleccionar carro</h3>

                        <div class="box-tools">

                            <div class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                    NUEVO VEHICULO
                                </button>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>VIN</th>
                                <th>PATENTE</th>
                                <th>MOTOR</th>
                                <th>AÑO</th>
                                <th></th>
                            </tr>
                            @foreach($client->vehicles as $vehicle)
                                <tr>
                                    <td>{{$vehicle->brand}}</td>
                                    <td>{{$vehicle->model}}</td>
                                    <td>{{$vehicle->vin}}</td>
                                    <td>{{$vehicle->patente}}</td>
                                    <td>{{$vehicle->motor}}</td>
                                    <td>{{$vehicle->year}}</td>
                                    <td class="text-center">
                                        <div class="form-group">
                                            <a href="{{ route('add-order', [$client, $vehicle]) }}">
                                                Siguiente
                                                <i class="glyphicon glyphicon-ok" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

    @include('orders.modals.vehicle-modal');
@endsection

@section('js')

@endsection