<!-- left column -->
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


                <div class="col-sm-10">
                    <strong>Nombre:</strong>
                    {{$order->user->name}}
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Apellido:</strong>
                    {{$order->user->last_name }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Rut:</strong>
                    {{$order->user->rut }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Teléfono:</strong>
                    {{$order->user->phone }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Correo:</strong>
                    {{$order->user->email }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Dirección:</strong>
                    {{$order->user->address }}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
    </div>
</div>