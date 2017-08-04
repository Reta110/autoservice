<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Título</label>

                        <div class="col-sm-10">
                            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Titulo', 'required' => 'true']) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @include('orders.partials.clients-data')
            @include('orders.partials.vehicle-data')
        </div>
    </div>

    <div class="box-bodys">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Servicios</h3>
                        <div class="pull-right">
                            <div class="col-md-5">
                                <fieldset>
                                    <label>Precio HH</label>
                                    {!! Form::text('hh', $order->hh, ['class' => 'form-control order_hh', 'id' => 'hh', 'placeholder' => 'HH']) !!}
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                <label>Total HH</label>
                                {!! Form::text('total_hh', 0, ['class' => 'form-control total_hh', 'placeholder' => 'Total HH', 'disabled' => 'true']) !!}
                            </div>
                            @if($order->status != 'ended')
                                <div class="col-md-2">
                                    <label> </label>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#myServiceModal">
                                        Nuevo Servicio
                                    </button>
                                    <div class="service-saved">
                                        <p class="info no-print text-success">Guardado!!</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="contacts">

                        @foreach($order->services as $oservice)

                            <div class="form-group multiple-form-group2 input-group">
                                <div class="col-md-6">
                                    <label>Servicio</label>

                                    <div class="input-group-btn input-group-select">
                                        <div class="form-group">
                                            @if($order->status != 'ended')
                                                {!! Form::select('service_id[]', $services, $oservice->id, ['class' => 'form-control select-service', 'placeholder' => '--- Indique servicio ---']) !!}
                                            @else
                                                {!! Form::select('service_id[]', $services, $oservice->id, ['class' => 'form-control select-service', 'placeholder' => '--- Indique servicio ---', 'readonly' => 'true']) !!}
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2">
                                    <label>Horas</label>
                                    @if($order->status != 'ended')
                                        {!! Form::text('service_hh[]', $oservice->pivot->hh, ['class' => 'form-control hh-service', 'placeholder' => 'Horas']) !!}
                                    @else
                                        {!! Form::text('service_hh[]', $oservice->pivot->hh, ['class' => 'form-control hh-service', 'placeholder' => 'Horas', 'readonly' => 'true']) !!}
                                    @endif
                                </div>
                                @if($order->status != 'ended')
                                    <div class="col-md-2">
                                        <label> - </label>
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-remove2">-</button>
                                    </span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        @if($order->status != 'ended')
                            <div class="form-group multiple-form-group2 input-group">
                                <div class="col-md-6">
                                    <label>Servicio</label>

                                    <div class="input-group-btn input-group-select">
                                        <div class="form-group">
                                            @if($order->status != 'ended')
                                                {!! Form::select('service_id[]', $services, null, ['class' => 'form-control select-service', 'placeholder' => '--- Indique servicio ---']) !!}
                                            @else
                                                {!! Form::select('service_id[]', $services, null, ['class' => 'form-control select-service', 'placeholder' => '--- Indique servicio ---', 'disabled' => 'true']) !!}
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2">
                                    <label>Horas</label>
                                    {!! Form::text('service_hh[]', null, ['class' => 'form-control hh-service', 'placeholder' => 'Horas']) !!}

                                </div>
                                <div class="col-md-2">
                                    <label> - </label>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-add2">+</button>
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Productos y cantidad</h3>
                        <div class="pull-right">
                            @if(count($recommended) > 0)
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#myProductRecommendeModal">
                                    Recomendados
                                </button>
                            @endif
                            @if($order->status != 'ended')
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#myProductModal">
                                    Nuevo
                                </button>
                                <div class="product-saved">
                                    <p class="info no-print text-success">Guardado!!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="contacts">

                        @foreach($order->products as $oproduct)

                            <div class="form-group multiple-form-group input-group">
                                <div class="col-md-3">
                                    <label>Producto</label>
                                    <div class="input-group-btn input-group-select">
                                        <div class="form-group">

                                            {!! Form::hidden('product_id[]', $oproduct->id, ['class' => 'form-control producto-id']) !!}
                                            <span class="has-success has-feedback">
                                                @if($order->status != 'ended')
                                                    {!! Form::text('product_code',$oproduct->code, ['class' => 'form-control input-code inputSuccess', 'placeholder' => 'Código / serial:']) !!}
                                                @else
                                                    {!! Form::text('product_code',$oproduct->code, ['class' => 'form-control input-code inputSuccess', 'placeholder' => 'Código / serial:', 'disabled' => 'true']) !!}
                                                @endif
                                            </span>
                                            <span class="help-block">Help block with success</span>
                                            <hr>
                                            @if($order->status != 'ended')
                                                {!! Form::select('product_category[]', $categories, $oproduct->category_id, ['class' => 'form-control select-category', 'placeholder' => '--- Categoria ---']) !!}
                                            @else
                                                {!! Form::select('product_category[]', $categories, $oproduct->category_id, ['class' => 'form-control select-category', 'placeholder' => '--- Categoria ---','disabled'=>'true']) !!}
                                            @endif
                                        </div>
                                        <div class="form-group">

                                            <select class="form-control select-brand" name="product_brand[]"
                                                    @if($order->status == 'ended') disabled="disabled" @endif>
                                                <option selected="selected"
                                                        hidden="hidden"
                                                        value=""> ---------
                                                </option>
                                                @foreach($marcas as $marca)
                                                    <option value="{{$marca}}"
                                                            @if($marca == $oproduct->brand) selected="selected" @endif>{{$marca}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control select-model" name="product_model[]"
                                                    @if($order->status == 'ended') disabled="disabled" @endif>
                                                <option selected="selected" disabled="disabled" hidden="hidden"
                                                        value=""> ---------
                                                </option>
                                                @foreach($modelos as $modelo)
                                                    <option value="{{$modelo}}"
                                                            @if($modelo == $oproduct->model) selected="selected" @endif>{{$modelo}}</option>
                                                @endforeach
                                            </select>
                                            {{--{!! Form::select('product_model[]',$modelos , $oproduct->model, ['class' => 'form-control select-model ', 'placeholder' => '--- Modelo---']) !!}--}}
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Costo</label>
                                    {!! Form::text('product_cost[]', $oproduct->cost, ['class' => 'form-control producto-cost', 'placeholder' => 'costo', 'disabled' => 'true']) !!}
                                </div>
                                <div class="col-md-2">
                                    <label>Precio</label>
                                    {!! Form::text('product_price[]', $oproduct->pivot->price, ['class' => 'form-control producto-price', 'placeholder' => 'precio']) !!}
                                </div>
                                <div class="col-md-2">
                                    <label>Stock</label>
                                    {!! Form::text('stock[]', $oproduct->stock, ['class' => 'form-control producto-stock', 'placeholder' => 'stock', 'disabled' => 'true']) !!}
                                </div>
                                <div class="col-md-2">
                                    <label>Cantidad</label>
                                    @if($order->status != 'ended')
                                        {!! Form::text('product_quantity[]', $oproduct->pivot->quantity, ['class' => 'form-control producto-quantity', 'placeholder' => 'cantidad']) !!}
                                    @else
                                        {!! Form::text('product_quantity[]', $oproduct->pivot->quantity, ['class' => 'form-control producto-quantity', 'placeholder' => 'cantidad', 'readonly' => 'true']) !!}
                                    @endif
                                </div>
                                <div class="col-md-1">
                                    @if($order->status != 'ended')
                                        <label> - </label>
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-remove">-</button>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        @if($order->status != 'ended')
                            <div class="form-group multiple-form-group input-group">
                                <div class="col-md-3">
                                    <label>Producto</label>
                                    <div class="input-group-btn input-group-select">

                                        <div class="form-group">
                                            {!! Form::hidden('product_id[]', null, ['class' => 'form-control producto-id']) !!}
                                            <span class="has-success has-feedback">
                                        {!! Form::text('product_code',null, ['class' => 'form-control input-code inputSuccess', 'placeholder' => 'Código / serial:']) !!}
                                        </span>
                                            <span class="help-block">Help block with success</span>
                                            <hr>
                                            {!! Form::select('product_category[]', $categories, null, ['class' => 'form-control select-category', 'placeholder' => '--------']) !!}
                                            {!! Form::select('product_brand[]', $marcas, null, ['class' => 'form-control select-brand', 'placeholder' => '---------']) !!}
                                            {!! Form::select('product_model[]', $modelos, null, ['class' => 'form-control select-model', 'placeholder' => '---------']) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Costo</label>
                                    {!! Form::text('product_cost[]', null, ['class' => 'form-control producto-cost', 'placeholder' => 'costo', 'disabled' => 'true']) !!}
                                </div>
                                <div class="col-md-2">
                                    <label>Precio</label>
                                    {!! Form::hidden('product_cost[]', null, ['class' => 'form-control producto-cost', 'placeholder' => 'costo']) !!}
                                    {!! Form::text('product_price[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio']) !!}
                                </div>
                                <div class="col-md-2">
                                    <label>Stock</label>
                                    {!! Form::text('stock[]', null, ['class' => 'form-control producto-stock', 'placeholder' => 'stock', 'disabled' => 'true']) !!}
                                </div>
                                <div class="col-md-2">
                                    <label>Cantidad</label>
                                    {!! Form::text('product_quantity[]', null, ['class' => 'form-control producto-quantity', 'placeholder' => 'cantidad']) !!}
                                </div>
                                <div class="col-md-1">
                                    @if($order->status != 'ended')
                                        <label> - </label>
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-add">+</button>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">Denominación</div>
                    <div class="col-md-1 text-center">$ Precio</div>
                    <div class="col-md-1 text-center">Cantidad</div>
                    <div class="col-md-1 text-center">$ Total</div>
                    <div class="col-md-4 text-center"></div>

                </div>
                {{--- Tabla ---}}
                <div id="t1">

                </div>
                <div class="col-md-3 col-lg-offset-7">
                    <label for="total_express">Total</label>
                    {!! Form::text('total_express', null, ['class' => 'form-control total_express', 'placeholder' => 'Total productos express']) !!}
                </div>
                {!! Form::hidden('express_products', null, ['class' => 'form-control express_products']) !!}
                {{--- Fin Tabla ---}}
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header">
                        <label>Observaciones de Boleta:</label>
                        <div class="form-group">

                            {!! Form::textarea('observations', null, ['class' => 'form-control', 'placeholder' => 'Observaciones', 'rows' => '4']) !!}

                        </div>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <label>Observaciones de OT:</label>
                        <div class="form-group">

                            {!! Form::textarea('ot_observations', null, ['class' => 'form-control', 'placeholder' => 'Observaciones de OT', 'rows' => '4']) !!}

                        </div>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Estatus</label>

                            <div class="col-sm-10">
                                @if($order->status != 'ended')
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="budget" class="status"
                                               @if($order->status == 'budget')checked="true" @endif>Presupuesto
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="started" class="status"
                                               @if($order->status == 'started')checked="true" @endif>Iniciado
                                    </label>
                                @endif
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="ended" class="status"
                                           @if($order->status == 'ended')checked="true" @endif>Finalizado
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="box-header">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Pagado</label>

                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="paid" class='paid' value="no"
                                           @if($order->paid == 'no') checked @endif>No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="paid" class='paid' value="si"
                                           @if($order->paid == 'si') checked @endif>Si
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="order_paid">
                        <div class="box-header">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Forma de pago:</label>
                                <div class="col-sm-6">
                                    <select class="form-control select2 type_pay" name="type_pay"
                                            @if($order->type_pay == '') selected="selected" @endif>
                                        <option value="">---
                                            Tipo de pago ---
                                        </option>
                                        <option value="TransBank"
                                                @if($order->type_pay == 'TransBank') selected="selected" @endif>
                                            TransBank
                                        </option>
                                        <option value="Transferencia"
                                                @if($order->type_pay == 'Transferencia') selected="selected" @endif>
                                            Transferencia
                                        </option>
                                        <option value="Efectivo"
                                                @if($order->type_pay == 'Efectivo') selected="selected" @endif>
                                            Efectivo
                                        </option>
                                        <option value="Cheque"
                                                @if($order->type_pay == 'Cheque') selected="selected" @endif>
                                            Cheque
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-header" id="card_type">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Tipo de tarjeta</label>

                                <div class="col-sm-8">
                                    <label class="radio-inline">
                                        <input type="radio" name="card_type" value="debito"
                                               @if($order->card_type == 'Debito') checked @endif>Debito
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="card_type" value="credito"
                                               @if($order->card_type == 'Credito') checked @endif>Crédito
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="box-header">
                            <div class="form-group " style="visibility: false">
                                <label for="inputEmail3" class="col-sm-4 control-label">Nro de cuotas:</label>
                                <div class="col-sm-6">
                                    <select class="form-control select2" name="pay_fees_quantity">
                                        <option selected="selected" value="0">--- Nro de cuota ---</option>
                                        <option value="1"
                                                @if($order->pay_feeds_quantity == '1') selected="selected" @endif>
                                            1
                                        </option>
                                        <option value="2"
                                                @if($order->pay_feeds_quantity == '2') selected="selected" @endif>
                                            2
                                        </option>
                                        <option value="3"
                                                @if($order->pay_feeds_quantity == '3') selected="selected" @endif>
                                            3
                                        </option>
                                        <option value="4"
                                                @if($order->pay_feeds_quantity == '4') selected="selected" @endif>
                                            4
                                        </option>
                                        <option value="5"
                                                @if($order->pay_feeds_quantity == '5') selected="selected" @endif>
                                            5
                                        </option>
                                        <option value="6"
                                                @if($order->pay_feeds_quantity == '6') selected="selected" @endif>
                                            6
                                        </option>
                                        <option value="7"
                                                @if($order->pay_feeds_quantity == '7') selected="selected" @endif>
                                            7
                                        </option>
                                        <option value="8"
                                                @if($order->pay_feeds_quantity == '8') selected="selected" @endif>
                                            8
                                        </option>
                                        <option value="9"
                                                @if($order->pay_feeds_quantity == '9') selected="selected" @endif>
                                            9
                                        </option>
                                        <option value="10"
                                                @if($order->pay_feeds_quantity == '10') selected="selected" @endif>10
                                        </option>
                                        <option value="11"
                                                @if($order->pay_feeds_quantity == '11') selected="selected" @endif>11
                                        </option>
                                        <option value="12"
                                                @if($order->pay_feeds_quantity == '12') selected="selected" @endif>12
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-header">
                            <label>Observación de Pago:</label>
                            <div class="form-group">

                                {!! Form::textarea('pay_observations', null, ['class' => 'form-control', 'placeholder' => 'Observaciones', 'rows' => '2']) !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pull-right">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Total</h3>
                    </div>
                    <p class="text-right">
                        {!! Form::hidden('total_cost', null, ['class' => 'form-control costo_total', 'placeholder' => 'Costo']) !!}
                    </p>
                    <p class="text-right">
                        <label>Descuento</label>
                        {!! Form::text('discount', $order->discount, ['class' => 'form-control discount', 'placeholder' => 'Descuento']) !!}
                    </p>
                    <p class="text-right">
                        <label>Neto</label>
                        {!! Form::text('neto_show', null, ['class' => 'form-control neto', 'placeholder' => 'Neto', 'disabled' => 'true']) !!}
                        {!! Form::hidden('neto', null, ['class' => 'form-control neto', 'placeholder' => 'Neto']) !!}
                    </p>
                    <p class="text-right">
                        <label>Iva</label>
                        {!! Form::text('iva_show', null, ['class' => 'form-control iva', 'placeholder' => 'Iva', 'disabled' => 'true']) !!}
                        {!! Form::hidden('iva', null, ['class' => 'form-control iva', 'placeholder' => 'Neto']) !!}

                    </p>
                    <p class="text-right">
                        <label>Total</label>
                        {!! Form::text('total_show', null, ['class' => 'form-control total', 'placeholder' => 'Total', 'disabled' => 'true']) !!}
                        {!! Form::hidden('total', null, ['class' => 'form-control total', 'placeholder' => 'Neto']) !!}

                    </p>
                </div>
            </div>

        </div>
    </div>
</div>


@section('js')
    <link href="{{asset('AdminLTE/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css')}}" rel="stylesheet">

    <script type="text/javascript"
            src="{{asset('AdminLTE/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js')}}"></script>

    <script type="text/javascript"
            src="http://www.jqueryscript.net/demo/Excel-Like-jQuery-Data-Table-Plugin-xTab/xtab.js"></script>
    <link rel="stylesheet" href="http://www.jqueryscript.net/demo/Excel-Like-jQuery-Data-Table-Plugin-xTab/xtab.css"/>

    <script type="text/javascript">
        //Table xtab jquery
        $("#t1").xtab("init", {
            rows: 10,
            cols: 4,
            headers: true,
            width: [450, 100, 100, 100],
            values: [{!! $cells !!}],
        });
        $(document).on('change', '#t1 td', function () {
            console.log($('#t1').xtab("get"))
            $(".express_products").val($('#t1').xtab("get"))
        });
        //Fin table xtab jquery

        //super global
        var prod = {!! $prod !!};
        var serv = {!! $serv !!}

                //Modal para editar vehicle sin salir
                $("#modal-edit-vehicle-form").submit(function (event) {
                    event.preventDefault(); //prevent default action
                    console.log('actualizando vehiculo');

                    var token = $("input[name='_token']").val();
                    var brand = $(this).closest('#myEditVehicleModal').find('.brand').val();
                    var model = $(this).closest('#myEditVehicleModal').find('.model').val();
                    var vin = $(this).closest('#myEditVehicleModal').find('.vin').val();
                    var year = $(this).closest('#myEditVehicleModal').find('.year').val();
                    var motor = $(this).closest('#myEditVehicleModal').find('.motor').val();
                    var patente = $(this).closest('#myEditVehicleModal').find('.patente').val();

                    $.ajax({
                        url: "{{route('vehicles.update', $vehicle)}}",
                        method: 'PUT',
                        data: {
                            _token: token,
                            "brand": brand,
                            "model": model,
                            "vin": vin,
                            "year": year,
                            "motor": motor,
                            "patente": patente,
                        },
                        success: function (data) {
                            console.log('Success');

                            vehicle = JSON.parse(data.vehicle)

                            $('#partial-vehicle-data .brand').val(vehicle.brand);
                            $('#partial-vehicle-data .model').val(vehicle.model);
                            $('#partial-vehicle-data .vin').val(vehicle.vin);
                            $('#partial-vehicle-data .year').val(vehicle.year);
                            $('#partial-vehicle-data .motor').val(vehicle.motor);
                            $('#partial-vehicle-data .patente').val(vehicle.patente);
                        }
                    });

                    console.log('DONE');
                    $('#modal-edit-vehicle-form').modal('hide');
                    $('.close-modal').click();
                    $('.edit-vehicle-saved').fadeIn(2000, function () {
                        $('.edit-vehicle-saved').fadeOut(1000);
                    });

                });

        //Modal para editar client sin salir
        $("#modal-edit-client-form").submit(function (event) {
            event.preventDefault(); //prevent default action
            console.log('actualizando client');

            var token = $("input[name='_token']").val();
            var name = $(this).closest('#myEditClientModal').find('.name').val();
            var last_name = $(this).closest('#myEditClientModal').find('.last_name').val();
            var email = $(this).closest('#myEditClientModal').find('.email').val();
            var rut = $(this).closest('#myEditClientModal').find('.rut').val();
            var phone = $(this).closest('#myEditClientModal').find('.phone').val();
            var address = $(this).closest('#myEditClientModal').find('.address').val();

            $.ajax({
                url: "{{route('clients.update', $client)}}",
                method: 'PUT',
                data: {
                    _token: token,
                    "name": name,
                    "last_name": last_name,
                    "email": email,
                    "rut": rut,
                    "phone": phone,
                    "address": address,
                },
                success: function (data) {
                    console.log('Success');

                    client = JSON.parse(data.client)

                    $('#partial-client-data .name').val(client.name);
                    $('#partial-client-data .last_name').val(client.last_name);
                    $('#partial-client-data .email').val(client.email);
                    $('#partial-client-data .rut').val(client.rut);
                    $('#partial-client-data .phone').val(client.phone);
                    $('#partial-client-data .address').val(client.address);
                }
            });

            console.log('DONE');
            $('#modal-edit-client-form').modal('hide');
            $('.close-modal').click();
            $('.edit-client-saved').fadeIn(2000, function () {
                $('.edit-client-saved').fadeOut(1000);
            });

        });

        //Modal para agregar productos sin salir
        $("#modal-form").submit(function (event) {
            event.preventDefault(); //prevent default action
            console.log('intento 2');

            var token = $("input[name='_token']").val();
            var code = $(this).closest('#myProductModal').find('.code').val();
            var name = $(this).closest('#myProductModal').find('.name').val();
            var cost = $(this).closest('#myProductModal').find('.cost').val();
            var price = $(this).closest('#myProductModal').find('.price').val();
            var brand = $(this).closest('#myProductModal').find('.brand').val();
            var model = $(this).closest('#myProductModal').find('.model').val();
            var stock = $(this).closest('#myProductModal').find('.stock').val();
            var stock_minimum = $(this).closest('#myProductModal').find('.stock_minimum').val();
            var category_id = $(this).closest('#myProductModal').find('.category_id').val();
            var tags = $(this).closest('#myProductModal').find('.tags').val();

            $.ajax({
                url: "{{route('products.store')}}",
                method: 'POST',
                data: {
                    _token: token,
                    "code": code,
                    "name": name,
                    "cost": cost,
                    "price": price,
                    "brand": brand,
                    "model": model,
                    "stock": stock,
                    "stock_minimum": stock_minimum,
                    "category_id": category_id,
                    "tags": tags
                },
                success: function (data) {
                    prod = JSON.parse(data.prod);
                }
            });

            console.log('DONE');
            $('#modal-form').trigger("reset");
            $('#modal-form').modal('hide');

            $('.close-modal').click();
            $('.product-saved').fadeIn(2000, function () {
                $('.product-saved').fadeOut(1000);
            });
        });

        //Fin Modal para agregar productos sin salir

        //Modal para agregar servicios sin salir
        $("#modal-form-service").submit(function (event) {
            event.preventDefault(); //prevent default action
            console.log('service ajax');

            var token = $("input[name='_token']").val();
            var code = $(this).closest('#myServiceModal').find('.code').val();
            var name = $(this).closest('#myServiceModal').find('.name').val();
            var hh = $(this).closest('#myServiceModal').find('.hh').val();
            var description = $(this).closest('#myServiceModal').find('.description').val();

            $.ajax({
                url: "{{route('services.store')}}",
                method: 'POST',
                data: {
                    _token: token,
                    "code": code,
                    "name": name,
                    "hh": hh,
                    "description": description,
                },
                success: function (data) {
                    serv = JSON.parse(data.servi);
                    $('.select-service').last().html(data.serv)
                    console.log("suucees bro")
                }
            });

            console.log('DONE');
            //$('#modal-form').trigger("reset");
            $('#modal-form').modal('hide');
            $('.close-modal').click();
            $('.service-saved').fadeIn(2000, function () {
                $('.service-saved').fadeOut(1000);
            });
        });

        //Fin Modal para agregar servicios sin salir

        //SERVICES (Lista dinamica)
        (function ($) {
            $(function () {
                var addFormGroup2 = function (event) {
                    event.preventDefault();
                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group2');
                    var $formGroupClone = $formGroup.clone();
                    $(this)
                            .toggleClass('btn-success btn-add2 btn-danger btn-remove2')
                            .html('–');
                    $formGroupClone.find('input').val('');
                    $formGroupClone.find('.product_id').text('Seleccione');
                    $formGroupClone.insertAfter($formGroup);
                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add2').attr('disabled', true);
                    }

                    calculate();

                };
                var removeFormGroup2 = function (event) {
                    event.preventDefault();
                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group2');
                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add2').attr('disabled', false);
                    }
                    $formGroup.remove();

                    calculate();
                };
                var selectFormGroup2 = function (event) {
                    event.preventDefault();
                    var $selectGroup = $(this).closest('.input-group-select');
                    var param = $(this).attr("href").replace("#", "");
                    var concept = $(this).text();
                    $selectGroup.find('.concept').text(concept);
                    $selectGroup.find('.input-group-select-val').val(param);
                }
                var countFormGroup = function ($form) {
                    return $form.find('.form-group').length;
                };
                $(document).on('click', '.btn-add2', addFormGroup2);
                $(document).on('click', '.btn-remove2', removeFormGroup2);
                $(document).on('click', '.dropdown-menu a', selectFormGroup2);
            });
        })(jQuery);

        //Fin SERVICES

        //Si cambian el precio hora de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.order_hh', function () {
            calculate()
        });
        //Si cambian el status de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.status', function () {
            //cambia el estoad e los radios
            $('input[name=status]').mouseup(function () {
            }).change(function () {
            })
            //Fin cambia el estoad e los radios

            calculate()
        });
        //Si cambian el total de los productos express, se calculan los numeros nuevamente
        $(document).on('change', '.total_express', function () {
            calculate()
        });

        //Si cambian el tipo de pago se muetra el div de tipo de tarjeta
        $(document).on('change', '.type_pay', function () {

            if ($('.type_pay').val() == 'TransBank') {
                $('#card_type').fadeIn(1000, function () {
                });
            } else {
                $('#card_type').fadeOut(500);
            }

        });

        //Si pagaron se muetra el div con datos para el pago
        $(document).on('change', '.paid', function () {

            $('input[name=paid]').mouseup(function () {
            }).change(function () {
            })

            if ($("input[name='paid']:checked").val() == 'si') {
                $('#order_paid').fadeIn(1000, function () {
                });
            } else {
                $('#order_paid').fadeOut(500);
            }

        });

        //Si cambian el discount de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.discount', function () {
            calculate()
        });
        //Si cambian el alguna hora de algun servicio de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.hh-service', function () {
            calculate()
        });
        //Si cambian el precio de algun producto de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.producto-price', function () {
            calculate()
        });
        //Si cambian la cantidad de algun producto de la orden, se calculan los numeros nuevamente
        $(document).on('change', '.producto-quantity', function () {
            calculate()

        });

        //PRODUCTS (lista dinamica)
        (function ($) {
            $(function () {
                var addFormGroup = function (event) {
                    event.preventDefault();
                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                    var $formGroupClone = $formGroup.clone();
                    $(this)
                            .toggleClass('btn-success btn-add btn-danger btn-remove')
                            .html('–');
                    $formGroupClone.find('input').val('');
                    $formGroupClone.find('.product_id').text('Seleccione');
                    $formGroupClone.insertAfter($formGroup);
                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add').attr('disabled', true);
                    }

                    //Llamar calculate y costos cuando se elimina producto
                    calculate();
                    calcular_total_costos()

                    var idproduct = $(this).closest('.multiple-form-group').find('.select-product').val();
                    var quantity = $(this).closest('.multiple-form-group').find('.producto-quantity').val();
                    //remove_product_ajax(idproduct, quantity);

                    //fin

                };
                var removeFormGroup = function (event) {
                    event.preventDefault();
                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                    }
                    $formGroup.remove();

                    //Llamar calculate y costos cuando se elimina producto
                    calculate();
                    calcular_total_costos()

                    var idproduct = $(this).closest('.multiple-form-group').find('.select-product').val();
                    var quantity = $(this).closest('.multiple-form-group').find('.producto-quantity').val();
                    //add_product_ajax(idproduct, quantity);

                    //fin
                };
                var selectFormGroup = function (event) {
                    event.preventDefault();
                    var $selectGroup = $(this).closest('.input-group-select');
                    var param = $(this).attr("href").replace("#", "");
                    var concept = $(this).text();
                    $selectGroup.find('.concept').text(concept);
                    $selectGroup.find('.input-group-select-val').val(param);
                }
                var countFormGroup = function ($form) {
                    return $form.find('.form-group').length;
                };
                $(document).on('click', '.btn-add', addFormGroup);
                $(document).on('click', '.btn-remove', removeFormGroup);
                $(document).on('click', '.dropdown-menu a', selectFormGroup);
            });
        })(jQuery);
        //Fin PRODUCTS

        //Colocar precio hora en servicio
        $(document).on('change', '.select-service', function () {
            var id = $(this).val();
            var myArray = serv;

            var found = $.map(myArray, function (val) {
                return val.id == id ? val.hh : null;
            });

            $(this).closest('.multiple-form-group2').find('.hh-service').val(found[0]);

            console.log(found[0]);

        });
        //Fin Colocar precio hora en servicio

        //Buscar las marcas y modelos cuando se cambia la categoria
        $(document).on('change', '.select-category', function () {
            var id = $(this).val();
            console.log('id=' + id);
            var token = $("input[name='_token']").val();
            console.log('token=' + token);
            var thisi = $(this);
            $.ajax({
                url: "{{route('select-brands-ajax')}}",
                method: 'POST',
                data: {id: id, _token: token},
                success: function (data) {
                    console.log("suucees category")
                    thisi.closest('.multiple-form-group').find('.select-brand').html('');
                    thisi.closest('.multiple-form-group').find('.select-brand').html(data.options);
                }
            });
        });
        //Fin bscar las marcas y modelos cuando se cambia la categoria

        {{--// Buscar los modelos cuando cambie la marca--}}
        $(document).on('change', '.select-brand', function () {
            var thisa = $(this);
            var brand = $(this).closest('.multiple-form-group').find('.select-brand option:selected').html();
            console.log('brand=' + brand);
            var id = $(this).closest('.multiple-form-group').find('.select-category').val();
            console.log('id=' + id);
            var token = $("input[name='_token']").val();
            console.log('token=' + token);

            $.ajax({
                url: "{{route('select-models-ajax')}}",
                method: 'POST',
                data: {id: id, brand: brand, _token: token},
                success: function (data) {
                    console.log("suucees bro3")
                    thisa.closest('.multiple-form-group').find('.select-model').html('');
                    thisa.closest('.multiple-form-group').find('.select-model').html(data.options);
                }
            });
        });
        //Fin buscar los modelos cuando cambie el producto

        //Colocar precio, costo y stock de los productos en los fields
        $(document).on('change', '.select-model', function () {

            var cat = $(this).closest('.multiple-form-group').find('.select-category option:selected').val();
            var brand = $(this).closest('.multiple-form-group').find('.select-brand option:selected').html();
            var model = $(this).closest('.multiple-form-group').find('.select-model option:selected').html();

            console.log('cat product=' + cat);
            console.log('brand product=' + brand);
            console.log('model product=' + model);
            var myArray = prod;

            var found = $.map(myArray, function (val) {
                return (val.category_id == cat && val.brand == brand && val.model == model) ? val.price : null;
            });

            var stock = $.map(myArray, function (val) {
                return (val.category_id == cat && val.brand == brand && val.model == model) ? val.stock : null;
            });

            var cost = $.map(myArray, function (val) {
                return (val.category_id == cat && val.brand == brand && val.model == model) ? val.cost : null;
            });

            var id = $.map(myArray, function (val) {
                return (val.category_id == cat && val.brand == brand && val.model == model) ? val.id : null;
            });

            $(this).closest('.multiple-form-group').find('.producto-price').val(found[0]);
            $(this).closest('.multiple-form-group').find('.producto-stock').val(stock[0]);
            $(this).closest('.multiple-form-group').find('.producto-cost').val(cost[0]);
            $(this).closest('.multiple-form-group').find('.producto-id').val(id[0]);

            console.log(found[0]);

        });

        //Colocar los campos mediante el codigo
        $(document).on('change', '.input-code', function () {

            var code = $(this).closest('.multiple-form-group').find('.input-code').val();
            console.log('code product=' + code);
            var myArray = prod;

            var found = $.map(myArray, function (val) {
                return (val.code == code) ? val.price : null;
            });

            var stock = $.map(myArray, function (val) {
                return (val.code == code) ? val.stock : null;
            });

            var cost = $.map(myArray, function (val) {
                return (val.code == code) ? val.cost : null;
            });

            var id = $.map(myArray, function (val) {
                return (val.code == code) ? val.id : null;
            });

            var category_id = $.map(myArray, function (val) {
                return (val.code == code) ? val.category_id : null;
            });

            $(this).closest('.multiple-form-group').find('.producto-price').val(found[0]);
            $(this).closest('.multiple-form-group').find('.producto-stock').val(stock[0]);
            $(this).closest('.multiple-form-group').find('.producto-cost').val(cost[0]);
            $(this).closest('.multiple-form-group').find('.producto-id').val(id[0]);
            $(this).closest('.multiple-form-group').find('.select-category option[value=' + category_id + ']').attr("selected", true);

            console.log(found[0]);

        });

        //Fin colocar los campos mediante el codigo


        //Caluclar total de los productos
        //$(document).on('click', '.btn-add', calculate);
        //$(document).on('click', '.btn-remove', calculate);

        function calcular_total_producto() {

            productos_total = 0

            $(".producto-price").each(
                    function (index, value) {
                        if (eval($(this).val() != '')) {
                            productos_total = productos_total + (eval($(this).val()) * eval($(this).closest('.multiple-form-group').find('.producto-quantity').val()));
                        }
                    }
            );

            console.log($("input[name='status']:checked").val())
            //Si status  es presupuesto vamos a meter en la cuenta lo de total express
//            if ($(".status:checked").val() == 'budget') {
                if ($(".total_express").val() != '') {
                    productos_total = productos_total + eval($(".total_express").val());
                }
//            }
            //Fin status es presupuesto vamos a meter en la cuenta lo de total express

            if (isNaN(productos_total)) {
                productos_total = 0
            }

            return productos_total;
        }

        //Fin  Caluclar total de los productos


        //Caluclar total de los servicios
        // $(document).on('click', '.btn-add2', calculate);
        // $(document).on('click', '.btn-remove2', calculate);

        function calcular_total_servicios() {

            servicios_total = 0
            total_hh = 0

            var precio_hh = eval($(".order_hh").val());

            var size = $(".hh-service").size();
            console.log('size service =' + size);
            $(".hh-service").each(
                    function (index, value) {
                        if (eval($(this).val() != '')) {
                            servicios_total = servicios_total + (eval($(this).val()) * precio_hh);
                            //Total hh
                            total_hh = total_hh + eval($(this).val());
                        }
                    });

            if (isNaN(servicios_total)) {
                servicios_total = 0
            }

            if (isNaN(total_hh)) {
                total_hh = 0
            }

            $('.total_hh').val(total_hh)

            return servicios_total;
        }

        //Caluclar total de los costos
        function calcular_total_costos() {
            costos = 0

            $(".producto-cost").each(
                    function (index, value) {
                        if (eval($(this).val() != '')) {
                            costos = costos + (eval($(this).val()) * eval($(this).closest('.multiple-form-group').find('.producto-quantity').val()));
                        }
                    });

            if (isNaN(costos)) {
                costos = 0
            }

            //retornar valor, directo al field
            $(".costo_total").val(costos)
        }
        //Fin  Caluclar total de los costos


        //Fin  Caluclar total de los servicios

        function calculate() {

            calcular_total_costos();

            var conf_iva = {!! $config->iva !!};

            if ($(".discount").val() > 0) {
                var porc = eval($(".discount").val() / 100);
                var discount = eval((calcular_total_producto() + calcular_total_servicios()) * porc);
                var sum = eval((calcular_total_producto() + calcular_total_servicios()) - discount);
            } else {
                var sum = eval(calcular_total_producto() + calcular_total_servicios());
            }

            var iva = eval(sum * (conf_iva / 100))
            var neto = eval(sum)

            $(".neto").val(neto)
            $(".iva").val(iva)

            $(".total").val(neto + iva)
        }

        $(document).ready(function () {
            calculate()
            calcular_total_costos()
        });

        $('.select2').select2()
        $('.product-saved').hide();
        $('.service-saved').hide();
        if ($(".type_pay").val() != 'TransBank') {
            $('#card_type').hide();
        }
        if ($("input[name='paid']:checked").val() == 'no') {
            $('#order_paid').hide();
        }

    </script>


@endsection