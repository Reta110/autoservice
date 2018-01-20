@extends('layouts.admin')

@section('title', 'Listado de vehiculos con posible mantención')

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
                    Vehículos
                </a>
            </li>
            <li>
                <a href="#">
                    Mantención
                </a>
            </li>
            <li class="active">
                Notificaciones
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="box">
            @include('common.success')
            <div class="box-header with-border">
                <h3 class="box-title">
                    Listado de vehiculos con posible mantención
                </h3>
                <div class="box-tools">

                    <div class="text-center">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                            Enviar notificaciones
                            <i class="glyphicon glyphicon-send"></i>
                        </button>

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
                                    <th>MARCA</th>
                                    <th>MODELO</th>
                                    <th>AÑO</th>
                                    <th>KM total</th>
                                    <th>KM x MES</th>
                                    <th>ULTIMA VISITA</th>
                                    <th>CLIENTE</th>
                                    <th>TELEFONO</th>
                                    <th>ACCIONES</th>
                                    <th><i class="fa fa-envelope" aria-hidden="true"></i> Todas: <input type="checkbox"
                                                                                                        name="notification"
                                                                                                        value="all"
                                                                                                        id="checkAll">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicles as $vehicle)
                                    <tr>
                                        <td>
                                            {{ $vehicle->id }}
                                        </td>
                                        <td>
                                            {{ $vehicle->brand }}
                                        </td>
                                        <td>
                                            {{ $vehicle->model }}
                                        </td>
                                        <td>
                                            {{ $vehicle->year }}
                                        </td>
                                        <td>
                                            {{ $vehicle->km }}
                                        </td>
                                        <td>
                                            {{ number_format($vehicle->drived , 0, '.', '')}}
                                        </td>
                                        <td>
                                            {{ $vehicle->last }}
                                        </td>
                                        <td>
                                            {{ $vehicle->owner }}
                                        </td>
                                        <td>
                                            {{ $vehicle->user->phone }}
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['vehicles.destroy',$vehicle ], 'method' => 'DELETE']) !!}
                                            <div class="form-group">
                                                <a href="{{ route('vehicles.show', $vehicle) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{ route('vehicles.edit', $vehicle) }}">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-link" title="Eliminar"
                                                        data-toggle="confirmation">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            {!! Form::close() !!}
                                        </td>


                                        <td>
                                            @if($vehicle->user->email != null)
                                                <input type="checkbox" name="notification"
                                                       value="{{ $vehicle->id }}">
                                            @endif
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

    @include('maintenance.modal.send-notification')
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable({
                "language": {
                    "url": "{{ asset('AdminLTE/plugins/datatables/esp.lang') }}"
                },
                "columnDefs": [
                    { "orderable": false, "targets": [9,10] }
                ]
            });
        });

        $("#checkAll").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });

        $(":checkbox").change(function () {
            var selected = new Array();
            $("input:checkbox:checked").each(function () {
                selected.push($(this).val());
                $('#checkedUsers').val(selected)
            });

            var quantity = selected.length;
            if ($(".all:checked")) {
                quantity = quantity - 1;
            }
            $('.counter').html(quantity);
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#email').focus()
        })
    </script>
@endsection