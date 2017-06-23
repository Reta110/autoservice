@extends('layouts.admin')

@section('title', 'Editar Producto')

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

        {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT']) !!}
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
                            @include('products.partials.fields')
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

@endsection