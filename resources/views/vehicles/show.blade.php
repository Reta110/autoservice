@extends('layouts.admin')

@section('title', 'Detalles del vehiculo')

@section('contenido')
    <section class="content-header">
        <h1>
            <small>
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

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Detalles del carro
                </h3>
                <div class="box-tools">

                    <div class="text-center">
                        <a class="btn btn-success btn-sm" href="{{ route('vehicles.index') }}">
                            Volver
                        </a>
                    </div>

                </div>
            </div>
            <div class="box-body">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            @include('common.errors')
                        </div>
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Id:</td>
                                <td>{{ $vehicle->id }}</td>
                            </tr>
                            <tr>
                                <td>Marca:</td>
                                <td>{{ $vehicle->brand }}</td>
                            </tr>
                            <tr>
                                <td>Modelo:</td>
                                <td>{{ $vehicle->model }}</td>
                            </tr>
                            <tr>
                                <td>Vin:</td>
                                <td>{{ $vehicle->vin }}</td>
                            </tr>
                            <tr>
                                <td>Año:</td>
                                <td>{{ $vehicle->year }}</td>
                            </tr>
                            <tr>
                                <td>Motor:</td>
                                <td>{{ $vehicle->motor }}</td>
                            </tr>
                            <tr>
                                <td>Patente:</td>
                                <td>{{ $vehicle->patente }}</td>
                            </tr>
                            <tr>
                                <td>Km:</td>
                                <td>{{ $vehicle->km }}</td>
                            </tr>
                            <tr>
                                <td>Cliente:</td>
                                <td>{{ $vehicle->user->name .' '. $vehicle->user->last_name }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="for text-center">
            <a class="btn btn-success btn-sm" href="{{ URL::previous() }}">
                Regresar
            </a>
        </div>
    </section>

@endsection