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
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Marca:</strong>
                    {{$order->vehicle->brand}}
                </div>
                <div class="form-group">

                    <strong>Model:</strong>
                    {{$order->vehicle->model}}
                </div>
                <div class="form-group">

                    <strong>Vin:</strong>
                    {{$order->vehicle->vin}}

                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">

                    <strong>Patente:</strong>
                    {{$order->vehicle->patente}}
                </div>
                <div class="form-group">

                    <strong>Motor:</strong>
                    {{$order->vehicle->motor}}
                </div>
                <div class="form-group">

                    <strong>Año:</strong>
                    {{$order->vehicle->year}}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
    </div>
</div>