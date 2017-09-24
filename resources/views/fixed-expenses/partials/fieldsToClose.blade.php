<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-md-12">

            @foreach($fixedExpenses as $expense)
                <div class="col-md-6 list-group-item">
                    {!! Form::open(['route' => ['close-month'], 'method' => 'POST', 'class' => 'formSend']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', $expense->name, ['class' => 'form-control name', 'placeholder' => 'Nombre', 'required' => 'true']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('total', 'Total') !!}
                        {!! Form::text('total', $expense->total, ['class' => 'form-control total', 'placeholder' => 'Total']) !!}
                    </div>
                    <div class="form-group">
                        <label>Fecha:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('date', null, ['class' => 'form-control pull-right date', 'placeholder' => 'date']) !!}
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        {!! Form::label('category', 'Categoria: ') !!}
                        {!! Form::text('category', $expense->category, ['class' => 'form-control category','data-role'=>'tagsinput']) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::button('Agregar', ['class'=> 'btn btn-primary submit']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            @endforeach

        </div>
    </div>
</div>

@section('js')
    <link href="{{asset('AdminLTE/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css')}}"
          rel="stylesheet">

    <script type="text/javascript"
            src="{{asset('AdminLTE/plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js')}}"></script>
    <script type="text/javascript"
            src="{{ asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

    <script type="text/javascript">
        $('.notification').hide()

        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            showOnFocus: true
        });

        $(document).ready(function () {
            var date = '{!! Carbon\Carbon::now()->format('d-m-Y')!!}'
            $('.date').val(date);
        });

        //Modal para editar vehicle sin salir
        $(".submit").click(function (event) {
            event.preventDefault(); //prevent default action
            console.log('Agregando gasto fijo');

            var token = $("input[name='_token']").val();
            var name = $(this).closest('.list-group-item').find('.name').val();
            var total = $(this).closest('.list-group-item').find('.total').val();
            var date = $(this).closest('.list-group-item').find('.date').val();
            var category = $(this).closest('.list-group-item').find('.category').val();

//            console.log('name' + name)
//            console.log('total' + total)
//            console.log('date' + date)
//            console.log('category' + category)

            $.ajax({
                url: "{!! route('fixed-expenses.store')!!}",
                method: 'POST',
                data: {
                    _token: token,
                    "name": name,
                    "total": total,
                    "date": date,
                    "category": category
                },
                success: function (data) {
                    console.log('Success');
                    $(this).closest('.list-group-item').fadeOut(1000)
                }
            });

            $(this).closest('.list-group-item').fadeOut(1000)

            $('.notification').fadeIn(2000, function () {
                $('.notification').fadeOut(1000);
            });

        });
    </script>
@endsection