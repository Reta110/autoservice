@extends('layouts.admin')

@section('title', 'Resultado de búsqueda')

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
                    Búsqueda avanzada
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-dashboard">
                    </i>
                    Resultado de Ordenes
                </a>
            </li>
            <li>
                <a href="#">
                    Listado
                </a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="box">
            @include('common.success')
            <div class="box-header with-border">
                <h3 class="box-title">
                    Resultado de búsqueda
                </h3>
                <div class="box-tools">

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
                                    <th>TITULO</th>
                                    <th>CLIENTE</th>
                                    <th>MARCA</th>
                                    <th>MODELO</th>
                                    <th>NETO</th>
                                    <th>IVA</th>
                                    <th>TOTAL</th>
                                    <th>STATUS</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr @if($order->paid == 'no' && $order->status != 'budget')class="bg-danger" @endif>
                                        <td>
                                            {{ $order->id }}
                                        </td>
                                        <td>
                                            {{ $order->title }}
                                        </td>
                                        <td>
                                            {{ $order->name.' '.$order->last_name}}
                                        </td>
                                        <td>
                                            {{ $order->brand }}
                                        </td>
                                        <td>
                                            {{ $order->model }}
                                        </td>
                                        <td>
                                            {{ $order->neto }}
                                        </td>
                                        <td>
                                            {{ $order->iva }}
                                        </td>
                                        <td>
                                            {{ $order->total }}
                                        </td>
                                        <td>
                                            {{ $order->status }}
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['orders.destroy',$order->id ], 'method' => 'DELETE']) !!}
                                            <div class="form-group">
                                                <a href="{{ route('orders.show', $order->id) }}" title="">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{ route('orders.edit', $order->id) }}" title="Editar">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-link" title="Eliminar" data-toggle="confirmation">
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
                    "url": "{{ asset('AdminLTE/plugins/datatables/esp.lang') }}",
                },
                "aaSorting": [ [8,'desc'],[0,'desc'] ],
            });
        });
    </script>
@endsection