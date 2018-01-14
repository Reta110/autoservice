<h2>Hola {{$order->user->name}},</h2>

<p>@if(isset($text_email_order)){{$text_email_order}}@endif</p>

<p>Puedes descargar <a href="http://{{$path}}" download>aquí</a> la orden para ver los detalles
    del servicio.</p>

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
                <div class="form-group">

                    <strong>Km:</strong>
                    {{$order->vehicle->km}}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
    </div>
</div>


<p>Saludos,</p>
<p>Automec</p>
<img src="{{ $message->embed(asset("images/logo2.png")) }}">