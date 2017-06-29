@extends('layouts.admin')

@if($order->status == 'budget')
    @section('title', 'PRESUPUESTO')
@endif
@if($order->status != 'budget')
    @section('title', 'BOLETA')
@endif

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
            <div class="col-xs-12">
                <h1 class="page-header">
                    <img alt="User Image" src="{{ asset ('images/logo.png') }}">
                    {{--<small class="pull-right">Fecha: {{ $order->created_at }}</small>--}}
                </h1>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Automec</strong><br>
                    <b>Fecha registro: </b>{{ $order->created_at }}<br>
                    <b>Dirección:</b> <br>
                    <b>Telf:</b> <br>
                    <b>Email:</b> admin@automec.cl
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Datos del cliente</strong><br>
                    <b>Cliente:</b> {{ $order->user->fullname }}<br>
                    <b>Rut:</b> {{ $order->user->rut }}<br>
                    <b>Telf:</b> {{ $order->user->phone }}<br>
                    <b>Email:</b> {{ $order->user->email }}<br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Datos del vehículo</strong><br>
                    <b>Marca:</b> {{ $order->vehicle->brand }}<br>
                    <b>Modelo:</b> {{ $order->vehicle->model }}<br>
                    <b>Motor:</b> {{ $order->vehicle->motor }}<br>
                    <b>Vin:</b> {{ $order->vehicle->vin }}<br>
                </address>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    @if(count($order->services)>0)
        <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <h3>Servicios</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th>HH</th>
                            <th>TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->services as $service)
                            <tr>
                                <td>{{$service->name}}</td>
                                <td>{{$service->hh}}</td>
                                <td>{{$service->hh * $config->price_hh }}</td>
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
                    <table class="table table-striped ">
                        <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th>PRECIO UNITARIO</th>
                            <th>CANTIDAD</th>
                            <th>TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td>{{ $product->name   }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->pivot->quantity*$product->cost }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        @endif

        <div class="row">
            <!-- accepted payments column -->
            @if($order->observations != '')
                <div class="col-xs-6">
                    <p class="lead">Observaciones:</p>
                    <p class="text-muted well well-sm " style="margin-top: 10px;">
                        {{$order->observations}}
                    </p>
                </div>
        @endif
        <!-- /.col -->
            <div class="col-xs-4 pull-right">

                <div class="form-group">

                    <table class="table">
                        <br>
                        <tr>
                            <td>Neto:</td>
                            <td><b>{{ $order->neto }} $</b></td>
                        </tr>
                        <tr>
                            <td>Iva:</td>
                            <td><b>{{ $order->iva }} $</b></td>
                        </tr>
                        <tr>
                            <th><h4>Total:</h4></th>
                            <td><h4><b>{{ $order->total }} $</b></h4></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-3 no-print">
                <h3>Ganancias:</h3>

                <h4 class="text-info bg-info">Total: {{$order->total}} $</h4>
                <h4 class="text-danger bg-danger">Costo total: {{$order->total_cost}} $</h4>
                <h4 class="text-success bg-success">Ganancia: {{$order->total - $order->total_cost}} $</h4>
            </div>

        </div>
        <!-- /.row -->
        <div class="row text-center no-print">
            {!! Form::open(['route' => 'print-work-paper', 'method' => 'POST', 'class' => 'pull-left']) !!}
            {!! Form::hidden('id', $order->id, ['class' => 'form-control']) !!}
            <button type="submit" class="btn btn-primary" id="print">Ver Hoja de trabajo
                <i class="glyphicon glyphicon-print"></i>
            </button>
            {!! Form::close() !!}
            <button type="button" class="btn btn-success printer" id="print">Imprimir Boleta
                <i class="glyphicon glyphicon-print"></i>
            </button>
            <a class="btn btn-danger" href="{{ route('print-work-paper')}}">
                Volver
            </a>
        </div>

        <br>
        <div class="row">
            <p class="FontSmall text-right pull-right">
                Servicio Automotriz Automec Limitada. Rut: 76.525.647-K
                <br>
                C.Corriente 70541017, Banco Santander.
            </p>
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
