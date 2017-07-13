<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Título</label>

                        <div class="col-sm-10">
                            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'precio', 'required' => 'true']) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box-bodys">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Servicios</h3>
                        <div class="pull-right">
                            <label>Precio HH</label>
                            {!! Form::text('hh', $order->hh, ['class' => 'form-control order_hh', 'id' => 'hh', 'placeholder' => 'HH']) !!}
                        </div>
                    </div>
                    <div class="contacts">

                        @foreach($order->services as $oservice)

                            <div class="form-group multiple-form-group2 input-group">
                                <div class="col-md-6">
                                    <label>Servicio</label>

                                    <div class="input-group-btn input-group-select">
                                        <div class="form-group">
                                            {!! Form::select('service_id[]', $services, $oservice->id, ['class' => 'form-control select-service', 'placeholder' => '--- Indique servicio ---']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2">
                                    <label>Horas</label>
                                    {!! Form::text('service_hh[]', $oservice->pivot->hh, ['class' => 'form-control hh-service', 'placeholder' => 'Horas']) !!}
                                </div>
                                <div class="col-md-2">
                                    <label> - </label>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-remove2">-</button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group multiple-form-group2 input-group">
                            <div class="col-md-6">
                                <label>Servicio</label>

                                <div class="input-group-btn input-group-select">
                                    <div class="form-group">
                                        {!! Form::select('service_id[]', $services, null, ['class' => 'form-control select-service', 'placeholder' => '--- Indique servicio ---']) !!}
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
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Seleccione producto y cantidad</h3>
                        <div class="pull-right">
                            @if(count($recommended) > 0)
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#myProductRecommendeModal">
                                    Recomendados
                                </button>
                            @endif

                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#myProductModal">
                                Nuevo
                            </button>
                            <div class="product-saved">
                                <p class="info no-print text-success">Guardado!!</p>
                            </div>
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
                                            {!! Form::text('product_code',$oproduct->code, ['class' => 'form-control input-code inputSuccess', 'placeholder' => 'Código / serial:']) !!}
                                            </span>
                                            <span class="help-block">Help block with success</span>
                                            <hr>
                                            {!! Form::select('product_category[]', $categories, $oproduct->category_id, ['class' => 'form-control select-category', 'placeholder' => '--- Categoria ---']) !!}
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control select-brand" name="product_brand[]">
                                                <option selected="selected" disabled="disabled" hidden="hidden"
                                                        value=""> ---------
                                                </option>
                                                @foreach($marcas as $marca)
                                                    <option value="{{$marca}}"
                                                            @if($marca == $oproduct->brand) selected="selected" @endif>{{$marca}}</option>
                                                @endforeach
                                            </select>
                                            {{--{!! Form::select('product_brand[]',$marcas , $oproduct->brand, ['class' => 'form-control select-brand', 'placeholder' => '--- Marca---']) !!}--}}
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control select-model" name="product_model[]">
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
                                    {!! Form::text('product_quantity[]', $oproduct->pivot->quantity, ['class' => 'form-control producto-quantity', 'placeholder' => 'cantidad']) !!}
                                </div>
                                <div class="col-md-1">
                                    <label> - </label>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-remove">-</button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
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
                                <label> - </label>
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-add">+</button>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header">
                        <label>Observaciones de boleta:</label>
                        <div class="form-group">

                            {!! Form::textarea('observations', null, ['class' => 'form-control', 'placeholder' => 'Observaciones', 'rows' => '5']) !!}

                        </div>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Estatus</label>

                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="budget"
                                           @if($order->status == 'budget') checked @endif>Presupuesto
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="started"
                                           @if($order->status == 'started') checked @endif>Iniciado
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="ended"
                                           @if($order->status == 'ended') checked @endif>Finalizado
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="box-header">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Pagado</label>

                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="paid" value="no" @if($order->paid == 'no') checked @endif>No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="paid" value="si" @if($order->paid == 'si') checked @endif>Si
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box-header">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Forma de pago:</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="type_pay"
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
                                    <option value="Cheque" @if($order->type_pay == 'Cheque') selected="selected" @endif>
                                        Cheque
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-header">
                        <label>Observación de pago:</label>
                        <div class="form-group">

                            {!! Form::textarea('pay_observations', null, ['class' => 'form-control', 'placeholder' => 'Observaciones', 'rows' => '2']) !!}

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pull-right">
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

    <script type="text/javascript">

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
                    "category_id": category_id,
                    "tags": tags
                },
                success: function (data) {
                    console.log("suucees bro")
                }
            });

            console.log('DONE');
            $('#modal-form').modal('hide');
            $('.close-modal').click();
            $('.product-saved').fadeIn(2000, function () {
                $('.product-saved').fadeOut(1000);
            });

        });

        //Fin Modal para agregar productos sin salir

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

