@extends('layouts.admin')

@section('title', 'Listado de ordenes')

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
                    Ordenes
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
                    Listado de ordenes
                </h3>
                <div class="box-tools">

                    <div class="text-center">
                        <a class="btn btn-danger btn-sm" href="{{ route('select-client') }}">
                            NUEVO REGISTRO
                        </a>
                        {{--  <a class="btn btn-success btn-sm" href="{{route('export')}}">
                            IMPRIMIR REPORTE
                        </a> --}}
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
                                    <th>TITULO</th>
                                    <th>CLIENTE</th>
                                    <th>RUT</th>
                                    <th>MARCA</th>
                                    <th>MODELO</th>
                                    <th>AÑO</th>
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
                                            {{ $order->user->name }}
                                        </td>
                                        <td>
                                            {{ $order->user->rut }}
                                        </td>
                                        <td>
                                            {{ $order->vehicle->brand }}                                        </td>
                                        </td>
                                        <td>
                                            {{ $order->vehicle->model }}                                        </td>
                                        </td>
                                        <td>
                                            {{ $order->vehicle->year }}                                        </td>
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
                                            {!! Form::open(['route' => ['orders.destroy',$order ], 'method' => 'DELETE']) !!}
                                            <div class="form-group">
                                                <a href="{{ route('orders.show', $order) }}" title="">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{ route('orders.edit', $order) }}" title="Editar">
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