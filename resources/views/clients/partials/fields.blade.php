<div class="box-body">
    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                {!! Form::label('name', 'Nombre', ['class' => 'control-label col-sm-4 text-right']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('last_name', 'Apellido', ['class' => 'control-label col-sm-4 text-right']) !!}
                <div class="col-sm-6">
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-Mail', ['class' => 'control-label col-sm-4 text-right']) !!}
                <div class="col-md-6">
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('rut', 'Rut', ['class' => 'control-label col-sm-4 text-right']) !!}
                <div class="col-md-6">
                    {!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Teléfono', ['class' => 'control-label col-sm-4 text-right']) !!}
                <div class="col-md-6">
                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Dirección', ['class' => 'control-label col-sm-4 text-right']) !!}
                <div class="col-md-6">
                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

