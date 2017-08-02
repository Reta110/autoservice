@extends('layouts.admin')

@section('title', 'Editar Gasto Fijo')

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

        {!! Form::model($expense, ['route' => ['fixed-expenses.update', $expense], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Editar Gasto Fijo</h3>
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
            {!! Form::submit('Actualizar', ['class'=> 'btn btn-primary']) !!}
            <a class="btn btn-danger" href="{{ route('fixed-expenses.index')}}">
                Cancelar
            </a>
        </div>
        {!! Form::close() !!}
    </section>

@endsection

@section('js')

@endsection