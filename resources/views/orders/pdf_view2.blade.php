@extends('layouts.email')

@if($order->status == 'budget')
    @section('title', 'PRESUPUESTO')
@endif
@if($order->status != 'budget')
    @section('title', 'BOLETA')
@endif

@section('contenido')
    <section class="content-header">
        <h1>
            Orden Nr. #0{{$order->id }} - {{$order->title }}
        </h1>
    </section>

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                @include('common.errors')
                <h3 class="page-header">
                    <img alt="User Image" src="{{ asset ('images/logo.png') }}">
                </h3>

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
                    <b>Email: </b>pagos@automec.cl
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
                    <h4>Servicios</h4>
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
                        <tr>
                            <td colspan="2" class="text-right"><strong>Total:</strong></td>
                            <td class="money">{{$total_services}}</td>
                        </tr>
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
                <h4>Productos</h4>
                @if(count($order->products)>0)
                    <table class="table table-striped table-condensed">
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
                                <td>{{ $product->name }}</td>

                                <td class="money">{{ $product->pivot->price }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td class="money">{{ $product->pivot->quantity * $product->pivot->price }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif
                @if($cells != '')
                    <table class="table table-striped table-condensed" id="example">
                        <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th>PRECIO UNITARIO</th>
                            <th>CANTIDAD</th>
                            <th>TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                @endif
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
            @php($sum = count($order->products)+count($order->services))
            @if($sum == 10 || $sum == 11 || $sum == 12 || $sum == 13)
                <br><br>
                <br><br>
                <br><br>
                <br><br>
            @endif
        <!-- accepted payments column -->
            @if($order->observations != '')
                <br><br>
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

                        @if($order->discount > 0)
                            <br><br>
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

        </div>


        <br>
        <div class="row">
            <div class="col-xs-11">

                <p class="text-right pull-right">
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

        $(document).ready(function () {
            var dataSet = [
                {!! $cells!!}
            ];

            $('#example').DataTable({
                data: dataSet,
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false,
                "columnDefs": [
                    {"width": "28%", "targets": 0},
                    {"width": "24%", "targets": 1},
                    {"width": "16%", "targets": 2},
                    {"width": "32%", "targets": 3}
                ]
            });
        });

    </script>
@endsection
