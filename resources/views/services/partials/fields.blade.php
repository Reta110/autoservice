<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    {!! Form::label('code', 'Código') !!}
                    {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Código']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('hh', 'Tiempo sgerido') !!}
                    {!! Form::text('hh', null, ['class' => 'form-control', 'placeholder' => 'Tiempo sgerido']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descripción', ]) !!}
                </div>

            </div>
        </div>
    </div>
</div>