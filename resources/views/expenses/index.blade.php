@extends('layouts.admin')

@section('title', 'Listado de insumos')

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
            @include('common.success')
            <div class="box-header with-border">
                <h3 class="box-title">
                    Gastos de insumos
                </h3>
                <div class="box-tools">

                    <div class="text-center">
                        <a class="btn btn-danger btn-sm" href="{{ route('expenses.create') }}">
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
                                    <th>CANTIDAD</th>
                                    <th>TOTAL</th>
                                    <th>CATEGORIA</th>
                                    <th>FECHA</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expenses as $expense)
                                    <tr>
                                        <td>
                                            {{ $expense->id }}
                                        </td>
                                        <td>
                                            {{ $expense->name }}
                                        </td>
                                        <td>
                                            {{ $expense->quantity }}
                                        </td>
                                        <td class="money">{{ $expense->total }}</td>
                                        <td>
                                            {{ $expense->category }}
                                        </td>
                                        <td>
                                            {{ $expense->date }}
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['expenses.destroy',$expense ], 'method' => 'DELETE']) !!}
                                            <div class="form-group">
                                                <a href="{{ route('expenses.show', $expense) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{ route('expenses.edit', $expense) }}">
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
                    "url": "{{ asset('AdminLTE/plugins/datatables/esp.lang') }}"
                }
            });
        });
    </script>
@endsection