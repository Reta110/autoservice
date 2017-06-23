@extends('layouts.admin')

@section('title', 'Mostrar Trabajo')

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

        {!! Form::open(['route' => 'orders.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Mostrar Trabajo</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @include('orders.partials.fields_show')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="for text-center">
            <a class="btn btn-danger" href="{{ route('orders.index')}}">
                Volver
            </a>
        </div>
    </section>

@endsection

@section('js')

@endsection
