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
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control"
                                           placeholder="{{$client->name.' '.$client->last_name }}" disabled>
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
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">

                        </div>
                        <!-- /.box-footer -->
                    </form>
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
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>