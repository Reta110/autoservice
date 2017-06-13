@extends('layouts.admin')

@section('title', 'Editar Producto')

@section('contenido')
    {!! Form::model($service, ['route' => ['services.update', $service], 'method' => 'PUT']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    @include('common.errors')
                    <h3 class="box-title">Editar Producto</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @include('services.partials.fields')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="for text-center">
        {!! Form::submit('Registrar', ['class'=> 'btn btn-primary']) !!}
        <a class="btn btn-danger" href="{{ route('services.index')}}">
            Cancelar
        </a>
    </div>
    {!! Form::close() !!}
@endsection

@section('js')
    <script>
        $(".inputmask1").inputmask("(999) 9999999");
        $(".inputmask2").inputmask("(999) 999999999");
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true
        });

    </script>
@endsection