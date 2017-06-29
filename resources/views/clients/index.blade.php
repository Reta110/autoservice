@extends('layouts.admin')

@section('title', 'Listado de clientes')

@section('contenido')
    <section class="content-header">
        <h1>
            Listado de clientes
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
            @include('common.success')
            <div class="box-header with-border">
                <h3 class="box-title">
                    Listado de clientes
                </h3>
                <div class="box-tools">

                    <div class="text-center">
                        <a class="btn btn-danger btn-sm" href="{{ route('clients.create') }}">
                            NUEVO REGISTRO
                        </a>
                    </div>

                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover display table-responsive table-condensed" id="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>RUT</th>
                                    <th>TELEFONO</th>
                                    <th>DIRECCION</th>
                                    <th>EMAIL</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>
                                            {{ $client->id }}
                                        </td>
                                        <td>
                                            {{ $client->name }}
                                        </td>
                                        <td>
                                            {{ $client->last_name }}
                                        </td>
                                        <td>
                                            {{ $client->rut }}
                                        </td>
                                        <td>
                                            {{ $client->phone }}
                                        </td>
                                        <td>
                                            {{ $client->address }}
                                        </td>
                                        <td>
                                            {{ $client->email }}
                                        </td>
                                        <td class="text-center">
                                            {!! Form::open(['route' => ['clients.destroy',$client ], 'method' => 'DELETE']) !!}
                                            <div class="form-group">
                                                <a href="{{ route('clients.edit', $client) }}">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-link" title="Eliminar">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- footer-->
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div>
    </section>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable({
                "language": {
                    "url": "{{ asset('AdminLTE/plugins/datatables/esp.lang') }}"
                }
            });
        });
    </script>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable({
                "language": {
                    "url": "{{ asset('AdminLTE/plugins/datatables/esp.lang') }}"
                }
            });
        });
    </script>
@endsection