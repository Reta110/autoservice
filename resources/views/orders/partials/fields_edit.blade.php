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
                            {!! Form::text('hh', $order->hh, ['class' => 'form-control', 'id' => 'hh', 'placeholder' => 'HH']) !!}
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
                    </div>
                    <div class="contacts">

                        @foreach($order->products as $oproduct)

                            <div class="form-group multiple-form-group input-group">
                                <div class="col-md-4">
                                    <label>Producto</label>
                                    <div class="input-group-btn input-group-select">

                                        <div class="form-group">
                                            {!! Form::select('product_id[]', $products, $oproduct->id, ['class' => 'form-control select-product', 'placeholder' => '--- Indique producto ---']) !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Precio</label>
                                    {!! Form::hidden('product_cost[]', $oproduct->cost, ['class' => 'form-control producto-cost', 'placeholder' => 'costo']) !!}
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
                                <div class="col-md-2">
                                    <label> - </label>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-remove">-</button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group multiple-form-group input-group">
                            <div class="col-md-4">
                                <label>Producto</label>
                                <div class="input-group-btn input-group-select">

                                    <div class="form-group">

                                        {!! Form::select('product_id[]', $products, null, ['class' => 'form-control select-product', 'placeholder' => '--- Indique producto ---']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Precio</label>
                                {!! Form::hidden('product_cost[]', null, ['class' => 'form-control', 'placeholder' => 'costo']) !!}
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
                            <div class="col-md-2">
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
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <label>Observaciones:</label>
                        <div class="form-group">

                            {!! Form::textarea('observations', null, ['class' => 'form-control', 'placeholder' => 'Observaciones', 'rows' => '5']) !!}

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

    <script type="text/javascript">

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
            var myArray = {!! $serv !!};

            var found = $.map(myArray, function (val) {
                return val.id == id ? val.hh : null;
            });

            $(this).closest('.multiple-form-group2').find('.hh-service').val(found[0]);

            console.log(found[0]);

        });
        //Fin Colocar precio hora en servicio

        //Colocar precio y stock de los productos

        $(document).on('change', '.select-product', function () {
            var id = $(this).val();
            var myArray = {!! $prod !!};

            var found = $.map(myArray, function (val) {
                return val.id == id ? val.price : null;
            });

            var stock = $.map(myArray, function (val) {
                return val.id == id ? val.stock : null;
            });

            var cost = $.map(myArray, function (val) {
                return val.id == id ? val.cost : null;
            });

            $(this).closest('.multiple-form-group').find('.producto-price').val(found[0]);
            $(this).closest('.multiple-form-group').find('.producto-stock').val(stock[0]);
            $(this).closest('.multiple-form-group').find('.producto-cost').val(cost[0]);

            console.log(found[0]);

        });

        //Fin Colocar precio y stock de los productos

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

            var precio_hh = {!! $order->hh !!};

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

            var conf_iva = {!! $config->iva !!};

            var sum = eval(calcular_total_producto() + calcular_total_servicios());
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


    </script>

@endsection