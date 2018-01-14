<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Apellido') !!}
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Apellido']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('rut', 'Rut') !!}
                    {!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => 'Rut']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', 'Teléfono') !!}
                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Dirección') !!}
                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Direccion']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmación de password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>