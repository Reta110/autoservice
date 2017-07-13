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
                    Estadísticas de los últimos 7 días
                </h3>
                <div class="box-tools">
                    {{Form::open(['route' => 'stadistics.store', 'class'=>'form-inline','method' => 'POST'])}}
                    <div class="form-group">
                        <label>Rango de fechas:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input name="date" type="text" class="form-control pull-right" id="reservation">

                        </div>
                        <div class="input-group">
                            {!! Form::submit('Aplicar', ['class'=> 'btn btn-primary']) !!}
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    {{Form::close()}}

                </div>
            </div>
            <div class="box-body">
                <div class="row">


                </div>
                <br>
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            {{ $order->id }}
                                        </td>
                                        <td>
                                            {{ $order->title }}
                                        </td>
                                        <td>
                                            {{ $order->user->name . ' '. $order->user->last_name }}
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
                                        <td class="money">{{ $order->neto }}</td>
                                        <td class="money">{{ $order->iva }}</td>
                                        <td class="money">{{ $order->total }}<td>
                                            {{ $order->status }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>

                    <div class="col-xs-3 text-center">
                        <p class="text-center">
                            <strong>Totales</strong>
                        </p>
                        <h4 class="text-info bg-info">Ingresos: <span class="money">{{$total}}</span></h4>
                        <h4 class="text-danger bg-danger">Costos: <span class="money">{{$total_cost}}</span></h4>
                        <h4 class="text-success bg-success">Ganancia: <span
                                    class="money">{{$total - $total_cost}}</span></h4>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-center">
                            <strong>Costos vs Ganancias</strong>
                        </p>
                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="pieChart" style="height: 180px" ;></canvas>
                        </div>
                    </div>
                    <div class=" col-md-4">
                        <p class="text-center">
                            <strong>Estadísticas globales</strong>
                        </p>


                        <div class="progress-group">
                            <span class="progress-text">Presupuestos concretados</span>
                            <span class="progress-number"><b>{{$concretas}}</b> de {{$total_ordenes}}</span>

                            <div class="progress sm">
                                @if($total_ordenes>0)
                                    <div class="progress-bar progress-bar-red"
                                         style="width: {{($concretas * 100) / $total_ordenes}}%">

                                    </div>
                                @else
                                    <div class="progress-bar progress-bar-red"
                                         style="width: 0%">

                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Servicios prestados</span>
                            <span class="progress-number"><b>{{$total_servicios}}</b></span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-green"
                                     style="width: 100%">

                                </div>
                            </div>
                        </div>

                        <div class="progress-group">
                            <span class="progress-text">Productos almacenados</span>
                            <span class="progress-number"><b>{{$total_productos}}</b></span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-light-blue"
                                     style="width: {{$total_productos}}%">

                                </div>
                            </div>
                        </div>

                        <div class="progress-group">
                            <span class="progress-text">Costo total del almacen</span>
                            <span class="progress-number"><b class="money">{{$total_costos}}</b></span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-yellow"
                                     style="width: {{$total_productos}}%">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="box-header with-border">
                    <h3 class="box-title"><span class="text-danger">Costos</span> vs <span class="text-primary">Ganancias</span>
                    </h3>
                </div>
                <!-- /.box-header -->


                <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px" ;></canvas>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title"><span class="text-danger">Costos</span> vs <span class="text-primary">Ganancias</span>
                    </h3>
                </div>

                <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="barChart" style="height: 180px" ;></canvas>
                </div>


            </div>
            <!-- /.box -->
        </div>
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
        // -----------------------
        // - MONTHLY SALES CHART -
        // -----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: [moment().subtract(7, 'days').format('dd'), moment().subtract(6, 'days').format('dd'), moment().subtract(5, 'days').format('dd'), moment().subtract(4, 'days').format('dd'), moment().subtract(3, 'days').format('dd'), moment().subtract(2, 'days').format('dd'), moment().subtract(1, 'days').format('dd')],
            datasets: [
                {
                    label: 'Costos',
                    fillColor: 'rgb(226, 18, 18)',
                    strokeColor: 'rgb(226, 18, 18)',
                    pointColor: 'rgb(226, 18, 18)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgb(220,220,220)',
                    data: {!! json_encode($days_total_cost) !!}
                },
                {
                    label: 'Ganancias',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: {!! json_encode($days_total) !!}
                }
            ]
        };

        var salesChartOptions = {
            // Boolean - If we should show the scale at all
            showScale: true,
            // Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            // String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            // Number - Width of the grid lines
            scaleGridLineWidth: 1,
            // Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            // Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            // Boolean - Whether the line is curved between points
            bezierCurve: true,
            // Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            // Boolean - Whether to show a dot for each point
            pointDot: true,
            // Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            // Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            // Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            // Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            // Boolean - Whether to fill the dataset with a color
            datasetFill: false,
            // String - A legend template
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            // Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        // Create the line chart
        salesChart.Line(salesChartData, salesChartOptions);

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChart = new Chart(barChartCanvas)
        var barChartData = salesChartData

        barChart.Bar(barChartData, salesChartOptions)

        // -------------
        // - PIE CHART -
        // -------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
            {
                value: {!!  $total_cost !!},
                color: '#f56954',
                highlight: '#f56954',
                label: 'Gastos'
            },
            {
                value: {!!  $total !!},
                color: '#00a65a',
                highlight: '#00a65a',
                label: 'Ingresos'
            }
        ];
        var pieOptions = {
            // Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            // String - The colour of each segment stroke
            segmentStrokeColor: '#fff',
            // Number - The width of each segment stroke
            segmentStrokeWidth: 1,
            // Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            // Number - Amount of animation steps
            animationSteps: 100,
            // String - Animation easing effect
            animationEasing: 'easeOutBounce',
            // Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            // Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            // Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: false,
            // String - A legend template
            // String - A tooltip template
        };
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        // -----------------
        // - END PIE CHART -
        // -----------------

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

    </script>


@endsection