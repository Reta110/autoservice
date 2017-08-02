<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control name', 'placeholder' => 'Nombre', 'required' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('quantity', 'Cantidad') !!}
                    {!! Form::text('quantity', null, ['class' => 'form-control quantity', 'placeholder' => 'Cantidad']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('total', 'Total') !!}
                    {!! Form::text('total', null, ['class' => 'form-control total', 'placeholder' => 'Total']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('date', 'Fecha') !!}
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text('date', \Carbon\Carbon::now()->format('d-m-Y'), ['class' => 'form-control pull-right', 'placeholder' => 'date', 'id' => 'date']) !!}
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Categoria: ') !!}
                    {!! Form::text('category', null, ['class' => 'form-control tags','data-role'=>'tagsinput']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    <link href="{{asset('AdminLTE/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css')}}"
          rel="stylesheet">

    <script type="text/javascript"
            src="{{asset('AdminLTE/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js')}}"></script>
    <script type="text/javascript" src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

    <script type="text/javascript">
        $('#date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            showOnFocus: true,
        });
    </script>
@endsection