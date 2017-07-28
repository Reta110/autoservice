<!-- right column -->
<div class="col-md-6">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Datos del Vehiculo</h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#myEditVehicleModal">
                    Editar
                </button>
            </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body" id="partial-vehicle-data">
            <div class="form-group">
                <input type="hidden" value="{{$vehicle->id}}" name="vehicle_id" id="vehicle_id">

                <label for="Brand" class="col-sm-2 control-label">Marca</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control brand"
                           placeholder="{{$vehicle->brand}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="Model" class="col-sm-2 control-label">Modelo</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control model"
                           placeholder="{{$vehicle->model}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="Vin" class="col-sm-2 control-label">Vin</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control vin"
                           placeholder="{{$vehicle->vin}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="patente" class="col-sm-2 control-label">Patente</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control patente"
                           placeholder="{{$vehicle->patente}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="motor" class="col-sm-2 control-label">Motor</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control motor"
                           placeholder="{{$vehicle->motor}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="year" class="col-sm-2 control-label">Año</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control year"
                           placeholder="{{$vehicle->year}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="km" class="col-sm-2 control-label">km</label>

                <div class="col-sm-10">
                    <input type="type" name="km" class="form-control" value="@if(isset($order->km)){{$order->km}}@endif"
                           required>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
    </div>
</div>