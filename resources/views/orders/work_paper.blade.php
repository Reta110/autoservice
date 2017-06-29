@extends('layouts.admin')

@section('title', 'BOLETA DE TRABAJO')


@section('contenido')
    <section class="content-header">
        <h1>
            Orden Nr.
            <small>#0{{$order->id }}</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <h1>
                    <img alt="User Image" src="{{ asset ('images/logo.png') }}" class="pull-left">
                </h1>
                <h4 class="pull-right">
                    Orden Nr.
                    <small> 0{{$order->id }}</small>
                </h4>

            </div>
        </div>
        <br>

        <!-- info row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">

                <table class="table table-bordered table-bordered">
                    <tr>
                        <td colspan="10"><strong>DATOS DEL VEHICULO</strong></td>
                    </tr>
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
                    </tr>
                </table>

            </div>
        </div>
        <!-- /.col -->


    @if(count($order->services)>0)
        <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <h3>Servicios</h3>
                    <table class="table table-bordered table-bordered">
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
    @if(count($order->products)>0)
        <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <h3>Productos</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th>CANTIDAD</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td>{{ $product->name   }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
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
    <!-- /.row -->
        <div class="row text-center no-print">
            <button type="button" class="btn btn-success printer" id="print">Imprimir Boleta de trabajo
                <i class="glyphicon glyphicon-print"></i>
            </button>
            <a class="btn btn-danger" href="{{ route('orders.show', $order)}}">
                Volver
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
    </script>
@endsection
