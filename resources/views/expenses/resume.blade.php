@extends('layouts.admin')

@section('title', 'Resumen de Gastos Administrativos')

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
                    @if(isset($month))
                        Resumen de Gastos del
                        mes: {{Carbon\Carbon::now()->year($year)->month($month)->format('F \\d\\e Y')}}
                    @else
                        Resumen de Gastos del mes: {{Carbon\Carbon::now()->format('F \\d\\e Y')}}
                    @endif
                </h3>
                <div class="box-tools no-print">
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
                                @php $option = Carbon\Carbon::now()->subYear($i)->format('Y')@endphp
                                <option value='{{$option}}' @if(isset($year) && $option == $year)selected @endif>
                                    {{$option}}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="pull-right">
                        <select class="form-control" id='month' name="month">
                            <option value=''>--Seleccionar Mes--</option>
                            <option value='1' @if(isset($month) && $month == 1) selected @endif> Enero</option>
                            <option value='2' @if(isset($month) && $month == 2) selected @endif>Febrero</option>
                            <option value='3' @if(isset($month) && $month == 3) selected @endif>Marzo</option>
                            <option value='4' @if(isset($month) && $month == 4) selected @endif>Abril</option>
                            <option value='5' @if(isset($month) && $month == 5) selected @endif>Mayo</option>
                            <option value='6' @if(isset($month) && $month == 6) selected @endif>Junio</option>
                            <option value='7' @if(isset($month) && $month == 7) selected @endif>Julio</option>
                            <option value='8' @if(isset($month) && $month == 8) selected @endif>Agosto</option>
                            <option value='9' @if(isset($month) && $month == 9) selected @endif>Septiembre</option>
                            <option value='10' @if(isset($month) && $month == 10) selected @endif>Octubre</option>
                            <option value='11' @if(isset($month) && $month == 11) selected @endif>Noviembre</option>
                            <option value='12' @if(isset($month) && $month == 12) selected @endif>Diciembre</option>
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
        <div class="row text-center no-print">
            <button type="button" class="btn btn-success printer" id="print" title="Imprimir Boleta">Imprimir
                <i class="glyphicon glyphicon-print"></i>
            </button>
        </div>
    </section>

@endsection

@section('js')

    <script type="text/javascript">
        $('.printer').on('click', function () {
            window.print();
        });
    </script>
@endsection