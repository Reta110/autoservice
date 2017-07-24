<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('code', 'Código') !!}
                    {!! Form::text('code', null, ['class' => 'form-control code', 'placeholder' => 'Código']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control name', 'placeholder' => 'Nombre', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cost', 'Costo') !!}
                    {!! Form::text('cost', null, ['class' => 'form-control cost', 'placeholder' => 'Costo']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Precio referencia') !!}
                    {!! Form::text('price', null, ['class' => 'form-control price', 'placeholder' => 'Precio referencia']) !!}
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group">
                    {!! Form::label('brand', 'Marca') !!}
                    {!! Form::text('brand', null, ['class' => 'form-control brand', 'placeholder' => 'Marca', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('model', 'Modelo') !!}
                    {!! Form::text('model', null, ['class' => 'form-control model', 'placeholder' => 'Modelo', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('stock', 'Stock') !!}
                    {!! Form::text('stock', null, ['class' => 'form-control stock', 'placeholder' => 'Stock']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('stock_minimum', 'Stock mínimo deseado') !!}
                    {!! Form::text('stock_minimum', null, ['class' => 'form-control stock_minimum', 'placeholder' => 'Stock mínimo deseado', 'value' => '0']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control category_id', 'placeholder' => '-- Categoria --', 'required' => 'true']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                {!! Form::label('tags', 'Modelos de vehiculos recomendados para este producto (Separados por , )') !!}
                <br>
                {!! Form::text('tags', null, ['class' => 'form-control tags','data-role'=>'tagsinput']) !!}
            </div>
        </div>
    </div>
</div>

@section('js')
    <link href="{{asset('AdminLTE/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css')}}" rel="stylesheet">

    <script type="text/javascript"
            src="{{asset('AdminLTE/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js')}}"></script>

@endsection