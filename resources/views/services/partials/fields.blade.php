<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    {!! Form::label('code', 'Código') !!}
                    {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('hh', 'Precio Referencia') !!}
                    {!! Form::text('hh', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '', ]) !!}
                </div>

            </div>
        </div>
    </div>
</div>