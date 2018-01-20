@extends('layouts.admin')

@section('title', '                    Búsqueda avanzada de órdenes
')

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
                    Estadísticas
                </a>
            </li>
            <li>
                <a href="#">
                    Búsqueda avanzada
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
                    Búsqueda avanzada de órdenes
                </h3>
                <div class="box-tools no-print">

                </div>
            </div>
            <div class="box-body">
                <div class="row">

                    {{Form::open(['route' => 'stadistics.search', 'method' => 'POST'])}}
                    <div class="col-md-4 form-group">
                        <label>Rango de fechas:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input name="date" type="text" class="form-control" id="reservation">

                        </div>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Marca</label>
                        {!! Form::select('brand', $brands, null, ['class' => 'form-control', 'placeholder' => '-- Marca --']) !!}
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Cliente</label>
                        {!! Form::select('client', $clients, null, ['class' => 'form-control', 'placeholder' => '-- Cliente --']) !!}
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Modelo</label>
                        {!! Form::select('model', $models, null, ['class' => 'form-control', 'placeholder' => '-- Modelo --']) !!}
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Rango de Km:</label>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::text('km_min', null, ['class' => 'form-control', 'placeholder' => 'Desde']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::text('km_max', null, ['class' => 'form-control', 'placeholder' => 'Hasta']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4>Estatus</h4>
                        <div class="form-group pull-left">
                            <label>Presupuesto</label>
                            {!! Form::radio('status', 'budget', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group pull-left">
                            <label>Iniciado</label>
                            {!! Form::radio('status', 'pending', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group pull-left">
                            <label>Finalizado</label>
                            {!! Form::radio('status', 'ended', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group pull-left">
                            <label>Todos</label>
                            {!! Form::radio('status', 'all', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4>Pagadas</h4>
                        <div class="form-group pull-left">
                            <label>Si</label>
                            {!! Form::radio('paid', 'si', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group pull-left">
                            <label>No</label>
                            {!! Form::radio('paid', 'no', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group pull-left">
                            <label>Todas</label>
                            {!! Form::radio('paid', 'all', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <p class="text-center">{!! Form::submit('Buscar', ['class'=> 'btn btn-primary']) !!}</p>
                </div>
            {{Form::close()}}
            <!-- /.col -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <!-- footer-->
            </div>
            <!-- /.box-footer-->

    </section>

@endsection

@section('top')
    <script type="text/javascript" src="{{ asset('AdminLTE/plugins/chartjs/Chart.js') }}"></script>
    <link href="{{ asset ('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset ('AdminLTE/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('js')

    <script type="text/javascript" src="{{ asset('AdminLTE/plugins/daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

    <script type="text/javascript">
        //Date range as a button
        //Date range picker
        $('#reservation').daterangepicker(
                {
                    //showDropdowns: true,
//                    ranges: {
//                        'Esta semana': [moment().startOf('week'), moment().endOf('week')],
//                        'Última semana': [moment().subtract(6, 'days'), moment()],
//                        'Últimas 2 semanas': [moment().subtract(13, 'days'), moment()],
//                        'Este mes': [moment().startOf('month'), moment().endOf('month')],
//                        'Mes anterior': [moment().subtract(1, 'month').startOf('month'),
//                            moment().subtract(1, 'month').endOf('month')]
//                    },
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear',
                        format: 'DD/MM/YYYY',
                        applyLabel: 'Aplicar',
                        cancelLabel: 'Limpiar',
                        fromLabel: 'Desde',
                        toLabel: 'Hasta',
                        default: null,
                        customRangeLabel: 'Seleccionar rango',
                        daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre',
                            'Diciembre'],
                        firstDay: 1
                    }
                }
        )

        $('.printer').on('click', function () {
            window.print();
        });

    </script>


@endsection