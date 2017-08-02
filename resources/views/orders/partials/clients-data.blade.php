<!-- left column -->
<div class="col-md-6">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Datos del cliente</h3>
            <div class="pull-right">
                @if(Request::segment(4) == 'edit')
                    <a type="button" href="{{route('select-change-client',$order->id)}}" class="btn btn-warning btn-sm">
                        Cambiar cliente
                    </a>
                @endif
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#myEditClientModal">
                    Editar
                </button>
            </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body" id="partial-client-data">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>

                <div class="col-sm-10">
                    <input type="hidden" value="{{$client->id}}" name="user_id" id="user_id">
                    <input type="text" class="form-control name"
                           placeholder="{{$client->name}}" disabled>
                </div>

            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Apellido</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control last_name"
                           placeholder="{{$client->last_name }}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Rut</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control rut"
                           placeholder="{{$client->rut}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Phone</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control phone"
                           placeholder="{{$client->phone}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control email"
                           placeholder="{{$client->email}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Dirección</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control address"
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