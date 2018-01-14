@extends('layouts.admin')

@section('title', 'Estadisticas de Automec')

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
                    Estadísticas
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
                    Búsqueda avanzada
                </h3>
                <div class="box-tools no-print">

                </div>
            </div>
            <div class="box-body">
                <div class="row">

                    {{Form::open(['route' => 'stadistics.store', 'method' => 'POST'])}}
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
                        {!! Form::text('brand', null, ['class' => 'form-control producto-cost', 'placeholder' => 'Marca']) !!}
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Cliente</label>
                        {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Cliente']) !!}
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Modelo</label>
                        {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Modelo']) !!}
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Estatus</label>
                        {!! Form::text('status', null, ['class' => 'form-control', 'placeholder' => 'Estatus']) !!}
                    </div>
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
                    autoUpdateInput: true,
                    locale: {
                        format: 'DD/MM/YYYY',
                        applyLabel: 'Aplicar',
                        cancelLabel: 'Limpiar',
                        fromLabel: 'Desde',
                        toLabel: 'Hasta',
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