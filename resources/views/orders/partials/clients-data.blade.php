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