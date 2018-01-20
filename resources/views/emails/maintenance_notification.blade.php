<h2>Hola {{$vehicle->user->name}},</h2>

<p>@if(isset($text_email_notification)){{$text_email_notification}}@endif</p>

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
                    {{$vehicle->user->name}}
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Apellido:</strong>
                    {{$vehicle->user->last_name }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Rut:</strong>
                    {{$vehicle->user->rut }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Teléfono:</strong>
                    {{$vehicle->user->phone }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Correo:</strong>
                    {{$vehicle->user->email }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <strong>Dirección:</strong>
                    {{$vehicle->user->address }}
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
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Marca:</strong>
                    {{$vehicle->brand}}
                </div>
                <div class="form-group">

                    <strong>Model:</strong>
                    {{$vehicle->model}}
                </div>
                <div class="form-group">

                    <strong>Vin:</strong>
                    {{$vehicle->vin}}

                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">

                    <strong>Patente:</strong>
                    {{$vehicle->patente}}
                </div>
                <div class="form-group">

                    <strong>Motor:</strong>
                    {{$vehicle->motor}}
                </div>
                <div class="form-group">

                    <strong>Año:</strong>
                    {{$vehicle->year}}
                </div>
                <div class="form-group">

                    <strong>Km:</strong>
                    {{$vehicle->km}}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
    </div>
</div>


<p>Gracias,</p>
<p>Automec</p>
<img src="{{ $message->embed(asset("images/logo2.png")) }}">