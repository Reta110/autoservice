@extends('layouts.admin')

@section('title', 'Configuraciones del sistema')

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
                    Home
                </a>
            </li>
            <li>
                <a href="#">
                    Examples
                </a>
            </li>
            <li class="active">
                Blank page
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        {!! Form::model($configuration, ['route' => ['configurations.update', $configuration], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.success')
                        <h3 class="box-title">Configuración del sistema</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('iva', 'Iva %') !!}
                                    {!! Form::text('iva', null, ['class' => 'form-control', 'placeholder' => 'Iva', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('Precio HH', 'Precio HH referencia') !!}
                                    {!! Form::text('price_hh', null, ['class' => 'form-control', 'placeholder' => 'Precio de HH', 'required']) !!}
                                </div>
                                {{--<div class="form-group">--}}
                                {{--{!! Form::label('email', 'Email - Notifications') !!}--}}
                                {{--{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email para notificaciones', 'required']) !!}--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="for text-center">
            {!! Form::submit('Actualizar', ['class'=> 'btn btn-primary']) !!}
            {{--<a class="btn btn-danger" href="{{ route('.index')}}">--}}
            {{--Cancelar--}}
            {{--</a>--}}
        </div>
        {!! Form::close() !!}
    </section>

@endsection

@section('js')

@endsection