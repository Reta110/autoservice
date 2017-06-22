<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nevo Cliente</h4>
    </div>
    <div class="modal-body">


        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Nombre</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                       required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label for="last_name" class="col-md-4 control-label">Apellido</label>

            <div class="col-md-6">
                <input id="last_name" type="text" class="form-control" name="last_name"
                       value="{{ old('last_name') }}" required autofocus>

                @if ($errors->has('last_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                       required>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
            <label for="rut" class="col-md-4 control-label">Rut</label>

            <div class="col-md-6">
                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}"
                       required autofocus>

                @if ($errors->has('rut'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone" class="col-md-4 control-label">Telefono</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                       required autofocus>

                @if ($errors->has('phone'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-md-4 control-label">Dirección</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control" name="address"
                       value="{{ old('address') }}" required autofocus>

                @if ($errors->has('address'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

    </div>
    <div class="text-center">
        <a class="btn btn-danger" href="{{ route('clients.index')}}">
            Cancelar
        </a>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
    <br>
</div>