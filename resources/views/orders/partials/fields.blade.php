<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <!-- right column -->
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos del cliente</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>

                            <div class="col-sm-10">
                                <input type="hidden" value="{{$client->id}}" name="user_id" id="user_id">
                                <input type="email" class="form-control"
                                       placeholder="{{$client->name}}" disabled>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Apellido</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control"
                                       placeholder="{{$client->last_name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Rut</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$client->rut}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Phone</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$client->phone}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$client->email}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Dirección</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$client->address}}" disabled>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>

            <!-- right column -->
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos del Vehiculo</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" value="{{$vehicle->id}}" name="vehicle_id" id="vehicle_id">

                            <label for="inputPassword3" class="col-sm-2 control-label">Marca</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$vehicle->brand}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Modelo</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$vehicle->model}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Vin</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$vehicle->vin}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Patente</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$vehicle->patente}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Motor</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$vehicle->motor}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Año</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control"
                                       placeholder="{{$vehicle->year}}" disabled>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>

        </div>
    </div>
</div>
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Agregue los servicios</h3>
                </div>
                <div class="contacts">

                    <div class="form-group multiple-form-group input-group">
                        <div class="col-md-6">
                            <div class="input-group-btn input-group-select">
                                <div class="form-group">
                                    {!! Form::select('service_id[]', $services, null, ['class' => 'form-control', 'placeholder' => '--- Indique servicio ---']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">

                            {!! Form::text('service_hh[]', null, ['class' => 'form-control', 'placeholder' => 'Horas']) !!}
                        </div>
                        <div class="col-md-2">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-add">+</button>
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

                    <div class="form-group multiple-form-group input-group">
                        <div class="col-md-4">
                            <div class="input-group-btn input-group-select">
                                <div class="form-group">
                                    {!! Form::select('product_id[]', $products, null, ['class' => 'form-control', 'placeholder' => '--- Indique producto ---']) !!}
                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                            {!! Form::hidden('product_cost[]', null, ['class' => 'form-control', 'placeholder' => 'costo']) !!}
                            {!! Form::text('product_price[]', null, ['class' => 'form-control', 'placeholder' => 'precio']) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::text('product_quantity[]', null, ['class' => 'form-control', 'placeholder' => 'cantidad']) !!}
                        </div>
                        <div class="col-md-2">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-add">+</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@section('js')
    <script type="text/javascript">
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
        //datepicker
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true
        });
    </script>
@endsection