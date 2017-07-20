<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('brand', 'Marca') !!}
                    {!! Form::text('brand', null, ['class' => 'form-control brand', 'placeholder' => 'Marca']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('model', 'Modelo') !!}
                    {!! Form::text('model', null, ['class' => 'form-control model', 'placeholder' => 'Modelo']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('vin', 'Vin') !!}
                    {!! Form::text('vin', null, ['class' => 'form-control vin', 'placeholder' => 'Vin']) !!}
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group">
                    {!! Form::label('year', 'Year') !!}
                    {!! Form::text('year', null, ['class' => 'form-control year', 'placeholder' => 'Year']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('motor', 'Motor') !!}
                    {!! Form::text('motor', null, ['class' => 'form-control motor', 'placeholder' => 'Motor']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('patente', 'Patente') !!}
                    {!! Form::text('patente', null, ['class' => 'form-control patente', 'placeholder' => 'Patente']) !!}
                </div>
                <div class="form-group">
                    {!! Form::hidden('user_id', null, ['class' => 'form-control', 'placeholder' => 'user_id']) !!}
                </div>
            </div>
        </div>
    </div>
</div>