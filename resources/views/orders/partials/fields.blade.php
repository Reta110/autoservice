<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Título</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   placeholder="Titulo" name="title" id="title" required>
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
                        <h3 class="box-title">Agregue los servicios</h3>
                        <div class="pull-right">
                            {{--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myServiceModal">--}}
                            {{--Nuevo Servicio--}}
                            {{--</button>--}}
                        </div>
                    </div>
                    <div class="contacts">

                        <div class="form-group multiple-form-group input-group">
                            <div class="col-md-6">
                                <div class="input-group-btn input-group-select">
                                    <div class="form-group">
                                        <select class="form-control select-service" name="service_id[]">
                                            <option selected="selected" disabled="disabled" hidden="hidden" value="">---
                                                Indique servicio ---
                                            </option>
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>


                                        {{--{!! Form::select('service_id[]', $services, null, ['class' => 'form-control select-service', 'placeholder' => '--- Indique servicio ---']) !!}--}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                {!! Form::text('service_hh[]', null, ['class' => 'form-control hh-service', 'placeholder' => 'Horas']) !!}
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
                        <div class="pull-right">
                            {{--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myProductModal">--}}
                            {{--Nuevo Producto--}}
                            {{--</button>--}}
                        </div>
                    </div>
                    <div class="contacts">

                        <div class="form-group multiple-form-group input-group">
                            <div class="col-md-4">
                                <div class="input-group-btn input-group-select">
                                    <div class="form-group">

                                        {!! Form::select('product_id[]', $products, null, ['class' => 'form-control selectproduct', 'placeholder' => '--- Indique producto ---']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                {!! Form::hidden('product_cost[]', null, ['class' => 'form-control', 'placeholder' => 'costo']) !!}
                                {!! Form::text('product_price[]', null, ['class' => 'form-control producto-price', 'placeholder' => 'precio']) !!}
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
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Estatus</label>

                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="budget" checked>Presupuesto
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="started">Iniciado
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="ended">Finalizado
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-6">--}}
            {{--<div class="box box-info">--}}
            {{--<div class="box-header">--}}
            {{--<h3 class="box-title">Total</h3>--}}
            {{--</div>--}}
            {{--<p class="text-right">--}}
            {{--Precio: 7686--}}
            {{--</p>--}}
            {{--<p class="text-right">--}}
            {{--Iva: 23223--}}
            {{--</p>--}}
            {{--<p class="text-right">--}}
            {{--Total: <input v-model="total" disabled>--}}
            {{--</p>--}}
            {{--</div>--}}
            {{--</div>--}}

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


            $(document).on('change', '.select-service', function () {
                var id = $(this).val();
                var myArray = {!! $serv !!};

                var found = $.map(myArray, function (val) {
                    return val.id == id ? val.hh : null;
                });

                $(this).closest('.multiple-form-group').find('.hh-service').val(found[0]);

                console.log(found[0]);


            });

            //            $(document).on('click', '.btn-add', function () {
            //                alert('add');
            //            });
            //
            //            $(document).on('click', '.btn-remove', function () {
            //                alert('remove');
            //            });


        </script>


@endsection