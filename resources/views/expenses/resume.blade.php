@extends('layouts.admin')

@section('title', 'Resumen de Gastos Administrativos del mes')

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
                    Resumen de Gastos del mes
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
                    Resumen de Gastos del mes: {{Carbon\Carbon::now()->format('F \\d\\e Y')}}
                </h3>
                <div class="box-tools">
                    {!! Form::open(['route' => ['expenses.search'], 'method' => 'POST']) !!}
                    <div class="pull-right">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">
                                VER
                            </button>
                        </div>
                    </div>
                    <div class="pull-right">

                        <select class="form-control" id='year' name="year">
                            @for($i=0;$i<5;$i++)
                                <option value='{{Carbon\Carbon::now()->subYear($i)->format('Y')}}'>
                                    {{Carbon\Carbon::now()->subYear($i)->format('Y')}}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="pull-right">
                        <select class="form-control" id='month' name="month">
                            <option value=''>--Seleccionar Mes--</option>
                            <option selected value='1'>Enero</option>
                            <option value='2'>Febrero</option>
                            <option value='3'>Marzo</option>
                            <option value='4'>Abril</option>
                            <option value='5'>Mayo</option>
                            <option value='6'>Junio</option>
                            <option value='7'>Julio</option>
                            <option value='8'>Agosto</option>
                            <option value='9'>Septiembre</option>
                            <option value='10'>Octubre</option>
                            <option value='11'>Noviembre</option>
                            <option value='12'>Diciembre</option>
                        </select>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Gastos en insumos <p class="text-green money">{{$expenses}}</p></h2>

                    </div>
                    <div class="col-xs-6">
                        <h2>Gastos fijos mensuales <p class="text-green money">{{$fixedExpenses}}</p></h2>

                    </div>
                </div>
                <!-- /.box -->
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Comisión en TDD <p class="text-green money">{{$debit_comision}}</p></h2>

                    </div>
                    <div class="col-xs-6">
                        <h2>Comisión TDC <p class="text-green money">{{$credit_comision}}</p></h2>

                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection

@section('js')

    <script type="text/javascript">
        $(document).ready(function () {
            $('.table').DataTable({
                "language": {
                    "url": "{{ asset('AdminLTE/plugins/datatables/esp.lang') }}",
                },
                "order": [[0, "desc"]],
                "paging": false,
                "sScrollX": "100%"
            });
        });
    </script>
@endsection