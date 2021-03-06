@extends('layouts.admin')

@section('title', 'BOLETA DE TRABAJO')


@section('contenido')
    <section class="content-header">
        <h1>
            Orden Nr. #0{{$order->id }}
        </h1>
    </section>

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12 table-responsive table-condensed">
                <h1>
                    <img alt="User Image" src="{{ asset ('images/logo.png') }}" class="pull-left">
                </h1>
                <h4 class="pull-right">
                    Orden Nr.  0{{$order->id }}
                </h4>

            </div>
        </div>
        <br>

        <!-- info row -->
        <div class="row">
            <div class="col-xs-12">

                <table class="table table-bordered table-condensed">
                    <tr>
                        <td><strong>Marca:</strong></td>
                        <td>{{ $order->vehicle->brand }}</td>
                        <td><strong>Modelo</strong></td>
                        <td>{{ $order->vehicle->model }}</td>
                        <td><strong>Motor:</strong></td>
                        <td>{{ $order->vehicle->motor }}</td>
                        <td><strong>Vin:</strong></td>
                        <td>{{ $order->vehicle->vin }}</td>
                        <td><strong>Año</strong></td>
                        <td>{{ $order->vehicle->year }}</td>
                        <td><strong>Km</strong></td>
                        <td>{{ $order->km }}</td>
                    </tr>
                </table>

            </div>
        </div>
        <!-- /.col -->


    @if(count($order->services)>0)
        <!-- Table row -->
            <div class="row">
                <div class="col-xs-12">
                    <h3>Servicios</h3>
                    <table class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->services as $service)
                            <tr>
                                <td>{{$service->name}}</td>
                                <td class="text-center"><input type="checkbox"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    @endif

    <!-- Table row -->
        <div class="row">
            <div class="col-xs-12">
                <h3>Productos</h3>
                @if(count($order->products)>0)
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th>MARCA</th>
                            <th>MODELO</th>
                            <th>CANTIDAD</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td>{{ $product->name   }}</td>
                                <td>{{ $product->brand   }}</td>
                                <td>{{ $product->model   }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td class="text-center"><input type="checkbox"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                @if($order->status == 'budget' && $cells != '')
                    <table class="table table-striped table-condensed" id="example">
                        <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th>CANTIDAD</th>
                        </tr>
                        </thead>
                    </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    @endif
    <!-- /.row -->
        <div class="row">
            <!-- accepted payments column -->
            @if($order->ot_observations != '')
                <div class="col-xs-6">
                    <p class="lead">Observaciones:</p>
                    <p class="text-muted well well-sm " style="margin-top: 10px;">
                        {{$order->ot_observations}}
                    </p>
                </div>
            @endif
            <div class="row text-center no-print">
                <button type="button" class="btn btn-success printer" id="print">Imprimir Boleta de trabajo
                    <i class="glyphicon glyphicon-print"></i>
                </button>
                <a class="btn btn-danger" href="{{ route('orders.show', $order)}}">
                    Volver
                    <i class="glyphicon glyphicon-backward"></i>
                </a>
            </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>

@endsection

@section('js')
    <script type="text/javascript">
        $('.printer').on('click', function () {
            window.print();
        });

        $(document).ready(function () {
            var dataSet = {!! $cells!!};

            $('#example').DataTable({
                data: dataSet,
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false,
                "columnDefs": [
                    {"width": "60%", "targets": 0},
                    {"width": "40%", "targets": 1},
                ]
            });
        });
    </script>
@endsection