//            var quantity = $(this).closest('.multiple-form-group').find('.producto-quantity').val();
//            var stock = $(this).closest('.multiple-form-group').find('.producto-stock').val();
//
//
//            if (stock > 0 && (quantity > stock)) {
//                alert('Advertencia: la cantidad solicitada es mayor al stock!');
//            }

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
                    remove_product_ajax(idproduct, quantity);

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
                    add_product_ajax(idproduct, quantity);

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

        {{--//Agregar producto ajax--}}
        {{--function add_product_ajax(idproduct, quantity) {--}}
            {{--var token = $("input[name='_token']").val();--}}
            {{--$.ajax({--}}
                {{--url: "{{route('add-ajax')}}",--}}
                {{--method: 'POST',--}}
                {{--data: {idproduct: idproduct, quantity: quantity, _token: token},--}}
                {{--success: function (data) {--}}
                    {{--console.log("suucees bro")--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}
        {{--//Fin Agregar producto ajax--}}

        {{--//Remove producto ajax--}}
        {{--function remove_product_ajax(idproduct, quantity) {--}}

            {{--var token = $("input[name='_token']").val();--}}
            {{--$.ajax({--}}
                {{--url: "{{route('remove-ajax')}}",--}}
                {{--method: 'POST',--}}
                {{--data: {idproduct: idproduct, quantity: quantity, _token: token},--}}
                {{--success: function (data) {--}}
                    {{--console.log("suucees bro")--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}
        {{--//Fin Remove producto ajax--}}

        //Colocar precio hora en servicio
        $(document).on('change', '.select-service', function () {
            var id = $(this).val();
            var myArray = {!! $serv !!};

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

        //Colocar precio y stock de los productos

        {{--$(document).on('change', '.select-product', function () {--}}
        {{--var id = $(this).val();--}}
        {{--var myArray = {!! $prod !!};--}}

        {{--var found = $.map(myArray, function (val) {--}}
        {{--return val.id == id ? val.price : null;--}}
        {{--});--}}

        {{--var stock = $.map(myArray, function (val) {--}}
        {{--return val.id == id ? val.stock : null;--}}
        {{--});--}}

        {{--var cost = $.map(myArray, function (val) {--}}
        {{--return val.id == id ? val.cost : null;--}}
        {{--});--}}

        {{--$(this).closest('.multiple-form-group').find('.producto-price').val(found[0]);--}}
        {{--$(this).closest('.multiple-form-group').find('.producto-stock').val(stock[0]);--}}
        {{--$(this).closest('.multiple-form-group').find('.producto-cost').val(cost[0]);--}}

        {{--console.log(found[0]);--}}

        {{--});--}}

        {{--//Fin Colocar precio y stock de los productos--}}

        //Colocar precio, costo y stock de los productos en los fields
        $(document).on('change', '.select-model', function () {

            var cat = $(this).closest('.multiple-form-group').find('.select-category option:selected').val();
            var brand = $(this).closest('.multiple-form-group').find('.select-brand option:selected').html();
            var model = $(this).closest('.multiple-form-group').find('.select-model option:selected').html();

            console.log('cat product=' + cat);
            console.log('brand product=' + brand);
            console.log('model product=' + model);
            var myArray = {!! $prod !!};

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
            var myArray = {!! $prod !!};

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

            var precio_hh = eval($(".order_hh").val());

            var size = $(".hh-service").size();
            console.log('size service =' + size);
            $(".hh-service").each(
                    function (index, value) {
                        if (eval($(this).val() != '')) {
                            servicios_total = servicios_total + (eval($(this).val()) * precio_hh);
                        }
                        //eval($(this).closest('.multiple-form-group2').find('.hh-service').val()
                    });

            if (isNaN(servicios_total)) {
                servicios_total = 0
            }

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
            var neto = eval(sum - iva)

            $(".neto").val(neto)
            $(".iva").val(iva)

            $(".total").val(sum)
        }

        $(document).ready(function () {
            calculate()
            calcular_total_costos()
        });

        $('.select2').select2()
        $('.product-saved').hide();

    </script>


@endsection