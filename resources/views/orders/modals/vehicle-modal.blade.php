<!-- Modal -->
<div class="modal fade" id="myVehicleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal" role="form" method="POST" action="
        @if(!isset($order_id))
        {{ route('vehicle-select')}}
        @else
        {{ route('vehicle-select', [$order_id, $user_id])}}
        @endif">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nevo Vehículo</h4>
                </div>
                <div class="modal-body">
                    <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $client->id }}">

                    <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                        <label for="brand" class="col-md-4 control-label">Marca</label>

                        <div class="col-md-6">
                            <input id="brand" type="text" class="form-control" name="brand" value="{{ old('brand') }}"
                                   autofocus>

                            @if ($errors->has('brand'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                        <label for="model" class="col-md-4 control-label">Modelo</label>

                        <div class="col-md-6">
                            <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}"
                                   autofocus>

                            @if ($errors->has('model'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('vin') ? ' has-error' : '' }}">
                        <label for="vin" class="col-md-4 control-label">Vin</label>

                        <div class="col-md-6">
                            <input id="vin" type="text" class="form-control" name="vin" value="{{ old('vin') }}"
                                   autofocus>

                            @if ($errors->has('vin'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('vin') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                        <label for="year" class="col-md-4 control-label">Año</label>

                        <div class="col-md-6">
                            <input id="year" type="text" class="form-control" name="year" value="{{ old('year') }}"
                                   autofocus>

                            @if ($errors->has('year'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('motor') ? ' has-error' : '' }}">
                        <label for="motor" class="col-md-4 control-label">Motor</label>

                        <div class="col-md-6">
                            <input id="motor" type="text" class="form-control" name="motor" value="{{ old('motor') }}"
                                   autofocus>

                            @if ($errors->has('motor'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('motor') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('patente') ? ' has-error' : '' }}">
                        <label for="patente" class="col-md-4 control-label">Patente</label>

                        <div class="col-md-6">
                            <input id="patente" type="text" class="form-control" name="patente"
                                   value="{{ old('patente') }}"
                                   autofocus>

                            @if ($errors->has('patente'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('patente') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('km') ? ' has-error' : '' }}">
                        <label for="km" class="col-md-4 control-label">Km</label>

                        <div class="col-md-6">
                            <input id="km" type="text" class="form-control" name="km" value="{{ old('km') }}"
                                   autofocus>

                            @if ($errors->has('km'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('km') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
