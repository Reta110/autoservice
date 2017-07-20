<!-- Modal -->
<div class="modal fade" id="myEditVehicleModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::model($vehicle, ['route' => ['vehicles.update', $vehicle], 'method' => 'PUT', 'id' => 'modal-edit-vehicle-form']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Nuevo Producto</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @include('vehicles.partials.fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="for text-center">
            <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Cancelar</button>
            {!! Form::submit('Actualizar', ['class'=> 'btn btn-primary','id' => 'modal-product']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>