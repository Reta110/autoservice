@extends('layouts.admin')

@section('title', 'Nuevo Gasto Fijo')

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
                    Nuevo
                </a>
            </li>
            <li>
                <a href="#">
                    Gasto
                </a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        {!! Form::open(['route' => 'fixed-expenses.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Nuevo Gasto Fijo</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @include('fixed-expenses.partials.fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="for text-center">
            {!! Form::button('Registrar', ['class'=> 'btn btn-primary', 'onClick'=>'submit();']) !!}
            <a class="btn btn-danger" href="{{ route('fixed-expenses.index')}}">
                Cancelar
            </a>
        </div>
        {!! Form::close() !!}
    </section>

@endsection