<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('code', 'Código') !!}
                    {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Código']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cost', 'Costo') !!}
                    {!! Form::text('cost', null, ['class' => 'form-control', 'placeholder' => 'Costo']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Precio referencia') !!}
                    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Precio referencia']) !!}
                </div>

            </div>
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
                    {!! Form::label('stock', 'Stock') !!}
                    {!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'Stock']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => '-- Categoria --']) !!}
                </div>
            </div>
        </div>
    </div>
</div>