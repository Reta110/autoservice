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