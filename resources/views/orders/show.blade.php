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
                @include('common.errors')
                <h1 class="page-header">
                    <img alt="User Image" src="{{ asset ('images/logo.png') }}">
                    {{--<small class="pull-right">Fecha: {{ $order->created_at }}</small>--}}
                </h1>

            </div>
        </div>
        <div class="row no-print">
            <div class="col-xs-12">
                <table class="table table-bordered">
                    <tr>
                        <td><b>Estatus:</b></td>
                        <td>{{$order->status }}</td>
                        <td><b>Pagado:</b></td>
                        <td>{{$order->paid }}</td>
                        @if($order->paid == 'si')
                            <td><b>Forma de pago Pago:</b></td>
                            <td>{{$order->type_pay }}</td>
                        @endif
                        <td><b>Observación de pago:</b></td>
                        <td>{{$order->pay_observations}}</td>
                        <td><b>HH:</b></td>
                        <td>{{$order->hh}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Automec</strong><br>
                    <b>Fecha registro: </b>{{ $order->created_at }}<br>
                    <b>Orden Nro:</b> {{ $order->id }}<br>
                    <b>Telf:</b> 232666335<br>
                    <b>Email: </b>contacto@automec.cl
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Datos del cliente</strong><br>
                    <b>Nombre:</b> {{ $order->user->fullname }}<br>
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
                    <b>Patente:</b> {{ $order->vehicle->patente }}<br>
                    <b>Km:</b> {{ $order->km }}<br>
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
                    <table class="table table-striped table-condensed">
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
                                <td>{{$service->pivot->hh}}</td>
                                <td class="money">{{$service->pivot->hh * $order->hh }}</td>
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
                <div class="col-xs-12">
                    <h3>Productos</h3>
                    <table class="table table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th class="no-print">COSTO UNITARIO</th>
                            <th>PRECIO UNITARIO</th>
                            <th>CANTIDAD</th>
                            <th>TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td class="money no-print">{{ $product->cost }}</td>
                                <td class="money">{{ $product->pivot->price }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td class="money">{{ $product->pivot->quantity * $product->pivot->price }}</td>
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
            <div class="col-xs-5 pull-right">

                <div class="form-group">

                    <table class="table">
                        <br>
                        @if($order->discount > 0)
                            <tr>
                                <td>Descuento:</td>
                                <td><b>{{$order->discount}} %</b></td>
                            </tr>
                        @endif
                        <tr>
                            <td>Neto:</td>
                            <td><b class="money">{{ $order->neto }} </b></td>
                        </tr>
                        <tr>
                            <td>Iva:</td>
                            <td><b class="money">{{ $order->iva }}</b></td>
                        </tr>
                        <tr>
                            <th><h4>Total:</h4></th>
                            <td>
                                <h4><b class="money">{{ $order->total }}</b></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-3 no-print">
                <h3>Ganancias:</h3>
                <h4 class="text-info bg-info">Total: <span class="money">{{$order->total}}</span></h4>
                <h4 class="text-danger bg-danger">Costo total: <span class="money">{{$order->total_cost}}</span></h4>
                <h4 class="text-success bg-success">Ganancia: <span class="money">{{$order->total - $order->total_cost}}</span></h4>
            </div>

        </div>
        <!-- /.row -->
        <div class="row text-center no-print">
            {!! Form::open(['route' => 'print-work-paper', 'method' => 'POST', 'class' => 'pull-left']) !!}
            {!! Form::hidden('id', $order->id, ['class' => 'form-control']) !!}
            <button type="submit" class="btn btn-primary" id="print" title="Hoja de trabajo">Hoja de trabajo
                <i class="glyphicon glyphicon-file"></i>
            </button>
            {!! Form::close() !!}
            <a class="btn btn-info" title="Editar Orden" href="{{ route('orders.edit',$order->id)}}">Editar Orden
                <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
            </a>
            <button type="button" class="btn btn-success printer" id="print" title="Imprimir Boleta">Imprimir Boleta
                <i class="glyphicon glyphicon-print"></i>
            </button>
            <a class="btn btn-danger" href="{{ route('orders.index')}}" title="Volver">
                Volver al listado
                <i class="glyphicon glyphicon-backward"></i>
            </a>
            <a class="btn btn-info" href="{{ route('email-order', $order->id)}}" title="Enviar al mail">
                Enviar al mail
                <i class="glyphicon glyphicon-send"></i>
            </a>
            <div class="pull-right">
                <a class="btn btn-warning" title="Duplicar Orden"
                   href="{{ route('duplicate-select-client',$order->id)}}">Duplicar Orden
                    <i class="glyphicon glyphicon-duplicate" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-xs-11">

                <p class="FontSmall text-right pull-right">
                    Servicio Automotriz Automec Limitada. Rut: 76.525.647-K
                    <br>
                    C.Corriente 70541017, Banco Santander.
                </p>

            </div>
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
