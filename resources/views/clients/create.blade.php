@extends('layouts.admin')

@section('title', 'Nuevo Producto')

@section('contenido')
    <section class="content-header">
        <h1>
            <small>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard">
                    </i>
                    Admin
                </a>
            </li>
            <li>
                <a href="#">
                    Cientes
                </a>
            </li>
            <li class="active">
                Crear
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        {!! Form::open(['route' => 'user-save', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Nuevo Cliente</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @include('clients.partials.fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="for text-center">
            {!! Form::submit('Registrar', ['class'=> 'btn btn-primary']) !!}
            <a class="btn btn-danger" href="{{ route('products.index')}}">
                Cancelar
            </a>
        </div>
        {!! Form::close() !!}
    </section>

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
