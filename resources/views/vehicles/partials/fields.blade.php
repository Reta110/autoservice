<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('brand', 'Marca') !!}
                    {!! Form::text('brand', null, ['class' => 'form-control', 'placeholder' => 'Marca']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('model', 'Modelo') !!}
                    {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Modelo']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cost', 'Costo') !!}
                    {!! Form::text('cost', null, ['class' => 'form-control', 'placeholder' => 'Costo']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('vin', 'Vin') !!}
                    {!! Form::text('vin', null, ['class' => 'form-control', 'placeholder' => 'Vin']) !!}
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group">
                    {!! Form::label('year', 'Year') !!}
                    {!! Form::text('year', null, ['class' => 'form-control', 'placeholder' => 'Year']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('motor', 'Motor') !!}
                    {!! Form::text('motor', null, ['class' => 'form-control', 'placeholder' => 'Motor']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('patente', 'Patente') !!}
                    {!! Form::text('patente', null, ['class' => 'form-control', 'placeholder' => 'Patente']) !!}
                </div>
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('km', 'Km') !!}--}}
                    {{--{!! Form::text('km', null, ['class' => 'form-control', 'placeholder' => 'Km']) !!}--}}
                {{--</div>--}}
                <div class="form-group">
                    {!! Form::hidden('user_id', null, ['class' => 'form-control', 'placeholder' => 'Km']) !!}
                </div>
            </div>
        </div>
    </div>
</div>