@extends('layouts.admin')

@section('title', 'Seleccionar vehiculo')

@section('contenido')
    <section class="content-header">
        <h1>
            <span class="text-blue">Cliente:</span> {{$client->name.' '.$client->lastname}}

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

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title text-green">Seleccionar carro</h3>

                        <div class="box-tools">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>VIN</th>
                                <th>AÑO</th>
                                <th></th>
                            </tr>
                            @foreach($client->vehicles as $vehicle)
                                <tr>
                                    <td>{{$vehicle->brand}}</td>
                                    <td>{{$vehicle->model}}</td>
                                    <td>{{$vehicle->vin}}</td>
                                    <td>{{$vehicle->year}}</td>
                                    <td class="text-center">
                                        <div class="form-group">
                                            <a href="{{ route('select-vehicle', $client) }}">
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


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Reason</th>
                            </tr>
                            <tr>
                                <td>183</td>
                                <td>John Doe</td>
                                <td>11-7-2014</td>
                                <td><span class="label label-success">Approved</span></td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                                <td>219</td>
                                <td>Alexander Pierce</td>
                                <td>11-7-2014</td>
                                <td><span class="label label-warning">Pending</span></td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                                <td>657</td>
                                <td>Bob Doe</td>
                                <td>11-7-2014</td>
                                <td><span class="label label-primary">Approved</span></td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                            <tr>
                                <td>175</td>
                                <td>Mike Doe</td>
                                <td>11-7-2014</td>
                                <td><span class="label label-danger">Denied</span></td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
    </section>

@endsection

@section('js')

@endsection