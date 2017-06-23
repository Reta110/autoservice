<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Título</label>

                        <div class="col-sm-10">
                            {{ $order->title }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @include('orders.partials.clients-data-show')
            @include('orders.partials.vehicle-data-show')
        </div>

    </div>

    <div class="box-bodys">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Servicios</h3>
                    </div>
                    <div class="contacts">

                        <table class="table">
                            <tr>
                                <th>Nombre del servicio</th>
                                <th>HH</th>
                                <th>Precio</th>
                            </tr>
                            @foreach($order->services as $service)
                                <tr>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->hh}}</td>
                                    <td>{{$service->hh * $config->price_hh }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Productos</h3>
                    </div>
                    <div class="contacts">
                        <table class="table">
                            <tr>
                                <th>Nombre del prodcuto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                            @foreach($order->products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->pivot->price}}</td>
                                    <td>{{$product->pivot->quantity}}</td>
                                    <td>{{$product->pivot->price * $product->pivot->quantity}}</td>

                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right">Costos Totales</td>
                                <td>{{$order->total_cost }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 pull-right">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Total</h3>
            </div>
            <div class="form-group">


                <div class="col-sm-10">
                    <strong>Neto:</strong>
                    {{$order->neto}}
                </div>

            </div>
            <div class="form-group">


                <div class="col-sm-10">
                    <strong>Iva:</strong>
                    {{$order->iva}}
                </div>

            </div>
            <div class="form-group">


                <div class="col-sm-10">
                    <strong>Total:</strong>
                    {{$order->total}}
                </div>

            </div>

        </div>
    </div>
</div>

